<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NbSolutions extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'nb_iot_solutions';
    protected $fillable = ['id', 'nb_sensors_type_a'];

}
