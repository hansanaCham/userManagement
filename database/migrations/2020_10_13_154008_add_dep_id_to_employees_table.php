<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepIdToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('department');
            $table->dropColumn('tire');
            $table->bigInteger('department_id')->unsigned()->nullable();
            $table->bigInteger('tire_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('tire_id')->references('id')->on('tires')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->string('department');
            $table->string('tire');
            $table->dropForeign('employees_department_id_foreign');
            $table->dropForeign('employees_tire_id_foreign');
            $table->dropColumn('department_id')->unsigned();
            $table->dropColumn('tire_id')->unsigned();
        });
    }
}
