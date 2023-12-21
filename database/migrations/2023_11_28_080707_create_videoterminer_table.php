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
        Schema::create('videoterminer', function (Blueprint $table) {
            $table->string('id_VT')->primary();
            $table->boolean('terminer')->default('0');
            $table->string('id_V');
            $table->foreign('id_V')->references('id_V')->on('videos');
            $table->string('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
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
        Schema::dropIfExists('videoterminer');
    }
};
