<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id('clidcl');
            $table->string('clnmcl');
            $table->string('cladcl');
            $table->string('cltele');
            $table->string('cllogo'); 
            $table->string('cllogo'); 
            $table->string('cletat'); 
            $table->timestamps('clcrea');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
