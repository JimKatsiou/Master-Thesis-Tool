<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorsBatteries extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'sensors_batteries';
}

?>
