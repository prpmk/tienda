<?php

//namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use App\Product;

//class DatabasSeeder extends Seeder
class ProductTableSeeder extends Seeder

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
            'name' => 'playera 1',
            'slug' => 'playera-1',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'extract' => 'Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
            'price' => 100,
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
            'visible' => 1,
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
            'category_id' => 1
            ],
            [
              'name' => 'playera 2',
              'slug' => 'playera-2',
              'description' => '2.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
              'extract' => '2.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
              'price' => 200,
              'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
              'visible' => 1,
              'created_at' => new DateTime,
              'updated_at' => new DateTime,
              'category_id' => 1
              ],
              [
                'name' => 'playera 3',
                'slug' => 'playera-3',
                'description' => '3.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                'extract' => '3.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                'price' => 300,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                'visible' => 1,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
                'category_id' => 1
                ],
                [
                  'name' => 'playera 4',
                  'slug' => 'playera-4',
                  'description' => '4.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                  'extract' => '4.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                  'price' => 400,
                  'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                  'visible' => 1,
                  'created_at' => new DateTime,
                  'updated_at' => new DateTime,
                  'category_id' => 1
                  ],
                  [
                    'name' => 'playera 5',
                    'slug' => 'playera-5',
                    'description' => '5.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                    'extract' => '5.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                    'price' => 500,
                    'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                    'visible' => 1,
                    'created_at' => new DateTime,
                    'updated_at' => new DateTime,
                    'category_id' => 1
                    ],
                    [
                      'name' => 'playera 6',
                      'slug' => 'playera-6',
                      'description' => '6.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                      'extract' => '6.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                      'price' => 600,
                      'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                      'visible' => 1,
                      'created_at' => new DateTime,
                      'updated_at' => new DateTime,
                      'category_id' => 1
                      ],
                      [
                        'name' => 'playera 7',
                        'slug' => 'playera-7',
                        'description' => '7.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                        'extract' => '7.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                        'price' => 700,
                        'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                        'visible' => 1,
                        'created_at' => new DateTime,
                        'updated_at' => new DateTime,
                        'category_id' => 1
                        ],
                        [
                          'name' => 'playera 8',
                          'slug' => 'playera-8',
                          'description' => '8.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                          'extract' => '8.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                          'price' => 800,
                          'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                          'visible' => 1,
                          'created_at' => new DateTime,
                          'updated_at' => new DateTime,
                          'category_id' => 1
                          ],
                          [
                            'name' => 'playera 9',
                            'slug' => 'playera-9',
                            'description' => '9.-Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                            'extract' => '9.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                            'price' => 900,
                            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                            'visible' => 1,
                            'created_at' => new DateTime,
                            'updated_at' => new DateTime,
                            'category_id' => 1
                            ],
                            [
                              'name' => 'playera 10',
                              'slug' => 'playera-10',
                              'description' => '10.- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                              'extract' => '10.- Magna ubi cupidatat, ullamco ab admodum in ubi id sint amet tempor, fugiat expetendis instituendarum.',
                              'price' => 1000,
                              'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSnzWAgkTuwvSQ811zknRKO_lXO2VAXNNJbUw&usqp=CAU',
                              'visible' => 1,
                              'created_at' => new DateTime,
                              'updated_at' => new DateTime,
                              'category_id' => 1
                              ]
        );
        Product::insert($data);
    }
}
