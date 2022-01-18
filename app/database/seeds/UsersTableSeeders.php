<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $param = [
            'name'=>'sasaki',
            'email'=>'sasaki@gmail.com',
            'password'=>Hash::make('sasaki123'),
        ];
        $user->fill($param)->save();

        $user = new User;
        $param = [
            'name'=>'tanaka',
            'email'=>'tanaka@gmail.com',
            'password'=>Hash::make('tanaka123'),
        ];
        $user->fill($param)->save();
        $user = new User;
        $param = [
            'name'=>'suzuki',
            'email'=>'suzuki@gmail.com',
            'password'=>Hash::make('suzuki123'),
        ];
        $user->fill($param)->save();

    }
}
