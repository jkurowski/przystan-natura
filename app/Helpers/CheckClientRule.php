<?php

use App\Models\ClientRules;

if (! function_exists('clientRule')) {
    function clientRule(int $rule_id, int $client_id)
    {
        $rule = ClientRules::where('client_id', $client_id)
            ->where('rule_id', $rule_id)
            ->latest()
            ->first(); // Use first() instead of get() to retrieve only one record

        if ($rule) {
            return roomStatusBadge($rule->status); // Access the status attribute of the latest ClientRules record
        } else {
            // Handle the case where no matching record is found
            return 'No record found';
        }
    }
}
