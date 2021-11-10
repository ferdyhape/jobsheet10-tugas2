<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaMatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mahasiswa_id')->nullable();
            $table->unsignedInteger('matakuliah_id')->nullable();
            $table->integer('nilai');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('Nim')->on('mahasiswa');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah');
        });
        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
}
