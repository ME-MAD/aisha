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
        Schema::create('student_lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('group_id');
            $table->boolean('finished')->default(false);
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('CASCADE');

            $table->foreign('lesson_id')
            ->references('id')
            ->on('lessons')
            ->onDelete('CASCADE');

            $table->foreign('group_id')
            ->references('id')
            ->on('groups')
            ->onDelete('CASCADE');

            

        
        });

        



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_lessons');
    }
};
