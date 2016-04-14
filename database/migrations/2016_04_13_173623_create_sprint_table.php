<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprint', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('project_id');
            $table->string('sprint_name');
            $table->string('sprint_description');
            $table->text('deliverable');
            $table->text('milestone');
            $table->text('sprint_task');
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
        Schema::drop('sprint');
    }
}
