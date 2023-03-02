<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('todo_id');
            $table->string('name');
            $table->integer('priority')->comment('1=High, 2=Medium, 3=Low');
            $table->integer('status')->comment('1=active, 2=processign,3=done, 4=checking, 5=completed');
            $table->integer('order');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('todo_id')->references('id')->on('todos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
