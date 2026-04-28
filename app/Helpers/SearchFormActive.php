<?php

use App\Models\InvestmentSearchforms;

if (! function_exists('searchFormActive')) {
    function searchFormActive($id)
    {
        static $cache = null;

        // Ładujemy dane tylko raz
        if ($cache === null) {
            $cache = InvestmentSearchforms::pluck('active', 'id')->toArray();
        }

        return $cache[$id] ?? 0;
    }
}
