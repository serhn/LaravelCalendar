<?php

namespace Serh\LaravelCalendar;

class Year
{

    protected $year;
    public function  __construct($year = '')
    {
        if ($year == '') {
            $year  = date('Y');
        }
        $this->year = $year;
    }
    public function months()
    {
        $months = [];
        for ($month = 1; $month <= 12; $month++) {
            $months[] = new Month($this->year, $month);
        }
        return $months;
    }
    public function getName()
    {
        return $this->year;
    }
}
