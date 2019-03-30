<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id');
            $table->integer('from_city_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('tags');
            $table->boolean('is_old')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_trips');
    }
}
