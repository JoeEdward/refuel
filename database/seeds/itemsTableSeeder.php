<?php

use Illuminate\Database\Seeder;

class itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$i = rand(0,10);

    	$img = ['public/1516100013-Pizza.jpg', 'public/1516192709-Test.jpeg'];

       	DB::table('foods')->insert([
       		'name' => 'test'. $i ,
       		'description' => 'test'. $i . ' Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Velit egestas dui id ornare arcu.',
       		'type' => 'pizza',
       		'price' => rand(0, 10),
       		'img' => $img[rand(0,1)],
       		'allergies' => 'N/A',
       	]);
    }
}
