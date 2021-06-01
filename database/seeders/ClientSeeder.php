<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cities;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run(){
            $faker = Faker::create();
            for ($i=0; $i < 20; $i++) {
                  \DB::table("client")->insert(
                        array(
                              'cod'      => $faker->biasedNumberBetween('1000','10000'),
                              'name'     => $faker->firstName,
                              'created_at' => date('Y-m-d H:m:s'),
                              'updated_at' => date('Y-m-d H:m:s'),
                              'city'     => Cities::all()->random()->id,
                              
						)
                  );
            }
      }
}
