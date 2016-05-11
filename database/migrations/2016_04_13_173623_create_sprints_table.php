<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('sprint_name');
            $table->text('sprint_description');
            $table->text('deliverable');
            $table->text('milestone');
            $table->foreign('project_id')
                ->references('id')
                ->on('projects');
            $table->timestamps();
            $table->dateTime('started_at');
            $table->dateTime('ended_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sprints');
    }
}
