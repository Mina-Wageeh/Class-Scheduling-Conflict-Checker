<?php

namespace App\Services\Interfaces;

use App\Dto\ClassScheduleDto;
use App\Models\ClassSchedule;

interface ClassScheduleServiceInterface
{
    public function getClassScheduleByID($id): ?ClassSchedule;

    public function createSchedule(ClassScheduleDto $data): ClassSchedule;

    public function updateSchedule(ClassScheduleDto $dto , ClassSchedule $classSchedule , $id);

    public function checkForConflicts(ClassScheduleDto $data, ?int $excludeId = null): void;
}
