<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouteAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('route_accesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',255);
            $table->string('route_user');
            $table->string('route_password');
            $table->string('ppoe_user');
            $table->string('ppoe_password');
            $table->string('wifi_user');
            $table->string('wifi_password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('route_accesses');
    }
}
