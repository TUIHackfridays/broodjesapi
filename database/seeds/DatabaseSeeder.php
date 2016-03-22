<?php

use Illuminate\Database\Seeder;
use Cloudoki\OaStack\Seeds\OaStackSeeder;

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
    }
}
