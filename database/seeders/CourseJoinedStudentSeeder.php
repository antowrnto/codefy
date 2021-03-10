<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Course, User};

class CourseJoinedStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();
        //$url = 'https://source.unsplash.com/random';
        foreach (Course::all() as $course) {
          $users = User::inRandomOrder()->take(rand(2, 5))->pluck('id');
          //$course->addMediaFromUrl($url)
          //   ->toMediaCollection('thumbnails');
          $course->students()->attach($users);
        }
    }
}
