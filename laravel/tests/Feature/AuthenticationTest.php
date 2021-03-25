<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
  use RefreshDatabase;
  use WithoutMiddleware;

  protected $user = [
    'name' => 'tester',
    'email' => 'test@example.com',
    'password' => "password",
  ];

  /**
   * A basic feature test example.
   *
   * @return void
   */
  public function testExample()
  {
    $response = $this->get('/');

    $response->assertStatus(200);
  }

  /**
   * 登録テスト
   */
  public function testRegister(): void
  {
    $response = $this->post('/register', [
      'name' => $this->user['name'],
      'email' => $this->user['email'],
      'password' => $this->user['password'],
      'password-confirm' => $this->user['password'],
    ]);
    $response->assertStatus(302)
      ->assertRedirect(route('articles.index'));
  }

  /**
   * ログイン認証テスト
   */
  public function testLogin(): void
  {
    // ユーザー登録
    User::factory()->create([
      'email' => $this->user['email'],
      'password' => \Hash::make($this->user['password']),
    ]);

    $response = $this->post('/login', [
      'email' => $this->user['email'],
      'password' => $this->user['password'],
    ]);

    $response->assertStatus(302)
      ->assertRedirect(route('articles.index'));

    $this->assertAuthenticated();
  }
}
