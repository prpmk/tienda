<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Category;

//class DatabasSeeder extends Seeder
class CategoryTableSeeder extends Seeder

{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('users')->insert([
          //  'name' => Str::random(10),
          //  'email' => Str::random(10).'@gmail.com',
          //  'password' => Hash::make('password'),
        //]);
        $data = array(
          [
            'name' => 'Super heroes',
            'slug' => 'super heroes',
            'description' => 'lorem ipsum dolor sit amet, consectetur adispisicing elit Tempore, perferendis!',
            'color' => '#440022'
            ],
            [
              'name' => 'Geek',
              'slug' => 'geek',
              'description' => 'lorem ipsum dolor sit amet, consectetur adispisicing elit Tempore, perferendis!',
              'color' => '#445500'
              ]
        );
        Category::insert($data);
    }
}
