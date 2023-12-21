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
        Schema::create('qrpasser', function (Blueprint $table) {
            $table->string('id_QRP')->primary(); 
            $table->text('QRdata');
            $table->string('id_QP');
            $table->foreign('id_QP')->references('id_QP')->on('quizpasser');
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
        Schema::dropIfExists('qrpasser');
    }
};
