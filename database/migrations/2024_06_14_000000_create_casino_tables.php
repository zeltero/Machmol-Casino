<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasinoTables extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('avatar')->nullable();
            $table->string('ip')->nullable();
            $table->string('social')->nullable();
            $table->string('social_id')->nullable();
            $table->string('vk_id')->nullable();
            $table->string('tg_id')->nullable();
            $table->string('videocard')->nullable();
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('demo_balance', 15, 2)->default(0);
            $table->decimal('balance_ref', 15, 2)->default(0);
            $table->decimal('balance_repost', 15, 2)->default(0);
            $table->integer('deps')->default(0);
            $table->integer('withdraws')->default(0);
            $table->decimal('profit', 15, 2)->default(0);
            $table->integer('ref_id')->default(0);
            $table->integer('refs')->default(0);
            $table->integer('bonus_refs')->default(0);
            $table->boolean('bonus_up')->default(false);
            $table->decimal('sum_to_withdraw', 15, 2)->default(0);
            $table->integer('status')->default(0);
            $table->tinyInteger('admin')->default(0);
            $table->tinyInteger('type_balance')->default(0);
            $table->boolean('ban')->default(false);
            $table->timestamps();
        });

        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('login')->nullable();
            $table->string('avatar')->nullable();
            $table->decimal('sum', 15, 2)->default(0);
            $table->string('data')->nullable();
            $table->string('transaction')->index();
            $table->decimal('beforepay', 15, 2)->default(0);
            $table->decimal('afterpay', 15, 2)->default(0)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('percent')->default(0);
            $table->string('img_system')->nullable();
            $table->timestamps();
        });

        Schema::create('withdraws', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('login')->nullable();
            $table->string('avatar')->nullable();
            $table->string('wallet')->nullable();
            $table->tinyInteger('mult')->default(0);
            $table->decimal('sum', 15, 2)->default(0);
            $table->decimal('sum_full', 15, 2)->default(0);
            $table->string('date')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('img_system')->nullable();
            $table->timestamps();
        });

        Schema::create('system_dep', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('min_sum', 15, 2)->default(0);
            $table->integer('comm_percent')->default(0);
            $table->string('img')->nullable();
            $table->string('ps')->nullable();
            $table->string('number_ps')->nullable();
            $table->string('color')->nullable();
            $table->tinyInteger('off')->default(0);
            $table->integer('sort')->default(0);
            $table->timestamps();
        });

        Schema::create('system_withdraw', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('min_sum', 15, 2)->default(0);
            $table->integer('comm_percent')->default(0);
            $table->decimal('comm_rub', 15, 2)->default(0);
            $table->string('img')->nullable();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color')->nullable();
            $table->decimal('deposit', 15, 2)->default(0);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('promo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('sum', 15, 2)->nullable();
            $table->integer('active')->default(0);
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('user_name')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->integer('actived')->default(0);
            $table->timestamps();
        });

        Schema::create('dep_promo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('percent')->default(0);
            $table->integer('active')->default(0);
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('user_name')->nullable();
            $table->integer('actived')->default(0);
            $table->timestamps();
        });

        Schema::create('active_promos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('promo_id')->nullable();
            $table->string('promo')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('type_promo')->default(0);
            $table->timestamps();
        });

        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('group_id')->nullable();
            $table->string('group_token')->nullable();
            $table->string('tg_id')->nullable();
            $table->string('tg_bot_id')->nullable();
            $table->string('tg_token')->nullable();
            $table->text('meta_tags')->nullable();
            $table->string('group_link')->nullable();
            $table->decimal('wheel_bank', 15, 2)->default(0);
            $table->decimal('wheel_profit', 15, 2)->default(0);
            $table->decimal('x100_bank', 15, 2)->default(0);
            $table->decimal('jackpot_bank', 15, 2)->default(0);
            $table->decimal('crash_bank', 15, 2)->default(0);
            $table->decimal('dice_bank', 15, 2)->default(0);
            $table->decimal('shoot_bank', 15, 2)->default(0);
            $table->decimal('dice_profit', 15, 2)->default(0);
            $table->decimal('shoot_profit', 15, 2)->default(0);
            $table->decimal('crash_profit', 15, 2)->default(0);
            $table->decimal('jackpot_profit', 15, 2)->default(0);
            $table->integer('status_wheel')->default(0);
            $table->integer('status_x100')->default(0);
            $table->integer('status_jackpot')->default(0);
            $table->integer('status_keno')->default(0);
            $table->integer('status_boom')->default(0);
            $table->integer('crash_status')->default(0);
            $table->string('wheel_win')->default('false');
            $table->string('youtube')->nullable();
            $table->string('mult_bonus')->default('false');
            $table->string('coeff_bonus')->default('false');
            $table->integer('wheelYmn')->default(1);
            $table->integer('wheelWinNumber')->default(0);
            $table->string('win_x100')->default('false');
            $table->integer('x100WinNumber')->default(0);
            $table->integer('X100BonusUser_ID')->default(0);
            $table->string('X100BonusAvatar')->nullable();
            $table->integer('random_key_id')->default(0);
            $table->integer('numberBonusKeno')->default(0);
            $table->integer('coeffBonusKeno')->default(0);
            $table->integer('youtube_keno')->default(0);
            $table->text('keno_numbers')->nullable();
            $table->text('noGetKeno')->nullable();
            $table->string('jackpot_rand')->nullable();
            $table->text('jackpot_random')->nullable();
            $table->text('jackpot_signature')->nullable();
            $table->integer('jackpot_wait')->default(0);
            $table->decimal('profit_jackpot', 15, 2)->default(0);
            $table->text('coefsHunt')->nullable();
            $table->integer('crash_boom')->default(0);
            $table->integer('crash_result')->default(0);
            $table->integer('youtube_crash')->default(0);
            $table->integer('auto_crash')->default(0);
            $table->integer('auto_wheel')->default(0);
            $table->integer('auto_x100')->default(0);
            $table->integer('auto_dice')->default(0);
            $table->integer('auto_mines')->default(0);
            $table->boolean('newYear')->default(false);
            $table->decimal('dep_transfer', 15, 2)->default(0);
            $table->decimal('dep_createpromo', 15, 2)->default(0);
            $table->decimal('dep_withdraw', 15, 2)->default(0);
            $table->decimal('bonus_reg', 15, 2)->default(0);
            $table->decimal('bonus_group', 15, 2)->default(0);
            $table->string('fk_id')->nullable();
            $table->string('fk_secret_1')->nullable();
            $table->string('fk_secret_2')->nullable();
            $table->string('piastrix_id')->nullable();
            $table->string('piastrix_secret')->nullable();
            $table->string('prime_id')->nullable();
            $table->string('prime_secret_1')->nullable();
            $table->string('prime_secret_2')->nullable();
            $table->string('linepay_id')->nullable();
            $table->string('linepay_secret_1')->nullable();
            $table->string('linepay_secret_2')->nullable();
            $table->string('paypaylych_id')->nullable();
            $table->string('paypaylych_token')->nullable();
            $table->string('aezapay_id')->nullable();
            $table->string('aezapay_token')->nullable();
            $table->string('gamepay_api_key')->nullable();
            $table->string('gamepay_shop_id')->nullable();
            $table->timestamps();
        });

        Schema::create('authorization', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('ip')->nullable();
            $table->string('videocard')->nullable();
            $table->timestamps();
        });

        Schema::create('history_balances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('type');
            $table->decimal('balance_before', 15, 2);
            $table->decimal('balance_after', 15, 2);
            $table->string('date');
            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->tinyInteger('type_mess')->default(0);
            $table->string('autor')->nullable();
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('user_id')->default(0);
            $table->string('status_mess')->nullable();
            $table->string('time')->nullable();
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });

        Schema::create('tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('theme');
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });

        Schema::create('ticket_messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->text('message');
            $table->timestamps();
        });

        Schema::create('wheel_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->integer('coff');
            $table->string('random');
            $table->string('signature');
            $table->timestamps();
        });

        Schema::create('x100_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('number');
            $table->integer('coff');
            $table->string('random');
            $table->string('signature');
            $table->timestamps();
        });

        Schema::create('crash_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('num', 8, 2);
            $table->timestamps();
        });

        Schema::create('jackpot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('login');
            $table->string('img');
            $table->decimal('bet', 15, 2);
            $table->integer('chance');
            $table->integer('tick_one');
            $table->integer('tick_two');
            $table->timestamps();
        });

        Schema::create('jackpot_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('login');
            $table->string('avatar');
            $table->decimal('bet', 15, 2);
            $table->decimal('win', 15, 2);
            $table->string('random');
            $table->string('signature');
            $table->timestamps();
        });

        Schema::create('keno', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('login');
            $table->string('avatar');
            $table->decimal('bet', 15, 2);
            $table->string('numbers');
            $table->decimal('win', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('keno_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('numbers');
            $table->timestamps();
        });

        Schema::create('tournier_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tournier_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('score')->default(0);
            $table->timestamps();
        });

        Schema::create('tourniers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('game');
            $table->string('class')->nullable();
            $table->integer('places')->default(0);
            $table->text('prizes')->nullable();
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tourniers');
        Schema::dropIfExists('tournier_table');
        Schema::dropIfExists('keno_history');
        Schema::dropIfExists('keno');
        Schema::dropIfExists('jackpot_history');
        Schema::dropIfExists('jackpot');
        Schema::dropIfExists('crash_history');
        Schema::dropIfExists('x100_history');
        Schema::dropIfExists('wheel_history');
        Schema::dropIfExists('ticket_messages');
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('history_balances');
        Schema::dropIfExists('authorization');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('active_promos');
        Schema::dropIfExists('dep_promo');
        Schema::dropIfExists('promo');
        Schema::dropIfExists('status');
        Schema::dropIfExists('system_withdraw');
        Schema::dropIfExists('system_dep');
        Schema::dropIfExists('withdraws');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('users');
    }
}
