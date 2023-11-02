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
        Schema::create('cours', function (Blueprint $table) {
            $table->string('id_C')->primary();
            $table->string('title');
            $table->text('info');
            $table->text('description')->nullable();
            $table->text('Prerequisites')->nullable();
            $table->float('price');
            $table->integer('coupon')->nullable();
            $table->boolean('valider')->default(false);
            $table->boolean('terminer')->default(false);
            $table->string('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->string('id_Sj');
            $table->foreign('id_Sj')->references('id_Sj')->on('sujets');
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
        Schema::dropIfExists('cours');
    }
};
