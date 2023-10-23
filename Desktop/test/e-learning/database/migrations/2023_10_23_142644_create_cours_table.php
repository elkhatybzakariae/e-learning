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
            $table->id('id_C');
            $table->string('title');
            $table->text('info');
            $table->text('description')->nullable();
            $table->text('Prerequisites')->nullable();
            $table->float('price');
            $table->date('lastmodi');
            $table->integer('coupon')->nullable();
            $table->unsignedBigInteger('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->unsignedBigInteger('id_Sj');
            $table->foreign('id_Sj')->references('id_Sj')->on('sujets');
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
