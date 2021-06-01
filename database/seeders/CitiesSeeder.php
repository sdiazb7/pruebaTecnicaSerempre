<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run(){
		  
		  
		  $cities = array(
          ['id' => '1','cod' => 12342, 'name' => 'Cali', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
          ['id' => '2','cod' => 12340, 'name' => 'Bogota', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '3','cod' => 12341, 'name' => 'Medellin', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '4','cod' => 12343, 'name' => 'Barranquilla', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '5','cod' => 12344, 'name' => 'Cartagena', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '6','cod' => 12345, 'name' => 'Neiva', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '7','cod' => 12346, 'name' => 'Ibague', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '8','cod' => 12347, 'name' => 'Cartagena', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '9','cod' => 12348, 'name' => 'Cali', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  ['id' => '10','cod' => 12349, 'name' => 'Villavicencio', 'created_at' => date('Y-m-d H:m:s') ,'updated_at' => date('Y-m-d H:m:s')],
		  );
		  
            $faker = Faker::create();
            \DB::table("cities")->insert($cities);
            
      }
}
