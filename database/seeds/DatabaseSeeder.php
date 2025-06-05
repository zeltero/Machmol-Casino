<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'balance' => 1000,
            'admin' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'name' => 'Casino',
            'wheel_bank' => 200,
            'x100_bank' => 200,
            'jackpot_bank' => 200,
            'crash_bank' => 200,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('status')->insert([
            ['name' => 'Newbie', 'color' => '#cccccc', 'deposit' => 0, 'bonus' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pro', 'color' => '#ffd700', 'deposit' => 1000, 'bonus' => 5, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('system_dep')->insert([
            'name' => 'FreeKassa',
            'min_sum' => 10,
            'comm_percent' => 5,
            'img' => 'fk.png',
            'ps' => 'fk',
            'number_ps' => '1',
            'color' => '#fff',
            'sort' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('system_withdraw')->insert([
            'name' => 'Qiwi',
            'min_sum' => 100,
            'comm_percent' => 2,
            'comm_rub' => 5,
            'img' => 'qiwi.png',
            'color' => '#ffa500',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
