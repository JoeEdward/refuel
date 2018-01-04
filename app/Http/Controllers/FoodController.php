<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
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
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
		]);

		if($request->hasFile('image')) {
			dd('filefound');
		};

		dd(\Input::file('image'));

		Food::create([
			'name' => $request->input('name'),
			'description' => $request->input('desc'),
			'type' => $request->input('type'),
			'cal' => $request->input('cal'),
			'img' => $request->input('image')
		]);

		return back();
	}
}