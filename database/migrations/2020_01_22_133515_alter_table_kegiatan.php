<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->dropColumn('deskripsi');
            $table->dropColumn('tempat');
            $table->dropColumn('waktu');
            $table->dropColumn('keterangan_tambahan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->text('deskripsi')->nullable();
            $table->string('tempat')->nullable();
            $table->string('waktu')->nullable();
            $table->text('keterangan_tambahan')->nullable();
        });
    }
}
