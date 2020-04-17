<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(add_data_to_categories_table::class);
        $this->call(ProduitsTableSeeder::class);
    }
}
