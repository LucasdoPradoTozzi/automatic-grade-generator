<?php

namespace App\Services;

use App\Models\Module;
use App\Models\ModuleHours;

class GradeGeneratorService
{
    private $mondayFirstClass;
    private $mondaySecondClass;
    private $mondayThirdlass;
    private $mondayFourthClass;

    public function __construct() {}
}

class ModuleHoursDetails
{
    public string $hourStart;
    public string $hourEnd;
    public int $dayOfWeek;
    private ?int $moduleId;

    public function __construct($startHour, $endHour, $dayOfWeek)
    {
        $this->hourStart = $startHour;
        $this->hourEnd = $endHour;
        $this->dayOfWeek = $dayOfWeek;
        $this->moduleId = null;
    }

    public function getModuleId(): ?int
    {
        return $this->moduleId;
    }

    public function setModuleId(ModuleHours $moduleHours): void
    {
        if (!empty($this->moduleId)) return false;
        if (empty($moduleHours->moduleId)) return false;
        if (!$this->checkHours($moduleHours->hour_start, $moduleHours->hour_end)) return false;
        if ($moduleHours->week_day != $this->dayOfWeek) return false;

        $this->moduleId = $moduleHours->moduleId;
    }


    private function checkHours(string $hourStart, string $hourEnd): bool
    {
        if ($hourStart != $this->$hourStart || $hourEnd != $this->$hourEnd) return false;

        return true;
    }
}

class DaySchedule
{
    public int $weekday;
    public array $arrayModuleHoursDetails;

    public function __construct(int $weekday)
    {
        $this->weekday = $weekday;
        $this->arrayModuleHoursDetails = [];
    }

    //make a function to insert a module into the array, look if the array have more than 6 modules, if the day is the same week day
}
