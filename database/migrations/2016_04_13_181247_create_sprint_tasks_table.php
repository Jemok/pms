<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint_tasks', function (Blueprint $table) {
            $table->integer('sprint_id')->unsinged();
            $table->integer('task_id')->unsigned();
            $table->foreign('sprint_id')
                ->references('id')
                ->on('sprints');
            $table->foreign('task_id')
                ->references('id')
                ->on('tasks');
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
        Schema::drop('sprint_tasks');
    }
}
