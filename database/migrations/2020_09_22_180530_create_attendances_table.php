<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_no')->unsigned();
            $table->string('name', 255);
            $table->date('date');
            $table->string('time_table');
            $table->time('on_duty');
            $table->time('off_duty');
            $table->time('clock_in')->nullable();
            $table->time('clock_out')->nullable();
            $table->time('late')->nullable();
            $table->time('early')->nullable();
            $table->boolean('absent')->default(0);
            $table->time('ot_time')->nullable();
            $table->time('work_time')->nullable();
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
        Schema::dropIfExists('attendances');
    }
}
