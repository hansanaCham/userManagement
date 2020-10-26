<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveAppliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_applies', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->bigInteger('leave_config_id')->unsigned();
            $table->date('from_date');
            $table->date('to_date');
            $table->bigInteger('user_id')->unsigned();
            $table->text('comment')->nullable();
            $table->text('attachment')->nullable();
            $table->integer('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('leave_config_id')->references('id')->on('leave_configs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_applies');
    }
}
