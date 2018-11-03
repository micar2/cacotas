<?php

use Illuminate\Database\Seeder;

class OrdersArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\OrdersArticles::class, 1000)->create();
    }
}
