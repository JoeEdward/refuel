<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('staff')->except(['show', 'index']);
	}

	public function show(Food $item)
	{
		return view('items.show', ['item' => $item]);
	}

	public function index()
	{
		$items = \DB::select('select * from foods');

		return view('pages.menu', ['items' => $items]);
	}

	public function make()
	{
		return view('pages.additem');
	}

	public function store(Request $request)
	{
		
		$this->validate($request, [
			'name' => 'required',
			'desc' => 'required',
			'type' => 'required',
			'price' => 'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
		]);

		if($request->hasFile('image')) {
			$filename = time()."-".$request->input('name').".".$request->image->getClientOriginalExtension();
			$path = $request->image->storeAs('public', $filename);

		};

		$allergies = "";

		foreach ($request->input('allergies') as $key => $value) {
			$allergies = $allergies . $key . ' ';
		};

		Food::create([
			'name' => $request->input('name'),
			'description' => $request->input('desc'),
			'type' => $request->input('type'),
			'cal' => $request->input('cal'),
			'price' => $request->input('price'),
			'img' => $path,
			'allergies' => $allergies,
		]);

		return redirect('dashboard')->with('status', 'Item Added Successfully');
	}
	public function edit(Food $item)
	{
		return view('items.edit', ['item' => $item]);
	}

	public function update(Request $request, Food $item)
	{
		$food = Food::find($item->id);

		$food->name = $request->input('name');
		$food->description = $request->input('desc');
		$food->type = $request->input('type');
		$food->cal = $request->input('cal');
		
		if($request->hasFile('image')){
			\Storage::delete($item->img);
			
			$filename = time()."-".$request->input('name').".".$request->image->getClientOriginalExtension();
			$path = $request->image->storeAs('public', $filename);
			$food->img = $path;
		}


		$food->save();

		return redirect('dashboard')->with('status', 'Item Updated Successfully');
	}

	public function destroy(Food $item)
	{
		Food::destroy($item->id);

		\Storage::delete($item->img);

		return redirect('dashboard')->with('status', 'Item Deleted');
	}
}
