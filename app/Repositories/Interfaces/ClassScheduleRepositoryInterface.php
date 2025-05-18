<?php

namespace App\Repositories\Interfaces;

use App\Dto\ClassScheduleDto;
use App\Models\ClassSchedule;

interface ClassScheduleRepositoryInterface
{
    public function getClassScheduleByID($id): ?ClassSchedule;

    public function createSchedule(ClassScheduleDto $dto): ClassSchedule;

    public function updateSchedule(ClassScheduleDto $dto , ClassSchedule $classSchedule , $id);

    public function findForTeacher(int $teacherId, string $startTime, string $endTime, ?int $excludeId = null): ?ClassSchedule;
}
