<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoraSolutions extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'lora_solutions';
    protected $fillable = ['id'];

}
