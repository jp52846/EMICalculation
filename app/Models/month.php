<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class month extends Model
{
    use HasFactory;

    public $fillable= [
        'month'
    ];
    public $timestamps = true;
}
