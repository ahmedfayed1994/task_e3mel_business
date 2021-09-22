<?php

use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = App\Course::all();

        if ($courses->count() === 0){
            $this->command->info('There are no Image, son no course will be added');
        }

        factory(\App\Image::class, $courses->count())->make()->each(function ($image) use ($courses) {
            $image->imageable_id = $courses->random()->id;
            $image->save();
        });
    }
}
