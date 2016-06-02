<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTradeHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('account_id')->unsigned();
            $table->foreign('account_id')->references('id')->on('accounts_coin_bases')->onDelete('cascade')->onUpdate('cascade');
            $table->float('initial_capital');
            $table->float('coin_price');
            $table->float('coins');
            $table->float('coins_value');
            $table->float('cfav');
            $table->float('capital');
            $table->float('portfolio_control');
            $table->float('buy_sell_advice');
            $table->float('market_order');
            $table->float('coin_market_order');
            $table->float('commission');
            $table->float('coins_amount');
            $table->float('capital_amount');
            $table->float('total_amount');
            $table->float('benefit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trade_histories', function (Blueprint $table) {
            $table->dropForeign('trade_histories_user_id_foreign');
            $table->dropForeign('trade_histories_account_id_foreign');
        });

        Schema::drop('trade_histories');
    }
}
