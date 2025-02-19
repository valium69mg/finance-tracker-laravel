<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $fillable = [
        "userid",
        "amount",
        "concept",
        "category",
        "frequency",
    ];
}

