<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::query()->insert([
            ['name'=>'Sayuran Hidroponik'],
            ['name'=>'Sayuran organik'],
            ['name'=>'Buah Tropis'],
            ['name'=>'Buah Berries']
        ]);
    }
}
