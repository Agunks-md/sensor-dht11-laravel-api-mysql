<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dht11_model extends Model
{
    use HasFactory;
    protected $table = "dht11";
    protected $primaryKey = "id";
    protected $fillable = ['temperature', 'humidity'];
}
