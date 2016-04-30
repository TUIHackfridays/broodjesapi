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
        $this->command->info('Providers table seeded!');

        # Sandwiches
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
        $this->command->info('Sandwiches table seeded!');

        # Orders
        DB::table('orders')->truncate();
        foreach (range(1,5) as $index) {
          DB::table('orders')->insert([
            'customer_id' => rand(1, 5),
            'provider_id' => rand(1, 5),
            'price' => $faker->randomFloat(null, 20, 30),
            'paid' => true,
            'created_at' => new Carbon(),
            'updated_at' => new Carbon()
          ]);
        }
        $this->command->info('Orders table seeded!');

        # Order items
        DB::table('order_items')->truncate();
        foreach (range(1,10) as $index) {
          DB::table('order_items')->insert([
            'order_id' => rand(1, 5),
            'sandwich_id' => rand(1, 10),
            'provider_id' => rand(1, 5),
            'price' => $faker->randomFloat(null, 1, 4),
            'created_at' => new Carbon(),
            'updated_at' => new Carbon()
          ]);
        }
        $this->command->info('Order items table seeded!');

        #Customers
        DB::table('customers')->truncate();
        foreach (range(1,10) as $index) {
          DB::table('customers')->insert([
            'name_company' => $faker->name,
            'name_contact' => $faker->name,
            'street' => $faker->streetName,
            'nr' => rand(1, 255),
            'zip' => 8400,
            'city' => 'Oostende',
            'country' => 'Belgium',
            'phone' => $faker->phoneNumber,
            'created_at' => new Carbon(),
            'updated_at' => new Carbon()
          ]);
        }
        $this->command->info('Customers table seeded!');
    }
}
