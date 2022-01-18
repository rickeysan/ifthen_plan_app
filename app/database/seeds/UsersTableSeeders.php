<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'password'=>'sasaki123',
        ];
        $user->fill($param)->save();

        $user = new User;
        $param = [
            'name'=>'tanaka',
            'email'=>'tanaka@gmail.com',
            'password'=>'tanaka123',
        ];
        $user->fill($param)->save();
        $user = new User;
        $param = [
            'name'=>'suzuki',
            'email'=>'suzui@gmail.com',
            'password'=>'suzuki123',
        ];
        $user->fill($param)->save();

    }
}
