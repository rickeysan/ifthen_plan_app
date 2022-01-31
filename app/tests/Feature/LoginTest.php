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
    // use RefreshDatabase;

    public function setUp(): void
    {
        // おまじないらしい
        parent::setUp();
        // テストユーザ作成
        $this->user = factory(User::class)->create();
    }

    public function test正しいパスワード()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->post(route('login.store'), ['email' => $this->user->email, 'password' => 'Test1234']);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($this->user);

    }
}
