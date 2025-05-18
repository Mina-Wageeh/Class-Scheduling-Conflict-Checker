<?php

namespace App\Services;

use App\Dto\ClassScheduleDto;
use App\Models\ClassSchedule;
use App\Repositories\Interfaces\ClassScheduleRepositoryInterface;
use App\Services\Interfaces\ClassScheduleServiceInterface;
use Illuminate\Validation\ValidationException;

class ClassScheduleService implements ClassScheduleServiceInterface
{
    private ClassScheduleRepositoryInterface $classScheduleRepository;

    public function __construct(ClassScheduleRepositoryInterface $classScheduleRepository)
    {
        $this->classScheduleRepository = $classScheduleRepository;
    }

    public function getClassScheduleByID($id): ?ClassSchedule
    {
        return $this->classScheduleRepository->getClassScheduleByID($id);
    }

    public function createSchedule(ClassScheduleDto $data): ClassSchedule
    {
        $this->checkForConflicts($data);

        return $this->classScheduleRepository->createSchedule($data);
    }

    public function updateSchedule(ClassScheduleDto $dto , ClassSchedule $classSchedule , $id)
    {
        $this->checkForConflicts($dto, $id);

        return $this->classScheduleRepository->updateSchedule($dto , $classSchedule ,$id);
    }



    public function checkForConflicts(ClassScheduleDto $data, $excludeId = null): void
    {
        $conflict = $this->classScheduleRepository->findForTeacher
        (
            $data->teacher_id,
            $data->start_time,
            $data->end_time,
            $excludeId
        );

        if ($conflict)
        {
            throw ValidationException::withMessages
            ([
                'conflict' => ['This teacher already has a class scheduled during this time'],
            ]);
        }
    }
}
