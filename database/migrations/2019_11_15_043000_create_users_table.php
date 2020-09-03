<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_name', 20)->unique();
            $table->string('initials', 255);
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('surname', 255)->nullable();
            $table->string('nic', 12)->unique()->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 50)->default(User::GENDER_MALE);
            $table->string('title', 255)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('race', 50)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('mobile', 12)->nullable();
            $table->string('land_line', 12)->nullable();
            $table->string('status', 50)->nullable();
            $table->string('password', 80);
            $table->string('api_token', 80)
                ->unique()
                ->nullable()
                ->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
