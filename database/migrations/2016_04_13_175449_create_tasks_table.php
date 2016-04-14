<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('task_name');
            $table->integer('user_id')->unsigned();
            $table->text('task_description');
            $table->text('deliverable');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('sprint_id')->unsigned();
            $table->foreign('sprint_id')
                ->references('id')
                ->on('sprints');
            $table->text('task_status');
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
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
        Schema::drop('tasks');
    }
}
