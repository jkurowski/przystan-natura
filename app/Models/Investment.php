<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

use Spatie\Activitylog\LogOptions;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Translatable\HasTranslations;

class Investment extends Model
{

    use LogsActivity, HasSlug;
    //public array $translatable = ['name', 'entry_content', 'content', 'end_content', 'meta_title', 'meta_description', 'popup_text'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'status',
        'progress',
        'name',
        'slug',
        'address',
        'city_id',
        'gallery_id',
        'commercial',
        'date_start',
        'date_end',
        'areas_amount',

        'area_range',
        'room_range',
        'floor_range',
        'price_range',
        'search_form',

        'sort',
        'youtube',
        'mockup',
        'office_address',
        'office_emails',
        'meta_title',
        'meta_description',
        'meta_robots',

        'lat',
        'lng',
        'zoom',

        'entry_content',
        'content',
        'end_content',
        'contact_content',
        'location_content',
        'advantage_content',
        'stages_content',
        'property_content',

        'show_prices',
        'show_properties',
        'show_pricehistory',

        'file_thumb',
        'file_advantage',
        'file_logo',
        'gradient_header',
        'gradient_thumb',
        'popup_status',
        'popup_mode',
        'popup_timeout',
        'popup_text',
        'supervisors',
        'template_id',
        'iframe_css',
        'file_brochure',

        'inv_province',
        'inv_county',
        'inv_municipality',
        'inv_city',
        'inv_street',
        'inv_property_number',
        'inv_postal_code',
        'inv_phone',
        'company_id',
        'sale_point_id',

        'vox_url'
    ];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    /**
     * Get investment plan
     * @return HasOne
     */
    public function plan(): HasOne
    {
        return $this->hasOne('App\Models\Plan');
    }

    /**
     * Get investment floors
     * @return HasMany
     */
    public function floors(): HasMany
    {
        return $this->hasMany('App\Models\Floor')->orderByDesc('position');
    }

    /**
     * Get a list of floor ids and names for the investment.
     *
     */
    public function selectFloors()
    {
        return $this->floors()->orderByDesc('position')->pluck('name', 'id');
    }

    /**
     * Get investment floor
     * @return HasOne
     */
    public function floor(): HasOne
    {
        return $this->hasOne('App\Models\Floor');
    }

    /**
     * Get investment city
     */
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function others(int $status, int $limit = 5)
    {
        return self::where('status', $status)
            ->where('id', '!=', $this->id)
            ->limit($limit)
            ->get();
    }

    public function stages()
    {
        return $this->hasMany(InvestmentStage::class)->orderBy('position');
    }

    /**
     * Get flats belonging to the floors of the investment
     * @return HasManyThrough
     */
    public function floorRooms(): HasManyThrough
    {
        return $this->hasManyThrough(
            'App\Models\Property',
            'App\Models\Floor',
            'investment_id',
            'floor_id',
            'id',
            'id'
        )->orderBy('status', 'asc');
    }

    /**
     * Get investment building
     * @return HasOne
     */
    public function building(): HasOne
    {
        return $this->hasOne('App\Models\Building');
    }

    /**
     * Get investment buildings
     * @return HasMany
     */
    public function buildings(): HasMany
    {
        return $this->hasMany('App\Models\Building')->where('active', 1);
    }

    /**
     * Get investment buildings
     * @return HasMany
     */
    public function allBuildings(): HasMany
    {
        return $this->hasMany('App\Models\Building');
    }

    /**
     * Get investment floors
     * @return HasMany
     */
    public function buildingFloors(): HasMany
    {
        return $this->hasMany('App\Models\Floor');
    }

    /**
     * Get investment sections
     * @return HasMany
     */
    public function sections(): HasMany
    {
        return $this->hasMany('App\Models\InvestmentSection');
    }

    /**
     * Get flats belonging to the floors of the investment
     * @return HasManyThrough
     */
    public function buildingRooms(): HasManyThrough
    {
        return $this->hasManyThrough(
            'App\Models\Property',
            'App\Models\Building',
            'investment_id',
            'building_id',
            'id',
            'id'
        )->where('buildings.active', 1);
    }

    public function advantages()
    {
        return $this->hasMany(InvestmentAdvantage::class)
            ->orderBy('position');
    }

    /**
     * Get investment properties
     * @return HasMany
     */
    public function properties(): HasMany
    {
        return $this->hasMany('App\Models\Property')->orderBy('status', 'asc');
    }

    /**
     * Get investment pages
     * @return HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany('App\Models\InvestmentPage')->orderBy('sort', "ASC")->where('active', 1);
    }

    /**
     * Get investment properties
     * @return HasMany
     */
    public function searchProperties(): HasMany
    {
        return $this->hasMany('App\Models\Property')
            ->select([
                'id',
                'client_id',
                'investment_id',
                'building_id',
                'price',
                'price_brutto',
                'floor_id',
                'garden_area',
                'balcony_area',
                'terrace_area',
                'loggia_area',
                'name',
                'status',
                'rooms',
                'area',
                'views',
                'active',
                'updated_at',
                'type'
            ])
            ->with('floor');
    }

    /**
     * Get investment properties
     * @return HasMany
     */
    public function selectProperties(): HasMany
    {
        return $this->hasMany('App\Models\Property')->select(['investment_id', 'id', 'name', 'type']);
    }

    /**
     * Get available investment properties (status = 1)
     * @return HasMany
     */
    public function selectAvailableProperties(): HasMany
    {
        return $this->hasMany('App\Models\Property')
            ->where('status', 1)
            ->whereNull('client_id')
            ->select(['investment_id', 'id', 'name', 'type']);
    }

    /**
     * Get payments for investment
     * @return HasMany
     */
    public function payments(): HasMany
    {
        return $this->hasMany('App\Models\InvestmentPayment');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'gallery_id', 'gallery_id')->orderBy('sort');
    }

    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        self::deleting(function ($investment) {
            $investment->floors()->each(function($floor) {
                $floor->delete();
            });

            $investment->buildings()->each(function($building) {
                $building->delete();
            });

            $investment->properties()->each(function($property) {
                $property->delete();
            });
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        $logOptions = new LogOptions();
        $logOptions->useLogName('Investycje');
        $logOptions->logFillable();

        return $logOptions;
    }

    public function investmentTemplates():HasOne
    {
        return $this->hasOne(InvestmentTemplates::class);
    }

    // API

    public function company(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(InvestmentCompany::class);
    }
    public function salePoint(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(InvestmentSalePoint::class);
    }

    public function activeProperties(): HasMany
    {
        return $this->hasMany('App\Models\Property')->where('status', 1);
    }

}
