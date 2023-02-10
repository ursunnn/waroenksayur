<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::query()->insert([
            [
                'name'=>'Benyamin',
                'email'=>'admin@gmail.com',
                'password'=>Hash::make('password'),
                'role'=>'Admin',
                'address'=>'jalan kemanggisan',
                'phone'=>'08123456789'

            ],
           [
               'name'=>'Bunga',
               'email'=>'b@b.com',
               'password'=>Hash::make('asdfasdf'),
               'role'=>'Member',
               'address'=>'jalan kemanggisan',
               'phone'=>'08123456789'
           ],
           [
               'name'=>'Aldo',
               'email'=>'c@c.com',
               'password'=>Hash::make('asdfasdf'),
               'role'=>'Member',
               'address'=>'jalan kemanggisan',
               'phone'=>'08123456789'
           ]
        ]);
    }
}
