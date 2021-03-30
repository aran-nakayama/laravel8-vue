<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArticleTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {

        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * 表示テスト
     *
     * @return void
     */
    public function testArticleIndex()
    {
        $this->article = Article::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $this->assertEquals(1, Article::count());
    }

    /**
     * 投稿テスト
     */
    public function testPostArticle()
    {
        $this->actingAs($this->user);
        $this->assertAuthenticated();

        $response = $this->post('/articles', [
            'title' => 'testTitle',
            'body' => 'testBody'
        ]);
        $response->assertStatus(302)
            ->assertRedirect(route('articles.index'));
        $this->assertEquals(1, Article::count());
    }

    /**
     * 削除テスト
     */
    public function testDeleteArticle()
    {
        $this->actingAs($this->user);
        $this->article = Article::factory()->create();
        $route = '/articles/' . $this->article->id;
        $response= $this->delete($route);
        $response->assertStatus(302)
            ->assertRedirect(route('articles.index'));
    }
}
