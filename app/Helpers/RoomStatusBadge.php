<?php

if (! function_exists('roomStatusBadge')) {
    function roomStatusBadge($number): string
    {
        $number = (int) $number;

        switch ($number) {
            case 1:
                return '<span class="list-status list-status-1 text-uppercase">Dostępne</span>';
            case 2:
                return '<span class="list-status list-status-2 text-uppercase">Rezerwacja</span>';
            case 3:
                return '<span class="list-status list-status-3 text-uppercase">Niedostępne</span>';
            case 4:
                return '<span class="list-status list-status-4 text-uppercase">Wynajęte</span>';
            default:
                return '<span class="list-status list-status-unknown">Nieznany</span>';
        }
    }
}
