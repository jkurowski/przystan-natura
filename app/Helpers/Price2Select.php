<?php

if (! function_exists('price2Select')) {
    function price2Select($range): string
    {
        $items = explode(',', $range);
        $html = '';

        foreach ($items as $item) {
            if (strpos($item, '-') !== false) {
                [$from, $to] = explode('-', $item);

                $fromFormatted = number_format((int)$from, 0, ',', ' ');
                $toFormatted   = number_format((int)$to, 0, ',', ' ');

                $label = "{$fromFormatted} - {$toFormatted} zł";
            } else {
                $label = number_format((int)$item, 0, ',', ' ') . ' zł';
            }

            $html .= '<option value="'.$item.'"';
            if (request()->input('price') == $item) {
                $html .= ' selected';
            }
            $html .= '>'.$label.'</option>';
        }

        return $html;
    }
}
