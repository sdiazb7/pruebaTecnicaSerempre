<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
      public function run(){
            $faker = Faker::create();
            for ($i=0; $i < 50; $i++) {
                  \DB::table("users")->insert(
                        array(
						
                              'name'     => $faker->firstName,
                              'email'    => $faker->email,
							  'password'    => '$2y$10$7ViCLER9YMMPexroLX210OqNmqjYbPl44a6Q1SWIxs9pQk6YAuMLy',
                              'created_at' => date('Y-m-d H:m:s'),
                              'updated_at' => date('Y-m-d H:m:s')
                        )
                  );
            }
      }
}
