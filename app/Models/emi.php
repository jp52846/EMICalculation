<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emi extends Model
{
    use HasFactory;

    public $fillable= [
        'amount', 'interest', 'duration', 'duration_id'
    ];
    public $timestamps = true;
}
