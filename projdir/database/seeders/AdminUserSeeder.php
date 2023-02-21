<?php

namespace Database\Seeders;

use App\Models\AdminUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::truncate();
        AdminUser::create([
            'email' => 'example@example.com',
            'password' => Hash::make('password'),
            'name' => 'テスト',
            'is_publish' => true
        ]);
    }
}
