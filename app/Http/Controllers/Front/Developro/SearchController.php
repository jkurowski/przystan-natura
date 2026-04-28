<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\InvestmentSelectfield;
use Illuminate\Http\Request;

//CMS
use App\Models\Investment;
use App\Models\Property;
use App\Models\Page;

class SearchController extends Controller
{
    private int $pageId;
    public function __construct()
    {
        $this->pageId = 2;
    }

    public function index(Request $request)
    {
        $page = Page::find($this->pageId);

// Extract query parameters with default values
        $filters = $request->only([
            'area', 'rooms', 'highlighted', 'price', 'investment', 'type', 'kitchen', 'balcony', 'garden', 'terrace'
        ]);

// Provide default values for missing filters
        $filters = array_merge([
            'highlighted' => null,
            'rooms' => null,
            'area' => null,
            'advanced' => null,
            'investment' => null,
            'status' => null,
            'kitchen' => null,
            'garden' => null,
            'balcony' => null,
            'terrace' => null,
            'price' => null,
            'type' => null,
        ], $filters);

        $investments = Investment::where('status', 1)
            ->whereIn('type', [1, 2, 3])
            ->whereHas('city')
            ->with('city')
            ->get();

// Filter Properties
        $customOrder = [1, 3, 2, 4, 5, 6];
        $orderList = implode(',', $customOrder);

        $properties = Property::query()
            ->with(['building' => fn($query) => $query->select('id', 'active', 'name')])
            ->with(['floor' => fn($query) => $query->select('id', 'name')])
            ->with(['city' => fn($query) => $query->select('cities.id as city_id', 'cities.name')])
            //->whereHas('building', fn($query) => $query->where('active', 1))
            ->when($filters['rooms'], fn($query, $rooms) => $query->where('rooms', $rooms))
            ->when($filters['investment'], fn($query, $investment) => $query->where('investment_id', $investment))
            ->when($filters['area'], function ($query, $area) {
                // Check if area contains a range (e.g., "30-50")
                if (strpos($area, '-') !== false) {
                    [$min, $max] = explode('-', $area);
                    $query->whereBetween('area', [(float) $min, (float) $max]);
                } else {
                    // If not a range, use it as a minimum value
                    $query->where('area', '>=', (float) $area);
                }
            })
            ->when($filters['price'] ?? null, function ($query, $price) {
                $range = explode('-', $price);
                if (count($range) === 2) {
                    $query->whereBetween('price_search', [$range[0], $range[1]]);
                }
            })
            ->when($filters['status'], fn($query, $status) => $query->where('status', $status))
            ->when($filters['kitchen'], fn($query, $kitchen) => $query->where('kitchen', $kitchen))
            ->when($filters['highlighted'], fn($query, $highlighted) => $query->where('highlighted', 1))

            ->when(filled($filters['garden']) && $filters['garden'] == 1, fn($query) =>
                $query->whereNotNull('garden_area')->where('garden_area', '!=', '')
            )
            ->when(filled($filters['balcony']) && $filters['balcony'] == 1, fn($query) =>
                $query->whereNotNull('balcony_area')->where('balcony_area', '!=', '')
            )
            ->when(filled($filters['terrace']) && $filters['terrace'] == 1, fn($query) =>
                $query->whereNotNull('terrace_area')->where('terrace_area', '!=', '')
            )
//            ->when(filled($filters['garden']) && $filters['garden'] == 2, fn($query) =>
//            $query->whereNull('garden_area')->orWhere('garden_area', '')
//            )

            //->when($filters['type'], fn($query, $type) => $query->where('type', $type))
            ->whereNotIn('type', [2, 3, 6, 7])
            ->where('status', 1)
            ->orderByRaw("FIELD(properties.type, $orderList)")
            ->orderBy('properties.highlighted', 'DESC')
            ->orderBy('properties.status', 'ASC')
            ->orderBy('properties.number_order', 'ASC')
            ->get();

        // Group properties by investment
        $results = $investments->map(function ($investment) use ($properties) {
            return [
                'investment' => $investment,
                'properties' => $properties->where('investment_id', $investment->id),
            ];
        });

// filtracja wg request('type')
        $type = (int)request('type');

        $results = $results->filter(function ($result) use ($type) {
            if ($type == 1) {
                return in_array($result['investment']->type, [1, 2]);
            } elseif ($type == 2) {
                return $result['investment']->type == 3;
            }
            return true; // jeśli brak filtra → zwróć wszystkie
        });

//        $type = (int)$request->input('type');
//
//        if ($type == 1 || $type == 2) {
//
//            $investments = Investment::where('status', 1)
//                ->when($type == 1, fn($q) => $q->whereIn('type', [1, 2]))
//                ->when($type == 2, fn($q) => $q->where('type', 3))
//                ->whereHas('city')
//                ->with('city')
//                ->orderBy('sort')
//                ->get();
//
//            $category = $type;
//            $types = [1, 3, 2];
//
//            $options = InvestmentSelectfield::where('category', $category)
//                ->whereIn('type', $types)
//                ->orderBy('sort')
//                ->get()
//                ->groupBy('type');
//        }

        $types = [1, 3, 2];

        $flatOptions = [];
        foreach ($types as $type) {
            $flatOptions[$type] = InvestmentSelectfield::where('category', 1)
                ->where('type', $type)
                ->orderBy('sort')
                ->get();
        }

        $houseOptions = [];
        foreach ($types as $type) {
            $houseOptions[$type] = InvestmentSelectfield::where('category', 2)
                ->where('type', $type)
                ->orderBy('sort')
                ->get();
        }

        return view('front.developro.search.index', [
            'page' => $page,
            'results' => $results,
            'investments' => $investments,
            'flatArea' => $flatOptions[1],
            'flatRooms' => $flatOptions[3],
            'flatPrice' => $flatOptions[2],
            'houseArea' => $houseOptions[1],
            'houseRooms' => $houseOptions[3],
            'housePrice' => $houseOptions[2]
        ]);
    }
}
