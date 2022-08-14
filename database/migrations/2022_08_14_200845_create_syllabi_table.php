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
        Schema::create('syllabi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('new_lesson');
            $table->unsignedBigInteger('old_lesson');
            $table->boolean('is_reverse')->default(false);
            $table->timestamps();

            $table->foreign('student_id')
            ->references('id')
            ->on('students')
            ->onDelete('CASCADE');

            $table->foreign('new_lesson')
            ->references('id')
            ->on('lessons')
            ->onDelete('CASCADE');

            $table->foreign('old_lesson')
            ->references('id')
            ->on('lessons')
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
        Schema::dropIfExists('syllabi');
    }
};
