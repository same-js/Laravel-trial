<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHaikuHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     * 投稿された俳句を保存するテーブル。
     * @return void
     */
    public function up()
    {
        Schema::create('haiku_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id', 100);
            $table->string('content');
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
        Schema::dropIfExists('haiku_histories');
    }
}
