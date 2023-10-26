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
        Schema::create('coursvalidation', function (Blueprint $table) {
            $table->id('id_CV');
            $table->boolean('valider')->default(false);
            $table->unsignedBigInteger('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->unsignedBigInteger('id_C');
            $table->foreign('id_C')->references('id_C')->on('cours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursvalidation');
    }
};
