<?php

namespace App\Http\Controllers\Front\Developro;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Investment;
use Illuminate\Http\Request;

// CMS
use App\Models\Page;
use App\Repositories\InvestmentRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class InvestmentController extends Controller
{
    private InvestmentRepository $repository;
    private int $pageId;

    public function __construct(InvestmentRepository $repository)
    {
        $this->repository = $repository;
        $this->pageId = 9;
    }

    public function show($slug)
    {
        $investment = Investment::where('slug', $slug)->firstOrFail();
        $page = Page::find($this->pageId);

        if($investment->status == 1){
            $investments = Investment::where('status', 1)
                ->when(in_array($investment->type, [1, 2]), function ($query) {
                    $query->whereIn('type', [1, 2]);
                })
                ->when($investment->type == 3, function ($query) {
                    $query->where('type', 3);
                })
                ->get(['id', 'type', 'name', 'slug']);

            return view('front.developro.investment.show', [
                'investment' => $investment,
                'investments' => $investments,
                'page' => $page,
                'static_page' => 'opis-inwestycji'
            ]);
        } else {
            return view('front.developro.investment.show', [
                'investment' => $investment,
                'page' => $page
            ]);
        }
    }

    public function move()
    {
        // Get all old news records
        $oldInvest = DB::connection('old_triada')->table('inwestycje')->get();

        foreach ($oldInvest as $invest) {
            Investment::forceCreate([
                'id' => $invest->id,
                'name' => $invest->nazwa,
                'slug' => $invest->tag,
                'date_start' => $invest->data_start,
                'date_end' => $invest->data_koniec,
                'area_range' => $invest->zakres_powierzchnia,
                'room_range' => $invest->zakres_pokoje,
                'meta_title' => $invest->meta_tytul,
                'meta_description' => $invest->meta_opis,
                'sort' => $invest->sort,
                'type' => $invest->typ,
                'status' => $invest->status,
                'commercial' => $invest->uslugowe,
                'gallery_id' => $invest->galeria,
                'content' => $invest->tekst,
                'file_thumb' => $invest->miniaturka,
                'file_header' => $invest->header,
                'inv_city' => $invest->adres_miasto,
                'inv_street' => $invest->adres_ulica,
                'meta_robots' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return 'Migration completed!';
    }
    public function movePlans()
    {
        // Get all old news records
        $oldPlans = DB::connection('old_triada')->table('inwestycje_plan')->get();

        //OLD
        //id
        //id_inwest
        //plik
        //----------------
        //NEW (investments_plans)
        //id
        //investment_id
        //file
        //created_at
        //updated_at


        foreach ($oldPlans as $plan) {
            DB::table('investments_plans')->insert([
                'id'            => $plan->id,
                'investment_id' => $plan->id_inwest,
                'file'          => $plan->plik,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }

        return 'Migration completed!';
    }
}
