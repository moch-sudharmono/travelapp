<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNullableToTripDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_details', function (Blueprint $table) {
            //
            $table->integer('destination')->nullable()->change();
            $table->integer('timer_id')->nullable()->change();
            $table->integer('service_id')->nullable()->change();
            $table->float('distance')->nullable()->change();
            $table->string('estimated_rate')->nullable()->change();
            $table->string('real_rate')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_details', function (Blueprint $table) {
            //
        });
    }
}
