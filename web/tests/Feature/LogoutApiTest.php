<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LogoutApiTest extends TestCase
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
     * ユーザのログアウト要求成功時、下記を確認する。
     * - レスポンスが正しいこと
     * - ユーザが認証されていないこと
     * @return void
     */
    public function test_logout()
    {
        // 検証1：レスポンスが正しいこと
        $response = $this->actingAs($this->user)
                        ->json('POST', route('logout'));
        // 検証2：ユーザが認証されていないこと
        $response->assertStatus(200);
        $this->assertGuest();
    }
}
