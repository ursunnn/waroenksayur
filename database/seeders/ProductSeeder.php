<?php

namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //        THIS IS A TESTING SEEDER
                $faker=Faker::create('id_ID');
                for($i =0;$i<20;$i++){
                    Product::query()->insert([
                        [
                            'category_id'=>$faker->numberBetween(1,4),
                            'title'=>'Sayur dan buah-buahan '.$i,
                            'description'=>'Ini adalah deskripsi buah dan sayuran',
                            'image'=>'Gambar cover.png',
                            'price'=>12000,
                            'stock'=>$i*5
                        ],
                ]);

                }
            }
}
