<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_parameters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('salary_id')->unsigned();
            $table->string('name', 100);
            $table->text('value');
            $table->timestamps();
            $table->foreign('salary_id')->references('id')->on('salaries')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_parameters');
    }
}
