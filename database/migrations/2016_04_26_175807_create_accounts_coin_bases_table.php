<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsCoinBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_coin_bases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('user_id');
            $table->bcrypt(string('wallet_address'));
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
        Schema::drop('accounts_coin_bases');
    }
}
