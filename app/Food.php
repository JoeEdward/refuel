<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = [
    	'name', 'description', 'type', 'cal', 'img', 'price', 'allergies',
    ];
}
