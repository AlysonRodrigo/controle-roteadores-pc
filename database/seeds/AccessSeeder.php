<?php

use Illuminate\Database\Seeder;

class AccessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\RouteAccess::class,20)->create();
    }
}
