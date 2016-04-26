<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTradeCalculatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trade_calculators', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('account_id');
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
        Schema::drop('trade_calculators');
    }
}
