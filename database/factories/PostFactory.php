<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory {

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition() {
        $paragraphs = rand(5, 15);
        $i = 0;
        $ret = "";
        while ($i < $paragraphs) {
            $ret .= "<p>" . $this->faker->paragraph(rand(2, 6)) . "</p>";
            $i++;
        }
        return [
            'title' => $this->faker->sentence(5),
            'slug' => Str::slug($this->faker->unique()->text(10)),
            'description' => $this->faker->paragraph(),
            'alterpreview' => $this->faker->paragraph(3),
            'content' => $ret,
        ];
    }

}
