<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateHostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('hosts', function (Blueprint $table) {
            $table->json('spoken_languages')->nullable();
            $table->json('cities_coverage')->nullable();
            $table->string('car_brand')->nullable();
            $table->integer('car_year')->nullable();
            $table->string('car_model')->nullable();
            $table->integer('car_capacity')->nullable();
            $table->string('car_vin')->nullable();
            $table->integer('car_mileage')->nullable();
            $table->json('car_features')->nullable();
            $table->string('car_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
