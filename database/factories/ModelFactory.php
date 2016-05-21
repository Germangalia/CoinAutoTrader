<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'coinbase_api_key' => str_random(16),
        'coinbase_api_secret' => str_random(32),
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\TradeHistory::class, function (Faker\Generator $faker) {
    return [
        'user_id' =>  $faker->randomNumber() ,
        'account_id' =>  $faker->randomNumber() ,
        'initial_capital' =>  $faker->randomFloat() ,
        'coin_price' =>  $faker->randomFloat() ,
        'coins' =>  $faker->randomFloat() ,
        'coins_value' =>  $faker->randomFloat() ,
        'cfav' =>  $faker->randomFloat() ,
        'capital' =>  $faker->randomFloat() ,
        'portfolio_control' =>  $faker->randomFloat() ,
        'buy_sell_advice' =>  $faker->randomFloat() ,
        'market_order' =>  $faker->randomFloat() ,
        'coin_market_order' =>  $faker->randomFloat() ,
        'commission' =>  $faker->randomFloat() ,
        'coins_amount' =>  $faker->randomFloat() ,
        'capital_amount' =>  $faker->randomFloat() ,
        'total_amount' =>  $faker->randomFloat() ,
        'benefit' =>  $faker->randomFloat() ,
    ];
});

$factory->define(App\AccountsCoinBase::class, function (Faker\Generator $faker) {
    return [
        'name' =>  $faker->name ,
        'user_id' =>  $faker->randomNumber() ,
        'account_id' =>  $faker->word ,
        'wallet_address' =>  $faker->word ,
        'balance' =>  $faker->randomFloat() ,
        'initial_capital' =>  $faker->randomFloat() ,
        'active' =>  $faker->boolean ,
    ];
});

$factory->define(App\TradeCalculator::class, function (Faker\Generator $faker) {
    return [
        'user_id' =>  $faker->randomNumber() ,
        'account_id' =>  $faker->randomNumber() ,
        'initial_capital' =>  $faker->randomFloat() ,
        'coin_price' =>  $faker->randomFloat() ,
        'coins' =>  $faker->randomFloat() ,
        'coins_value' =>  $faker->randomFloat() ,
        'cfav' =>  $faker->randomFloat() ,
        'capital' =>  $faker->randomFloat() ,
        'portfolio_control' =>  $faker->randomFloat() ,
        'buy_sell_advice' =>  $faker->randomFloat() ,
        'market_order' =>  $faker->randomFloat() ,
        'coin_market_order' =>  $faker->randomFloat() ,
        'commission' =>  $faker->randomFloat() ,
        'coins_amount' =>  $faker->randomFloat() ,
        'capital_amount' =>  $faker->randomFloat() ,
        'total_amount' =>  $faker->randomFloat() ,
        'benefit' =>  $faker->randomFloat() ,
    ];
});

