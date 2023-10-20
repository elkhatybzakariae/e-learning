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
        Schema::create('sous_categories', function (Blueprint $table) {
            $table->id('id_SCat');
            $table->string('SCatName');
            $table->unsignedBigInteger('id_Cat');
            $table->foreign('id_Cat')->references('id_Cat')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sous_categories');
    }
};
