<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receptions', function (Blueprint $table) {
            $table->id('reidre');
            $table->foreign('refore')->references('foidfo')->on('fournisseurs');
            $table->foreign('retycm')->references('tycmid')->on('fournisseurs');
            $table->integer('repoid');
            $table->integer('revolu');
            $table->integer('renbre');
            $table->integer('reemba');
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
        Schema::dropIfExists('receptions');
    }
}
