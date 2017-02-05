<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone');
            $table->timestamps();
        });

        Schema::create('employee_phone', function (Blueprint $table) {
            $table->integer('phone_id')->unsigned();
            $table->integer('employee_id')->unsigned();
            $table->string('data')->nullable();
        });

        // employee_phone
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('employee_phone');
    }
}
