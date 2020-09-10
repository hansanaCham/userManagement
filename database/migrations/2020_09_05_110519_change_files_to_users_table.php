<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFilesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->string('no', 20)->nullable();
            $table->string('street', 255)->nullable();
            $table->string('postal', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('country', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no');
            $table->dropColumn('street');
            $table->dropColumn('postal');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->text('address')->nullable();
        });
    }
}
