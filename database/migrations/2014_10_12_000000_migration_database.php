<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->increments('id_role');
            $table->string('role');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('username',20)->unique();
            $table->string('password');
            $table->integer('id_role')->unsigned()->index();
            $table->foreign('id_role')->references('id_role')->on('role')->onDelete('cascade');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('jenis', function (Blueprint $table) {
            $table->increments('id_jenis');
            $table->string('nama_jenis');
        });

        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->unsigned()->index();
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
            $table->string('namakategori');
            $table->timestamps();
        });

        Schema::create('uploadmedia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->unsigned()->index();
            $table->foreign('id_jenis')->references('id_jenis')->on('jenis')->onDelete('cascade');
            $table->integer('id_kategori')->unsigned()->index();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->string('keterangan');
            $table->string('namafile');
            $table->string('path');
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
        Schema::dropIfExists('role');
        Schema::dropIfExists('users');
        Schema::dropIfExists('jenis');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('uploadmedia');
    }
}
