<?php

namespace Database\Seeders;

use App\Models\Rent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class RentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carbon::setLocale('id');
    }
}
