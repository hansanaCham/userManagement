<?php

use App\Roll;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User();
        $u->user_name = "root";
        $u->initials = "w.w.w.root";
        $u->password = Hash::make('12345678');
        $u->api_token = Str::random(80);
        $u->gender = User::GENDER_MALE;
        $u->save();

    }
}
