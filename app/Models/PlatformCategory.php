<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformCategory extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'platform_category';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];
}
