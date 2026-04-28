<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\InvestmentSelectfield;
use Illuminate\Http\Request;

use App\Models\Investment;
use App\Models\Page;

class IndexController extends Controller
{
    private int $pageId;
    public function __construct()
    {
        $this->pageId = 8;
    }

    public function index(Request $request)
    {
        if ($request->has('investment')) {
            $query = $request->only(['area', 'rooms', 'highlighted', 'price', 'type', 'kitchen', 'balcony', 'garden', 'terrace']);

            if ($request->filled('investment')) {
                return redirect()->route('front.developro.plan', [
                        'slug' => $request->investment
                    ] + $query);
            }

            return redirect()->route('front.developro.search.index', $query);
        }

        $page = Page::find($this->pageId);

        $request->validate([
            'city' => 'nullable|array',
            'city.*' => 'integer|exists:cities,id',
        ]);

        $investments = Investment::where('status', 1)
            ->whereIn('type', [1, 2])
            ->when($request->filled('city'), function ($query) use ($request) {
                $query->whereIn('city_id', (array) $request->city);
            })
            ->with('city')
            ->orderBy('sort')
            ->get();

        $category = 1;
        $types = [1, 3, 2];

        $options = [];
        foreach ($types as $type) {
            $options[$type] = InvestmentSelectfield::where('category', $category)
                ->where('type', $type)
                ->orderBy('sort')
                ->get();
        }


        return view('front.developro.investment.index', [
            'page' => $page,
            'investments' => $investments,
            'area' => $options[1],
            'rooms' => $options[3],
            'price' => $options[2],
        ]);
    }

    public function houses(Request $request)
    {
        if ($request->filled('investment')) {
            $query = $request->only(['area', 'rooms', 'highlighted']);

            return redirect()->route('front.developro.plan', [
                'slug' => $request->investment
            ] + $query);
        }

        $page = Page::find($this->pageId);

        $investments = Investment::where('status', 1)
            ->where('type', 3)
            ->get();

        $category = 2;
        $types = [1, 3, 2]; // powierzchnia, pokoje, cena

        $options = [];
        foreach ($types as $type) {
            $options[$type] = InvestmentSelectfield::where('category', $category)
                ->where('type', $type)
                ->orderBy('sort')
                ->get();
        }

        return view('front.developro.investment.houses', [
            'page' => $page,
            'investments' => $investments,
            'area' => $options[1],
            'rooms' => $options[3],
            'price' => $options[2],
        ]);
    }
}
