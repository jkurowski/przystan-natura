<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvestmentSalePoint extends Model
{
    protected $fillable = [
        'type',
        'name',
        'province',
        'district',
        'municipality',
        'city',
        'street',
        'building_number',
        'apartment_number',
        'postal_code',
        'additional_locations',
        'contact_method',
        'full_address',
        'phone_numbers',
        'email_addresses',
        'opening_hours',
        'opening_hours_note',
        'position'
    ];
}
