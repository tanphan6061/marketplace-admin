<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    private function generateId()
    {
        if(Category::count()==0)
            return null;
        $id = rand(1, Category::count());
        return $id;
    }

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company,
            'slug' => Str::random(16),
            'image' => 'assets/images/placeholder-images.png',
            'parent_category_id' => $this->generateId()
        ];
    }
}
