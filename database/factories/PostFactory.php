<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Faker\VietNameseProvider as VN;
use Faker\Factory  as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker=Faker::create();
            $faker->addProvider(new VN($faker));
        return [
            'title' =>$faker->vietnameseText(3),
            'description'=>$faker->generateVietnameseText(4),
            'content'=>$faker->generateVietnameseText(20),
            'image'=>$faker->getImage().'.jpg',
            'id_category'=>$faker->numberBetween(1,2),
            'views'=>$faker->numberBetween(1,1000)
        ];
    }
}