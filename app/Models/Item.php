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
        'slug' => 'required|unique:items,slug,%MODEL_PRIMARY_KEY_FIELD_VALUE%|string|max:256',
        'description' => 'required|string',
    ];

    public static function getValidationRules()
    {
        $rules = [];
        foreach (self::$validationRules as $field => $rule) {
            $rules[$field] = str_replace('%MODEL_PRIMARY_KEY_FIELD_VALUE%', request('id'), $rule);
        }

        return $rules;
    }
}
