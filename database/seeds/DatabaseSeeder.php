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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        $this->call(OrdersArticlesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(ManagementTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
