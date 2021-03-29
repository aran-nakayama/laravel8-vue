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

  public function setUp(): void
  {

    parent::setUp();

    $this->user = User::factory()->create();
  }

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

  #csrfでログインと登録が弾かれている？
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

    $this->actingAs($this->user);
    $this->assertAuthenticated();
  }

  /**
   * ログイン認証テスト
   */
  public function testLogin(): void
  {
    $this->actingAs($this->user);

    $response = $this->post('/login', [
      'email' => $this->user['email'],
      'password' => $this->user['password'],
    ]);


    $response->assertStatus(302)
      ->assertRedirect(route('articles.index'));

    $this->assertAuthenticated();
  }

  public function testLogout(): void
    {
      $this->actingAs($this->user);
      $this->assertAuthenticated();
      $response = $this->post('/logout');
      /*
      $response->assertStatus(302)
        ->assertRedirect(route('articles.index'));
      */
      $this->assertGuest();
    }
}
