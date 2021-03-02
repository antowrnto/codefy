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
        User::factory(50)->create();
        
        foreach (Course::all() as $course) {
          $users = User::inRandomOrder()->take(rand(2, 50))->pluck('id');
          $course->students()->attach($users);
        }
    }
}
