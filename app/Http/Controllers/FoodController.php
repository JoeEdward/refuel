<?php

// Controller to manage all processes to do with foods in the program
//
// Copyright Joe Edwards
// Developed under the MIT license


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
	public function __construct()
	{

		//Set Access Rights for the controller functions 

		$this->middleware('auth');
		$this->middleware('staff')->except(['show', 'index']);
	}

	public function show(Food $item)
	{
		// Gets all the items in the table and returns them to the view

		return view('items.show', ['item' => $item]);
	}

	public function index()
	{
		// Returns all the items in the table to a view

		$items = \DB::select('select * from foods');

		return view('pages.menu', ['items' => $items]);
	}

	public function make()
	{
		return view('pages.additem');
	}

	public function store(Request $request)
	{

		// Function makes new food records and stores them in the database
		

		// Validate the request sent from the previous page
		$this->validate($request, [
			'name' => 'required',
			'desc' => 'required',
			'type' => 'required',
			'price' => 'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
		]);

		// Unwrap the image file and give it a name and store it in the files of the program.
		if($request->hasFile('image')) {
			$filename = time()."-".$request->input('name').".".$request->image->getClientOriginalExtension();
			$path = $request->image->storeAs('public', $filename);

		};

		$allergies = "";

		// Iterate over allergies array sent from view and mark them for storage
		foreach ($request->input('allergies') as $key => $value) {
			$allergies = $allergies . $key . ' ';
		};


		// Finally make the actual record and store it in the database.
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

		// Update all fields for the record and save them to the record
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
		// Delete the record from the database and remove the image file from storage.

		Food::destroy($item->id);

		\Storage::delete($item->img);

		return redirect('dashboard')->with('status', 'Item Deleted');
	}
}
