<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor30100_model extends Model
{
    protected $table = "max30100";
    protected $primaryKey = "id";
    protected $fillable = ['NPM', 'SpO2'];
}
