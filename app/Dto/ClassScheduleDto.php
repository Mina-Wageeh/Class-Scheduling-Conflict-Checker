<?php

namespace App\Dto;

class ClassScheduleDto
{
    public int $course_id;
    public int $teacher_id;
    public string $start_time;
    public string $end_time;
    public string $day_of_week;
    public ?string $classroom = null;

    public function getCourseId(): int
    {
        return $this->course_id;
    }

    public function setCourseId(int $course_id): self
    {
        $this->course_id = $course_id;
        return $this;
    }

    public function getTeacherId(): int
    {
        return $this->teacher_id;
    }

    public function setTeacherId(int $teacher_id): self
    {
        $this->teacher_id = $teacher_id;
        return $this;
    }

    public function getStartTime(): string
    {
        return $this->start_time;
    }

    public function setStartTime(string $start_time): self
    {
        $this->start_time = $start_time;
        return $this;
    }

    public function getEndTime(): string
    {
        return $this->end_time;
    }

    public function setEndTime(string $end_time): self
    {
        $this->end_time = $end_time;
        return $this;
    }

    public function getDayOfWeek(): string
    {
        return $this->day_of_week;
    }

    public function setDayOfWeek(string $day_of_week): self
    {
        $this->day_of_week = $day_of_week;
        return $this;
    }

    public function getClassroom(): ?string
    {
        return $this->classroom;
    }

    public function setClassroom(?string $classroom): self
    {
        $this->classroom = $classroom;
        return $this;
    }

    public function toArray(): array
    {
        return
        [
          'course_id' => $this->getCourseId(),
          'teacher_id' => $this->getTeacherId(),
          'start_time' => $this->getStartTime(),
          'end_time' => $this->getEndTime(),
          'day_of_week' => $this->getDayOfWeek(),
          'classroom' => $this->getClassroom(),
        ];
    }
}
