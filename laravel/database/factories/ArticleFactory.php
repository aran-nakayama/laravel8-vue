<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Article::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    $user = User::inRandomOrder()->first();
    return [
      'title' => $this->faker->city,
      'body' => $this->faker->sentence,
      'user_id' => $user->id
    ];
  }
}
