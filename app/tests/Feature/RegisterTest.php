<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }
    // 正常系
    public function test_ログインしていなければ会員登録ページに遷移できる()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
    }
    public function test_正しい値を入力すればホーム画面に遷移できる()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $user_data = [
            'email'=>'test@test.com',
            'name'=>'hoge123',
            'password'=>'abcd1234',
            'password_confirmation'=>'abcd1234',
        ];
        $response = $this->post(route('register.store'),$user_data);

        $response->assertSessionHasNoErrors();

        $response->assertStatus(302);
        $response->assertRedirect('/home');
    }

    // 異常系
    public function test_誤った値を入力すればエラーつきでログイン画面に遷移される()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);

        $user_data = [
            'email'=>'testtest.com',
            'name'=>'hoge123',
            'password'=>'abcd1234',
            'password_confirmation'=>'aaaa1111',
        ];
        $response = $this->post(route('register.store'),$user_data);

        $response->assertSessionHasErrors();

        $response->assertStatus(302);
        $response->assertRedirect('/register');
    }
}
