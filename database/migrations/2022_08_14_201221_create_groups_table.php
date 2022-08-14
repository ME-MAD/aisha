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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->time('from');
            $table->time('to');
            $table->unsignedBigInteger('teacher_id');
            $table->enum('age_type', ['kid', 'adult']);
            $table->text('note');
            $table->timestamps();


            $table->foreign('teacher_id')
                ->references('id')
                ->on('teachers')
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
        Schema::dropIfExists('groups');
    }
};
