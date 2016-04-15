<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')
                ->references('id')
                ->on('teams');
            $table->integer('user_id')->unsigned();
            $table->text('project_description');
            $table->integer('project_status');
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
        Schema::drop('projects');
    }
}
