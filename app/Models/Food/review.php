<?php

namespace App\Models\Food;

use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    protected $table= "reviews";

    protected $fillable = [
        'name',
        'review',
    ];


public $timestamps = true;
}
