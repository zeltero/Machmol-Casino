<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMissingUserColumns extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->decimal('sum_bet', 15, 2)->default(0);
            $table->integer('win_games')->default(0);
            $table->integer('lose_games')->default(0);
            $table->tinyInteger('bonusCoin')->default(0);
            $table->tinyInteger('bonusMine')->default(0);
            $table->tinyInteger('minesStart')->default(0);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['sum_bet', 'win_games', 'lose_games', 'bonusCoin', 'bonusMine', 'minesStart']);
        });
    }
}
