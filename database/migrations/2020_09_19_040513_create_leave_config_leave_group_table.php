<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveConfigLeaveGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_config_leave_group', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('leave_group_id')->unsigned();
            $table->bigInteger('leave_config_id')->unsigned();
            $table->foreign('leave_group_id')->references('id')->on('leave_groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leave_config_id')->references('id')->on('leave_configs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('leave_config_leave_group');
    }
}
