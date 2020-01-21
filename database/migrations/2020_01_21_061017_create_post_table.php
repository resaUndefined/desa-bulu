<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kategori_id')->unsigned();
            $table->string('judul');
            $table->text('isi');
            $table->string('gambar')->nullable();
            $table->integer('author')->unsigned();
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')
                    ->on('kategori')->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('author')->references('id')
                    ->on('users')->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post');
    }
}
