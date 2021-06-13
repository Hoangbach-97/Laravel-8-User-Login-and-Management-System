<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = Role::all(); //Lây tất cả infor trong Roles table
        // Tạo relationship giữa 1 role và các user trong table users
        // hàm each() trả về cặp key-value hiện tại trong mảng
        User::all()->each(function ($user) use ($roles) {
            // roles() is relationship that we created in User model
            // function each, attach, pluck
            // Từ relationship roles() lấy ngẫu nhiên từng cái X trong Role model: X ở đây là id trong table roles
            // pluck() là method của Collection trong Laravel:  lấy toàn bộ id có trong bản ghi in this case
            $user->roles()->attach($roles->random(1)->pluck('id'));
        });

    }
}
