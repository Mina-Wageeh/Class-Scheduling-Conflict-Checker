<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveClassScheduleRequest;
use App\Models\ClassSchedule;
use App\Services\Interfaces\ClassScheduleServiceInterface;

class ClassScheduleController extends Controller
{
    protected ClassScheduleServiceInterface $classScheduleService;

    public function __construct(ClassScheduleServiceInterface $classScheduleService)
    {
        $this->classScheduleService = $classScheduleService;
    }

    //Create A New Class Schedule
    public function store(SaveClassScheduleRequest $request)
    {
        $dto = $request->getDto();

        try
        {
            $this->classScheduleService->createSchedule($dto);
            return response()->json(['message' => 'Class schedule created successfully'], 201);
        }
        catch (\Exception $e)
        {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    //Update An Existing Class Schedule
    public function update(SaveClassScheduleRequest $request, $id)
    {
        $dto = $request->getDto();

        $classSchedule = $this->classScheduleService->getClassScheduleByID($id);

        if(!$classSchedule)
        {
            return response()->json(['message' => 'Class schedule not found'] , 404);
        }
        else
        {
            try
            {
                $this->classScheduleService->updateSchedule($dto , $classSchedule , $id);
                return response()->json(['message' => 'Class schedule updated successfully'], 200);
            }
            catch (\Exception $e)
            {
                return response()->json(['message' => $e->getMessage()], 404);
            }
        }
    }
}
