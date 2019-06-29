<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table): void {
            $table->increments('id');
            $table->integer('assignedto')->unsigned()->index();
            $table->foreign('assignedto')->references('id')->on('users')->onDelete('cascade');
            $table->string('taskname')->unique();
            $table->string('description');
            $table->string('statue');
            $table->string('attachfile');
            $table->date('deadline');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
}
