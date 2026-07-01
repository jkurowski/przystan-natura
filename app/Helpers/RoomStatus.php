<?php

if (! function_exists('roomStatus')) {
    function roomStatus(int $number)
    {
        switch ($number) {
            case '1':
                return 'Dostępny';
            case '2':
                return 'Rezerwacja';
            case '3':
                return 'Sprzedany';
            case '4':
                return 'Wynajęty';
        }
    }
}
