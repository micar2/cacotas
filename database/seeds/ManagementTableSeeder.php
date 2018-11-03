<?php

use Illuminate\Database\Seeder;

class ManagementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Management::class, 1000)->create();
    }
}
