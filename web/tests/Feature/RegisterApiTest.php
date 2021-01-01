<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterApiTest extends TestCase
{
use RefreshDatabase;

    /**
     * 新規ユーザ作成リクエストに対して、下記2点を確認する。
     * - DB登録データが正しいこと
     * - レスポンス取得が正しくできること
     * @return void
     */
    public function test_create_new_user ()
    {
        // 登録データ
        $data = [
            'name' => 'vuesplash user',
            'email' => 'dummy@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234',
        ];

        // 会員登録リクエスト送信
        $response = $this->json('POST', route('register'), $data );

        // 会員登録したデータの取得
        $user = User::first();

        // 検証1：登録データが正しいこと
        $this->assertEquals($data['name'], $user->name);
        // 検証2：レスポンスが正しいこと
        $response
            ->assertStatus(201)
            ->assertJson(['name' => $user->name]);
    }
}
