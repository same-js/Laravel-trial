<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          // user_idを作成
          $table -> string('user_id', 100)->unique()->after('id');
          // 不要なカラムを削除
          $table->dropColumn('name');
          $table->dropColumn('email');
          $table->dropColumn('email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          // 追加したカラムの削除
          $table->dropColumn('user_id');
          //削除したカラムの復活
          $table->string('name')->after('id');
          $table->string('email',100)->unique()->after('name');
          $table->string('email_verified_at')->after('email');
        });
    }
}
