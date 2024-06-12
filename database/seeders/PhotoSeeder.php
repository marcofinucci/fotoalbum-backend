<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PhotoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(Faker $faker): void
  {
    for ($i = 0; $i < 50; $i++) {
      $photo = new Photo();
      $photo->title = $faker->words(4, true);
      $photo->slug = Str::slug($photo->title, '-');
      $photo->image = $faker->imageUrl(1920, 1080, 'animals', true);
      $photo->description = $faker->text(200);
      $photo->featured = $faker->boolean(20);
      $photo->save();
    }
  }
}
