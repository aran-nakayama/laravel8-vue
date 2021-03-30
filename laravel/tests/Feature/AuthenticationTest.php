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

  public function setUp(): void
  {

    parent::setUp();

    $this->user = User::factory()->create();
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
    $response = $this->post('/login', [
      'email' => $this->user['email'],
      'password' => $this->user['password'],
    ]);

    $response->assertStatus(302)
      ->assertRedirect(route('articles.index'));

    #$this->assertAuthenticated();
  }

  /**
   * ログアウトテスト
   */
  public function testLogout(): void
    {
      $this->actingAs($this->user);

      $response = $this->post('/logout');

      $response->assertStatus(302)
        ->assertRedirect(route('articles.index'));

      $this->assertGuest();
    }
}
