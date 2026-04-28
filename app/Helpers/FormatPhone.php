<?php
function formatPhone($phone)
{
    // Usuń wszystkie znaki nie będące cyfrą
    $raw = preg_replace('/[^0-9]/', '', $phone);

    // Sprawdź czy ma prefix Polska (48)
    $prefix = '';
    if (strlen($raw) > 9) {
        // jeśli zaczyna się od 48 -> +48
        if (substr($raw, 0, 2) == '48') {
            $prefix = '+48 ';
            $raw = substr($raw, 2);
        }
    }

    // Format 3 3 3
    $formatted = preg_replace('/(\d{3})(\d{3})(\d{3})/', '$1 $2 $3', $raw);

    return trim($prefix . $formatted);
}
