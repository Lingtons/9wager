<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignkeysToAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');

            $table->integer('bet_id')->unsigned()->nullable();
            $table->foreign('bet_id')->references('id')
            ->on('bets')->onDelete('cascade');

            $table->integer('bank_id')->unsigned()->nullable();
            $table->foreign('bank_id')->references('id')
            ->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        $table->dropForeign('accounts_user_id_foreign');
        $table->dropColumn('user_id');

        $table->dropForeign('accounts_bet_id_foreign');
        $table->dropColumn('bet_id');

        $table->dropForeign('accounts_bank_id_foreign');
        $table->dropColumn('bank_id');
        });
    }
}
