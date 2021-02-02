<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('departement_id')->unsigned(); 
            $table->bigInteger('division_id')->unsigned(); 
            $table->string('emp_id',20);
            $table->string('name', 100);
            $table->string('place_of_birthday', 100);
            $table->date('birthday');
            $table->string('sex', 20);
            $table->text('address')->nullable();
            $table->string('phone', 15);
            $table->boolean('isActive')->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
        Schema::table('employees', function (Blueprint $table) {
          
            $table->foreign('departement_id')->references('id')->on('departements')
                        ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}
