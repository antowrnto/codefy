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
        $url = 'http://medialibrary.spatie.be/assets/images/mountain.jpg';
        foreach (Course::all() as $course) {
          $users = User::inRandomOrder()->take(rand(2, 5))->pluck('id');
          \Storage::disk('google')->put($course->slug . '.txt', $course);
          //dd(\Storage::disk('google')->url($course->slug . '.txt'));
          //$course->addMedia(\Storage::disk('google')->url($course->slug . '.txt'))
          //   ->toMediaCollection('data');
          $course->students()->attach($users);
        }
    }
}
