<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * テスト開始前に実行すべき処理を実装する。
     * @return void
     */
    public function setUp():void {
        parent::setUp();
        // テストユーザの作成
        $this->user = factory(User::class)->create();
    }

    /**
     * ユーザのログイン要求成功時、下記を確認する。
     * - レスポンスが正しいこと
     * - ログイン要求ユーザで認証されていること
     * @return void
     */
    public function test_login_user()
    {
        $response = $this-> json('POST', route('login'), [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        // 検証1：レスポンスが正しいこと
        $response
            ->assertStatus(200)
            ->assertJson(['name' => $this->user->name]);
        // 検証2：ログイン要求ユーザで認証されていること
        $this->assertAuthenticatedAs($this->user);
    }
}
