<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'username');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->text('address1')->nullable();
            $table->text('address2')->nullable();
            $table->string('city')->nullable()->change();
            $table->string('state')->nullable();
            $table->integer('zipcode')->nullable();
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

