<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 59)->create();

        factory(User::class)->create([
            'name' => 'pato',
            'email' => 'pato@cuack.com',
        ]);
    }
}
