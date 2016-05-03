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
            $table->increments('id')->unsigned();;
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('account_id');
            $table->string('wallet_address');
            $table->float('balance');
            $table->float('initial_capital');
            $table->boolean('active');
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
        Schema::table('accounts_coin_bases', function(Blueprint $table) {
            $table->dropForeign('accounts_coin_bases_user_id_foreign');
        });
        Schema::drop('accounts_coin_bases');
    }
}
