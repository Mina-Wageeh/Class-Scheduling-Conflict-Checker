<?php

namespace Tests\Feature;

use App\Models\ClassSchedule;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClassScheduleFeatureTest extends TestCase
{
    use DatabaseTransactions;

    public function test_store_class_schedule()
    {
        $classScheduleData =
        [
            "course_id"=> 3,
            "teacher_id"=> 5,
            "start_time"=> "2023-06-01 10:00:00",
            "end_time"=> "2023-06-01 11:00:00",
            "day_of_week"=> "Thursday"
        ];

        $response = $this->post('api/create-class-schedules' , $classScheduleData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('class_schedules' , $classScheduleData);
    }

    public function test_store_class_schedule_with_conflicts()
    {
        ClassSchedule::create
        ([
            "course_id"=> 4,
            "teacher_id"=> 4,
            "start_time"=> "2023-06-01 04:00:00",
            "end_time"=> "2023-06-01 06:00:00",
            "day_of_week"=> "Thursday"
        ]);

        $classScheduleData =
        [
            "course_id"=> 4,
            "teacher_id"=> 4,
            "start_time"=> "2023-06-01 04:00:00",
            "end_time"=> "2023-06-01 06:00:00",
            "day_of_week"=> "Thursday"
        ];

        $response = $this->post('api/create-class-schedules' , $classScheduleData);

        $response->assertStatus(422);

        $response->assertJson(['message' => 'This teacher already has a class scheduled during this time']);
    }

    public function test_update_class_schedule()
    {
        $schedule = ClassSchedule::create
        ([
            "course_id"=> 5,
            "teacher_id"=> 5,
            "start_time"=> "2023-06-01 1:00:00",
            "end_time"=> "2023-06-01 3:00:00",
            "day_of_week"=> "Thursday"
        ]);

        $updatedData =
        [
            "course_id"=> 3,
            "teacher_id"=> 5,
            "start_time"=> "2023-06-01 11:00:00",
            "end_time"=> "2023-06-01 12:00:00",
            "day_of_week"=> "Thursday"
        ];

        $response = $this->putJson("api/update-class-schedules/{$schedule->id}", $updatedData);

        $response->assertStatus(200);

        $this->assertDatabaseHas('class_schedules', $updatedData);

        $response->assertJson(['message' => 'Class schedule updated successfully']);
    }

    public function test_update_class_schedule_not_found()
    {
        $updatedData =
        [
            "course_id"=> 3,
            "teacher_id"=> 5,
            "start_time"=> "2023-06-01 11:00:00",
            "end_time"=> "2023-06-01 12:00:00",
            "day_of_week"=> "Thursday"
        ];

        $notExistentId = 9999;

        $response = $this->putJson("api/update-class-schedules/{$notExistentId}", $updatedData);

        $response->assertStatus(404);

        $response->assertJson(['message' => 'Class schedule not found']);
    }

}
