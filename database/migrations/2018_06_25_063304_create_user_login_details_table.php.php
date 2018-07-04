<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLoginDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('user_login_details', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id');
            $table->date('clock_in_date')->nullable();
            $table->dateTime('clock_in_time')->nullable();
            $table->date('clock_out_date')->nullable();
            $table->dateTime('clock_out_time')->nullable();
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
        Schema::dropIfExists('user_login_details');
    }
}
