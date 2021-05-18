<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Item extends Model
{
    use HasFactory;


    protected $table = "items";

    protected $fillable = [
        'city',
        'slug',
        'description',

    ];

    public static $validationRules = [
        'city' => 'required|string|max:256',
        'slug' => 'required|unique:items|string|max:256',
        'description' => 'required|string|max:256',

    ];
}
