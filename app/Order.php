<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Food;

class Order extends Model
{
	protected $fillable = [
		'user_id', 'completed'
	];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
    	return $this->hasMany(orderItems::class);
    }

    public function addItem($itemId)
    {
    	$this->orderItems()->create([
    		'item_id' => $itemId,
    	]);
    }
    public function current()
    {
        $orders = Order::where('archived', 0)->get();

        return $orders;
    }
}
