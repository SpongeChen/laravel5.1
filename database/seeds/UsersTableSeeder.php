<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(50)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        $user = User::find(1);
        $user->name = 'chenyw';
        $user->email = 'chen_yw@126.com';
        $user->is_admin = true;
        $user->password = bcrypt('123456');
        $user->activated = 1;
        $user->save();
    }
}
