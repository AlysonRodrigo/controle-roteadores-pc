<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAdminData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \App\Models\User::create([
            'name' => 'Alyson Rodrigo Gustavo da Silva',
            'email' => 'aci.alyson@gmail.com',
            'role' => \App\Models\User::ROLE_ADMIN,
            'password' => bcrypt('332109censo'),
            'remember_token' => str_random(10)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $user = \App\Models\User::find(1);
        $user->delete();
    }
}
