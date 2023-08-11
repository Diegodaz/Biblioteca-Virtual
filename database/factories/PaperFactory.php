<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Category;
use App\Models\Paper;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class PaperFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paper::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->unique()->word(20);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'extract' => ($this->faker)->text(250),
            'url' => ($this->faker)->url(),
            'body' => ($this->faker)->text(2000),
            'status' => ($this->faker)->randomElement([Paper::MODERATION, Paper::PUBLISHED]),
            'user_id' => User::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'author_id' => Author::all()->random()->id,
        ];
    }
}
