<?php

namespace App\Http\Requests;

use App\Dto\ClassScheduleDto;
use Illuminate\Foundation\Http\FormRequest;

class SaveClassScheduleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return
        [
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date',
            'day_of_week' => 'required|string|max:20',
            'classroom' => 'nullable|string|max:50',
        ];
    }

    public function getDto(): ClassScheduleDto
    {
        $dto = new ClassScheduleDto();

        $dto->setCourseId($this->request->get('course_id'))
            ->setTeacherId($this->request->get('teacher_id'))
            ->setStartTime($this->request->get('start_time'))
            ->setEndTime($this->request->get('end_time'))
            ->setDayOfWeek($this->request->get('day_of_week'))
            ->setClassroom($this->request->get('classroom'));

        return $dto;
    }
}
