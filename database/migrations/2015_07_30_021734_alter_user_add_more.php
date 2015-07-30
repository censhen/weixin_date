<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserAddMore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {
            $table->string('wechat_account');
            $table->tinyInteger('gender')->default(0);
            $table->tinyInteger('age')->default(0);
            $table->string('city')->nullable();
            $table->integer('height')->default(0);
            $table->integer('weight')->default(0);
            $table->text('interest')->nullable();
            $table->text('self_intro')->nullable();
            $table->text('expectation')->nullable();
            $table->text('reviews')->nullable();
            $table->string('photo1')->nullable();
            $table->string('photo2')->nullable();
            $table->string('photo3')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {
            $table->dropColumn('wechat_account');
            $table->dropColumn('gender');
            $table->dropColumn('age');
            $table->dropColumn('city');
            $table->dropColumn('height');
            $table->dropColumn('weight');
            $table->dropColumn('interest');
            $table->dropColumn('self_intro');
            $table->dropColumn('expectation');
            $table->dropColumn('reviews');
            $table->dropColumn('photo1');
            $table->dropColumn('photo2');
            $table->dropColumn('photo3');
        });
    }
}
