<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function setUp(): void
    {
        // おまじないらしい
        parent::setUp();
        // テストユーザ作成
        $this->user = factory(User::class)->create();
    }
    // 正常系
    public function test_正しいパスワード()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->post(route('login.store'), ['email' => $this->user->email, 'password' => 'Test1234']);

        $response->assertStatus(302);
        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($this->user);

    }
    // 異常系
    public function test_間違ったパスワード()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->post(route('login.store'), ['email' => $this->user->email, 'password' => 'Abcd5678']);

        $response->assertStatus(200);
        $response->assertViewIs('login');
        $this->assertGuest();
    }

    public function test_ログアウトが正しくできるか()
    {
        // ログイン状態の作成
        $response = $this->actingAs($this->user);
        $response = $this->get('/home');
        $response->assertStatus(200);
        // ログアウト処理をする
        $this->get(route('logout.index'));
        // ログアウト出来たら200番が帰ってきているか
        $response->assertStatus(200);
        // ログインページにいる事
        $response = $this->get('/login');
        $response->assertStatus(200);
        // 認証されていないことを確認
        $this->assertGuest();
    }

}
