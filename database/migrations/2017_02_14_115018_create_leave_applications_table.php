<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applications', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('leave_category_id')->unsigned;
            $table->integer('user_id')->unsigned();
            $table->string('leave_id')->unique();
            $table->string('title');
            $table->date('leave_from');
            $table->date('leave_to');
//             $table->string('priority');
            $table->text('reason');
            $table->string('status');
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
        Schema::drop('leave_applications');
    }
}
