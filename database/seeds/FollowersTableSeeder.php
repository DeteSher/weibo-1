<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $user = $users->find(2);
        $user_id = $user->id;

        //获取去除ID为2的所有用户ID数组
        $followers = $users->slice(2);
        $follower_ids = $followers->pluck('id')->toArray();

        //关注除了2号用户以外的所有用户
        $user->follow($follower_ids);

        //除了2号用户以外的所有用户都来关注2号用户
        foreach ($followers as $follower)
        {
            $follower->follow($user_id);
        }
    }
}
