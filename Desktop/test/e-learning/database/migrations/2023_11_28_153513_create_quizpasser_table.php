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
        Schema::create('quizpasser', function (Blueprint $table) {
            $table->string('id_QP')->primary();
            $table->boolean('passer')->default('0');
            $table->string('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->string('id_Q');
            $table->foreign('id_Q')->references('id_Q')->on('quiz');
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
        Schema::dropIfExists('quizpasser');
    }
};
