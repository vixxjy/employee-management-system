<?php

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
            $table->integer('employee_code')->unique();
            $table->date('joined_date');
            $table->string('department');
            $table->string('designation');
            $table->string('qualification');
            $table->string('experience');
            $table->string('fname');
            $table->string('lname');
            $table->string('mdname');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('state');
            $table->string('local_area');
            $table->integer('phone');
            $table->string('email');
            $table->string('file');
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
        Schema::drop('employees');
    }
}
