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
        Schema::create('Peserta', function (Blueprint $table) {
            $table->id('Id_peserta');
            $table->string('Kd_skema', 25);
            $table->foreign('Kd_skema')->references('Kd_skema')->on('skema')->onDelete('cascade');
            $table->string('Nm_peserta', 100);
            $table->enum('Jekel', ['Laki-laki', 'Perempuan']);
            $table->text('Alamat');
            $table->string('No_hp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
};
