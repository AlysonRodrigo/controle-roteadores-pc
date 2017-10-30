<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\User::class,1)->states('admin')->create([
            'email' => 'aci.alyson@gmail.com',
            'name' => 'Alyson Rodrigo Gustavo da Silva',
            'password' => bcrypt('ufpb2014')
        ]);

        factory(\App\Models\User::class,20)->states('manager')->create();
    }
}
