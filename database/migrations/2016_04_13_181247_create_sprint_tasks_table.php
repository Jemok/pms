<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintTaskTable extends Migration
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
                ->reference('id')
                ->on('sprints');
            $table->foreign('task_id')
                ->reference('id')
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
