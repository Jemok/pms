<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_users', function (Blueprint $table) {
            $table->integer('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->integer('task_id');
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
        Schema::drop('task_users');
    }
}
