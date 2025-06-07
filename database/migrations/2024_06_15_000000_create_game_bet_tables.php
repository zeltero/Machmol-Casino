<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameBetTables extends Migration
{
    public function up()
    {
        Schema::create('wheels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('coff');
            $table->string('login');
            $table->string('img')->nullable();
            $table->decimal('bet', 15, 2);
            $table->boolean('demo')->default(false);
            $table->timestamps();
        });

        Schema::create('wheel_anti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('coeff');
            $table->decimal('win', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('x100', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->integer('coff');
            $table->string('login');
            $table->string('img')->nullable();
            $table->decimal('bet', 15, 2);
            $table->timestamps();
        });

        Schema::create('x100_anti', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('coeff');
            $table->decimal('win', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('crash', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('bet', 15, 2);
            $table->string('img')->nullable();
            $table->string('login');
            $table->decimal('auto', 8, 2);
            $table->decimal('result', 8, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('boom_city', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('coeff', 8, 2)->default(0);
            $table->string('login');
            $table->string('img')->nullable();
            $table->decimal('bet', 15, 2);
            $table->timestamps();
        });

        Schema::create('coin', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('bet', 15,2);
            $table->decimal('coeff', 8,2)->default(0);
            $table->timestamps();
        });

        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('repost', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });

        Schema::create('user_reposts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('repost_id');
            $table->timestamps();
        });

        Schema::create('random_keys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_key');
            $table->integer('games')->default(0);
            $table->timestamps();
        });

        Schema::create('results_random', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('random');
            $table->string('signature');
            $table->timestamps();
        });

        Schema::create('shoot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('bet', 15,2);
            $table->decimal('win', 15,2)->default(0);
            $table->timestamps();
        });

        Schema::create('slots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('bet', 15,2);
            $table->decimal('win', 15,2)->default(0);
            $table->timestamps();
        });

        Schema::create('mines_games', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->json('data')->nullable();
            $table->boolean('onOff')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mines_games');
        Schema::dropIfExists('slots');
        Schema::dropIfExists('shoot');
        Schema::dropIfExists('results_random');
        Schema::dropIfExists('random_keys');
        Schema::dropIfExists('user_reposts');
        Schema::dropIfExists('repost');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('coin');
        Schema::dropIfExists('boom_city');
        Schema::dropIfExists('crash');
        Schema::dropIfExists('x100_anti');
        Schema::dropIfExists('x100');
        Schema::dropIfExists('wheel_anti');
        Schema::dropIfExists('wheels');
    }
}
