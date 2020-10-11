<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSuervisoAndManagerToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->bigInteger('supervisor_id')->unsigned();
            $table->bigInteger('manager_id')->unsigned();
            $table->dropColumn('supervisor');
            $table->dropColumn('manager');
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
            $table->dropColumn('supervisor_id');
            $table->dropColumn('manager_id');
            $table->text('supervisor');
            $table->text('manager');
        });
    }
}
