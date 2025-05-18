<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teachers = ['Teacher One' , 'Teacher Two' , 'Teacher Three' , 'Teacher Four' , 'Teacher Five'];

        foreach($teachers as $teacher)
        {
            Teacher::create
            ([
                'name' => $teacher,
            ]);
        }
    }
}
