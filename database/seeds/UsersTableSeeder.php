<?php

use Illuminate\Database\Seeder;
use App\Models\User;

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

        $user = User::find(2);
        $user->name = 'Sherlock Li';
        $user->email = '14xy14@gmail.com';
        $user->is_admin = true;
        $user->save();
    }
}
