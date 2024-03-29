<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sensor extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'sensors';
    protected $cast = ['technology_id' => 'integer'];

}


?>
