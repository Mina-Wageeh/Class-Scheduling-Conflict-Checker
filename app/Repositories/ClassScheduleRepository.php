<?php

namespace App\Repositories;

use App\Dto\ClassScheduleDto;
use App\Models\ClassSchedule;
use App\Repositories\Interfaces\ClassScheduleRepositoryInterface;

class ClassScheduleRepository implements ClassScheduleRepositoryInterface
{
    public function getClassScheduleByID($id): ?ClassSchedule
    {
        return ClassSchedule::find($id);
    }

    public function createSchedule(ClassScheduleDto $dto): ClassSchedule
    {
        return ClassSchedule::create($dto->toArray());

    }

    public function updateSchedule(ClassScheduleDto $dto , ClassSchedule $classSchedule , $id)
    {
        return $classSchedule->update($dto->toArray());
    }

    public function findForTeacher(int $teacherId, string $startTime, string $endTime, ?int $excludeId = null): ?ClassSchedule
    {
        $query = ClassSchedule::where('teacher_id', $teacherId)
            ->where('start_time', '<', $endTime)
            ->where('end_time', '>', $startTime);

        if ($excludeId)
        {
            $query->where('id', '!=', $excludeId);
        }

        return $query->first();
    }
}
