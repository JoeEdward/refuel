<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{

	protected $fillable = [
		'item_id',
	];

    public function order()
    {
    	return $this->belongsTo(Order::class);
    }

    public function item()
    {
    	return $this->belongsTo(Food::class);
    }
}
