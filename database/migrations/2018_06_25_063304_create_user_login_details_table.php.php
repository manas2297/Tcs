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
            $table->increments('user_id');
            $table->timestamp('clock_in_at')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


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
