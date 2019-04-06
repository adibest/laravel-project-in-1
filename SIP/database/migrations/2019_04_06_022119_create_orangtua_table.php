<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrangtuaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orangtua', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_santri');
            $table->char('nik', 16)->unique();
            $table->string('nama', 50);
            $table->enum('gender', ['L', 'P']);
            $table->string('pekerjaan', 50);
            $table->string('pendidikan', 50);
            $table->timestamps();

            $table->foreign('id_santri')->references('id')->on('santri')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orangtua');
    }
}
