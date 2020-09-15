<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->double('basic_salary', 11, 2)->unsigned()->nullable();  // null
            $table->string('ot_category', 70)->nullable(); // null
            $table->double('fixed_allowance', 11, 2)->nullable();
            $table->boolean('extra_allowance')->default(0)->comment('0 => false , 1=> true');
            $table->string('attendance_type')->default(0)->comment('0 => fixed , 1=> true')->nullable();    //string nullable
            $table->string('salary_categoty', 70)->nullable(); // nullable 
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
