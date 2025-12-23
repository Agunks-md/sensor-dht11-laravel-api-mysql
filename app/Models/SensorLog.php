<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorLog extends Model
{
    use HasFactory;

    protected $table = 'sensor_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'temp',
        'is_fire',
        'is_smoke',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'temp' => 'float',
        'is_fire' => 'boolean',
        'is_smoke' => 'boolean',
    ];
}


