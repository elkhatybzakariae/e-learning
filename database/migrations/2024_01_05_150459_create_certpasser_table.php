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
        Schema::create('certpasser', function (Blueprint $table) {
            $table->string('id_CertP')->primary();
            $table->boolean('passer')->default(0);
            $table->boolean('valider')->default(0);
            $table->string('id_U');
            $table->foreign('id_U')->references('id_U')->on('users');
            $table->string('id_Cert');
            $table->foreign('id_Cert')->references('id_Cert')->on('certificates');
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
        Schema::dropIfExists('certpasser');
    }
};
