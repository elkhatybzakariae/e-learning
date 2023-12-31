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
        Schema::create('role_user', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('id_U');
            $table->string('id_R');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->foreign('id_R')->references('id_R')->on('roles');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
    
};
