<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        $categories = App\Category::all();

        if ($categories->count() === 0){
            $this->command->info('There are no category, son no course will be added');
        }

        $courseCount = (int)$this->command->ask('How many Courses would you like?', 50);

        factory(\App\Course::class, $courseCount)->make()->each(function ($coures) use ($categories) {
           $coures->category_id = $categories->random()->id;
           $coures->save();
        });
    }
}
