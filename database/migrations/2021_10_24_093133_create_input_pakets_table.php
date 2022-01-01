<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInputPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('input_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('skpd_id');
            $table->foreign('skpd_id')->references('id')->on('skpds')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tahun', 8);
            $table->enum('pilih', ['tender', 'non tender']);
            $table->string('namaPaket');
            $table->string('namaPenyedia');
            $table->string('nomorKontrak');
            $table->date('awalPelaksanaan');
            $table->date('akhirPelaksanaan');
            $table->bigInteger('paguAnggaran');
            $table->bigInteger('nilaiKontrak');
            $table->bigInteger('nilaiHps');
            $table->bigInteger('efisiensi');
            $table->softDeletes();
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
        Schema::dropIfExists('input_pakets');
    }
}
