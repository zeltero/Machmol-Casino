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
            'sum_bet' => 0,
            'win_games' => 0,
            'lose_games' => 0,
            'bonusCoin' => 0,
            'bonusMine' => 0,
            'minesStart' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('settings')->insert([
            'name' => 'Casino',
            'group_link' => 'https://example.com',
            'wheel_bank' => 200,
            'wheel_profit' => 0,
            'x100_bank' => 200,
            'jackpot_bank' => 200,
            'crash_bank' => 200,
            'dice_bank' => 200,
            'shoot_bank' => 200,
            'dice_profit' => 0,
            'shoot_profit' => 0,
            'crash_profit' => 0,
            'jackpot_profit' => 0,
            'status_wheel' => 0,
            'status_x100' => 0,
            'status_jackpot' => 0,
            'status_keno' => 0,
            'status_boom' => 0,
            'crash_status' => 0,
            'wheel_win' => 'false',
            'win_x100' => 'false',
            'random_key_id' => 0,
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

        DB::table('wheel_anti')->insert([
            ['coeff' => 2, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 3, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 5, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 7, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 14, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 30, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('x100_anti')->insert([
            ['coeff' => 2, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 3, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 10, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 15, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 20, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['coeff' => 100, 'win' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);

        DB::table('random_keys')->insert([
            ['name_key' => Str::random(16), 'games' => 0, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
