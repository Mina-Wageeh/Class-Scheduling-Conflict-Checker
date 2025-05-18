<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = ['HTML', 'CSS', 'Javascript', 'PHP', 'Laravel'];

        foreach ($courses as $course)
        {
            Course::create
            ([
                'name' => $course
            ]);
        }
    }
}
