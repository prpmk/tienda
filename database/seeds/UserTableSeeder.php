<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
          [
            'name' => 'Oved',
            'last_name' => 'FiSo',
            'email' => 'ovedfs@gmail.com',
            'user' => 'ovedfs',
            'password' => \Hash::make('123456'),
            'type' => 'admin',
            'active' => 1,
            'address' => 'San cosme 290, iztapalapa, df',
            'created_at' => new DateTime,
            'updated_at' => new DateTime
            ],
            [
              'name' => 'Adela',
              'last_name' => 'Torres',
              'email' => 'Adela@gmail.com',
              'user' => 'adela',
              'password' => \Hash::make('123456'),
              'type' => 'user',
              'active' => 1,
              'address' => 'jalisco 690, iztapalapa, df',
              'created_at' => new DateTime,
              'updated_at' => new DateTime
              ],
        );
        User::insert($data);
    }
}
