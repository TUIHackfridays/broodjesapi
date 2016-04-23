<?php

use Illuminate\Database\Seeder;
use Cloudoki\OaStack\Seeds\OaStackSeeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Oauth2-Stack dependency
        if (class_exists ('Cloudoki\OaStack\Seeds\OaStackSeeder'))
        $this->call(OaStackSeeder::class);

        $faker = Faker::create();

        # Providers
        DB::table('providers')->truncate();
        foreach (range(1,10) as $index) {
          DB::table('providers')->insert([
            'name' => $faker->name,
            'created_at' => new Carbon(),
            'updated_at' => new Carbon()
          ]);
        }

        #Sandwiches
        DB::table('sandwiches')->truncate();
        foreach (range(1,20) as $index) {
          DB::table('sandwiches')->insert([
            'name' => $faker->name,
            'description' => $faker->realText(),
            'price' => $faker->randomFloat(null, 1, 4),
            'provider_id' => rand(1,10),
            'created_at' => new Carbon(),
            'updated_at' => new Carbon()
          ]);
        }
    }
}
