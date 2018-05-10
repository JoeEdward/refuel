<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use \App\OrderItems;
use \App\Order;

class OrderController extends Controller
{
	public function __contsruct()
	{
		$this->middleware('auth');
	}


	public function addToCart(Food $item)
	{

		$order = NULL;

		if(empty(auth()->user()->orders[0]) == false) {

			foreach(auth()->user()->orders as $i) {

				if($i->ordered){
					return redirect('dashboard')->with('status', 'You Have The Max Number of orders');
				}
				else{

					if (date('d', strtotime($i->created_at)) == date('d')){
						$order = $i;
					}
					else{
						auth()->user()->newOrder();

						$order = auth()->user()->orders[count(auth()->user()->orders)-1];
					}
				}
			}
		}

		else {
			auth()->user()->newOrder();

			$order = auth()->user()->orders[count(auth()->user()->orders)-1];
		}

		$order->addItem($item->id);

		$order->price += $item->price;

		$order->ordered = 0;

		$order->save();

		return redirect('cart');
	}

	public function show()
	{
		return view('orders.cart');
	}

	public function destroy(Order $order)
	{
		foreach ($order->orderItems as $item) {
			OrderItems::destroy($item->id);
		}

		Order::destroy($order->id);
	}

	public function destroyItem(OrderItems $item)
	{
		OrderItems::destroy($item->id);


		if(empty($item->order[0])){
			\App\Order::destroy($item->order->id);
		}

		return back();
	}

	public function index()
	{
		$orders = \App\Order::where('archived',  0)->get();


		return view('orders.index', ['orders' => $orders]);
	}

	public function place(Order $order)
	{
		$order->ordered = true;

		$order->completed = 1;

		$order->save();

		return redirect('dashboard')->with('status', 'Order Placed');
	}

	public function finish(Order $order)
	{
		$order->completed = 3;

		//$order->archived = 1;

		$order->save();

		return back();
	}
}
