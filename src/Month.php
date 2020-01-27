<?php

namespace Serh\LaravelCalendar;

class Month
{
    private $year;
    private $month;


    public function __construct($year, $month)
    {
        if ($month == '') {
            $month = date('m');
        }
        $this->month = sprintf("%02d", $month);
        $this->year = $year;
    }

    public function getName($month = "")
    {
        $monthNames = ['01' => 'january', '02' => 'february', '03' => 'march', '04' => 'april', '05' => 'mayl', '06' => 'june', '07' => 'july', '08' => 'august', '09' => 'september', '10' => 'october', '11' => 'november', '12' => 'december'];
        return $monthNames[$this->month];
    }
    public function days()
    {
        $days = [];
        for ($day = 1; $day <= $this->lastDay(); $day++) {
            $days[] = new Day($this->year . "-" . $this->month . "-" . sprintf("%02d", $day));
        }
        return $this->addEmptyDays($days);
    }
    public function weeks()
    {
        return collect($this->days())->chunk(7);
    }
    private function addEmptyDays($days)
    {
        $emptyDaysBefor = (new Week)->numEmptyDaysBefor($this->year, $this->month);
        for ($emptyDaysBefor; $emptyDaysBefor > 0; $emptyDaysBefor--) {
            array_unshift($days, new DayEmpty());
        }

        $emptyDaysLast = (new Week)->numEmptyDaysLast($this->year, $this->month);
        for ($emptyDaysLast; $emptyDaysLast > 0; $emptyDaysLast--) {
            array_push($days, new DayEmpty());
        }

        return $days;
    }
    private  function firstWeek()
    {
        $weekNum = date("W", strtotime($this->year . "-" . $this->month . "-01"));

        return $weekNum;
    }
    private  function lastWeek()
    {
        $day = date("t", strtotime($this->year . "-" . $this->month . "-01"));
        $weekNum = date("t", strtotime($this->year . "-" . $this->month . "-" . $day));
        return $weekNum;
    }
    private  function firstDay()
    {
        return $this->year . "-" . $this->month . "-01";
    }
    private function lastDay()
    {
        return date("t", strtotime($this->year . "-" . $this->month . "-01"));
    }
}
