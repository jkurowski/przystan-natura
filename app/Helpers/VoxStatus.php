<?php
if (! function_exists('VoxStatus')) {
    function voxStatus(int $number): string
    {
        switch ($number) {
            case 1:
                return '<i class="fe-check-circle text-success"></i> Dostępne';
            case 2:
                return '<i class="fe-clock text-warning"></i> Rezerwacja ustna';
            case 3:
                return '<i class="fe-file-text text-info"></i> Umowa rezerwacyjna';
            case 4:
                return '<i class="fe-x-circle text-danger"></i> Sprzedane';
            case 5:
                return '<i class="fe-edit text-primary"></i> Umowa przedwstępna';
            case 6:
                return '<i class="fe-home text-primary"></i> Umowa deweloperska';
            case 7:
                return '<i class="fe-book text-dark"></i> Akt notarialny';
            case 8:
                return '<i class="fe-package text-success"></i> Odbiór';
            case 9:
                return '<i class="fe-pause-circle text-muted"></i> Wstrzymany';
            default:
                return '<i class="fe-help-circle text-muted"></i> Nieznany status';
        }
    }
}
