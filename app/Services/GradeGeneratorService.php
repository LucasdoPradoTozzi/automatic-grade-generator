<?php

namespace App\Services;

use App\Models\Module;
use App\Models\ModuleHours;

class GradeGeneratorService
{
    private WeekSchedule $weekSchedule;

    public function __construct(array $arrayDaysOfWeek)
    {
        $this->weekSchedule = new WeekSchedule;

        $arrayDaysOfWeek = $this->filterAndRemoveDuplicates($arrayDaysOfWeek);

        foreach ($arrayDaysOfWeek as $dayOfWeek) {
            $newDay = new DaySchedule($dayOfWeek);
            $this->weekSchedule->addDaySchedule($newDay);
        }
    }

    public function makeTheGrade(array $arrayModuleIds)
    {
        $arrayModules = Module::with('moduleHours')->whereIn('id', $arrayModuleIds)->get();

        foreach ($arrayModules as $module) {
            $checkHour = $this->checkIfModuleHoursAreAvaliable($module);
            if ($checkHour) $this->insertModuleHours($module);
        }
    }

    public function filterAndRemoveDuplicates(array $numbers): array
    {
        $filtered = array_filter($numbers, function ($number) {
            return $number >= 0 && $number <= 6;
        });

        $unique = array_values(array_unique($filtered));

        return $unique;
    }

    private function checkIfModuleHoursAreAvaliable(Module $module): bool
    {
        $moduleHours = $module->moduleHours;

        foreach ($moduleHours as $moduleHour) {
            $foundHour = false;
            foreach ($this->weekSchedule->getArrayDaySchedules() as $daySchedule) {
                if ($daySchedule->weekDay == $moduleHour->week_day) {
                    foreach ($daySchedule->getModuleHoursDetails() as $moduleHoursDetails) {
                        if ($moduleHoursDetails->hourStart == $moduleHour->hour_start && $moduleHoursDetails->hourEnd == $moduleHour->hour_end) {
                            $foundHour = true;
                            if ($moduleHoursDetails->getModuleId() != null) return false;
                        }
                    }
                }
            }
            if (!$foundHour) return false;
        }
        return true;
    }

    private function insertModuleHours(Module $module): bool
    {
        $moduleHours = $module->moduleHours;

        foreach ($moduleHours as $moduleHour) {

            foreach ($this->weekSchedule->getArrayDaySchedules() as $daySchedule) {

                $arrayReturn = [$daySchedule, $moduleHour, $moduleHour->week_day, $daySchedule->weekDay];


                if ($daySchedule->weekDay == $moduleHour->week_day) {
                    foreach ($daySchedule->getModuleHoursDetails() as $moduleHoursDetails) {
                        if ($moduleHoursDetails->hourStart == $moduleHour->hour_start && $moduleHoursDetails->hourEnd == $moduleHour->hour_end) {
                            $moduleHoursDetails->setModuleId($moduleHour);
                        }
                    }
                }
            }
        }
        return true;
    }
}

class ModuleHoursDetails
{
    public string $hourStart;
    public string $hourEnd;
    public int $weekDay;
    private ?int $moduleId;

    public function __construct($hourStart, $hourEnd, $weekDay)
    {
        $this->hourStart = $hourStart;
        $this->hourEnd = $hourEnd;
        $this->weekDay = $weekDay;
        $this->moduleId = null;
    }

    public function getModuleId(): ?int
    {
        return $this->moduleId;
    }

    public function setModuleId(ModuleHours $moduleHours): bool
    {

        if (!empty($this->getModuleId())) return false;
        if (empty($moduleHours->module_id)) return false;
        if (!$this->checkHours($moduleHours->hour_start, $moduleHours->hour_end)) return false;
        if ($moduleHours->week_day != $this->weekDay) return false;

        $this->moduleId = $moduleHours->module_id;

        return true;
    }

    //need to rethink that
    private function checkHours(string $hourStart, string $hourEnd): bool
    {
        if ($hourStart != $this->hourStart || $hourEnd != $this->hourEnd) return false;

        return true;
    }
}

class DaySchedule
{
    public int $weekDay;
    private array $arrayModuleHoursDetails;

    public function __construct(int $weekDay, ?array $arrayHours = null)
    {
        $this->weekDay = $weekDay;
        $this->arrayModuleHoursDetails = [];

        //hard coded for now
        if (is_null($arrayHours)) {
            $this->addModuleHoursDetails(new ModuleHoursDetails('19:00:00', '19:50:00', $this->weekDay));
            $this->addModuleHoursDetails(new ModuleHoursDetails('19:50:00', '20:40:00', $this->weekDay));
            $this->addModuleHoursDetails(new ModuleHoursDetails('20:50:00', '21:40:00', $this->weekDay));
            $this->addModuleHoursDetails(new ModuleHoursDetails('21:40:00', '22:30:00', $this->weekDay));
        }
    }

    public function getModuleHoursDetails(): array
    {
        return $this->arrayModuleHoursDetails;
    }

    //before adding a module hours, i need to check if there is more hours for this module and if that this hours are at disposal.
    public function addModuleHoursDetails(ModuleHoursDetails $moduleHoursDetails): bool
    {
        if ($moduleHoursDetails->weekDay != $this->weekDay) return false;
        if (count($this->arrayModuleHoursDetails) >= 4) return false; // change that in the future
        if ($this->checkIfThereIsHourConflict($this->arrayModuleHoursDetails, $moduleHoursDetails)) return false;


        $this->arrayModuleHoursDetails[] = $moduleHoursDetails;
        return true;
    }

    private function checkIfThereIsHourConflict(array $arrayModuleHoursDetails, ModuleHoursDetails $moduleHoursDetails): bool
    {
        foreach ($arrayModuleHoursDetails as $moduleDetail) {
            if ($moduleHoursDetails->hourStart == $moduleDetail->hourStart || $moduleHoursDetails->hourEnd == $moduleDetail->hourEnd) return true;
        }
        return false;
    }
}

class WeekSchedule
{
    private array $arrayDaySchedules;

    public function __construct()
    {
        $this->arrayDaySchedules = [];
    }

    public function getArrayDaySchedules(): array
    {
        return $this->arrayDaySchedules;
    }

    public function addDaySchedule(DaySchedule $daySchedule): bool
    {
        if ($this->checkIfThereIsADayConflit($daySchedule)) return false;
        $this->arrayDaySchedules[] = $daySchedule;
        return true;
    }

    private function checkIfThereIsADayConflit(DaySchedule $daySchedule): bool
    {

        if (!empty($this->arrayDaySchedules)) {
            foreach ($this->arrayDaySchedules as $day) {
                if ($day->weekDay == $daySchedule->weekDay) return true;;
            }
        }
        return false;
    }
}
