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
            $table->bigInteger('user_id')->unsigned();
            $table->string('designation', 255);
            $table->string('department', 255)->nullable();
            $table->date('join_date')->nullable();
            $table->string('employee_type', 255)->nullable();
            $table->string('tire', 255)->nullable();
            $table->string('company_email', 255)->nullable();
            $table->string('employee_status', 255)->nullable();
            $table->string('supervisor', 255)->nullable();
            $table->string('manager', 255)->nullable();
            $table->string('leave_group', 255)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
