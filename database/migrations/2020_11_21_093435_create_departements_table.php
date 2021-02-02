<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('division_id')->unsigned(); 
            $table->string('dept_id');
            $table->string('dept_description')->nullable();
            $table->string('dept_initial')->nullable(); 
            $table->timestamps();
        });
        // membuat relasi table/foreign key nya
        Schema::table('departements', function (Blueprint $table) {
          
            $table->foreign('division_id')->references('id')->on('divisions')
                        ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
