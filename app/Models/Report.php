<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Report extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'creation_date' => 'datetime',
        'revision_date' => 'datetime',
        'period_start_date' => 'datetime',
        'period_end_date' => 'datetime',
    ];

    /**
     * Get the country of departure.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countryOfDeparture(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id_of_departure');
    }

    /**
     * Get the country of return.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countryOfReturn(): BelongsTo
    {
        return $this->belongsTo(Country::class, 'country_id_of_return');
    }

    /**
     * Get the port of departure.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portOfDeparture(): BelongsTo
    {
        return $this->belongsTo(SeaPort::class, 'port_id_of_departure');
    }

    /**
     * Get the port of return.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function portOfReturn(): BelongsTo
    {
        return $this->belongsTo(SeaPort::class, 'port_id_of_return');
    }

    /**
     * Get the data access restriction.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dataAccessRestriction(): BelongsTo {
        return $this->belongsTo(DataAccessRestriction::class);
    }

    /**
     * Get the platform.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function platform(): BelongsTo {
        return $this->belongsTo(Platform::class);
    }

    /**
     * Get the platform category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function platformCategory(): BelongsTo {
        return $this->belongsTo(PlatformCategory::class);
    }

    /**
     * Get the parameters.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function parameters(): BelongsToMany
    {
        return $this->belongsToMany(
            SeaScapeParameter::class,
            'sea_scape_parameters_to_report'
        );
    }

    /**
     * Get the instruments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function instruments(): BelongsToMany
    {
        return $this->belongsToMany(
            Instrument::class,
            'instruments_to_reports'
        );
    }
}
