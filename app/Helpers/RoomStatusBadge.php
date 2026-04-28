<?php

if (! function_exists('roomStatusBadge')) {
    function roomStatusBadge($number): string
    {
        $number = (int) $number;

        switch ($number) {
            case 1:
                return '<span class="status-1"><strong>DOSTĘPNY</strong></span>';
            case 2:
                return '<span class="status-2"><strong>REZERWACJA</strong></span>';
            case 3:
                return '<span class="status-3"><strong>SPRZEDANY</strong></span>';
            default:
                return '<span class="status-2"><strong>NIEZNANY</strong></span>';
        }
    }
}
