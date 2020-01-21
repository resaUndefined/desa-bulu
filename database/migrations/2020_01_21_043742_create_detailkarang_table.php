<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailkarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailkarang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('karangtaruna_id')->unsigned();
            $table->string('jabatan');
            $table->string('pejabat');
            $table->timestamps();

            $table->foreign('karangtaruna_id')->references('id')
                    ->on('karangtaruna')->onDelete('cascade')
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
        Schema::dropIfExists('detailkarang');
    }
}
