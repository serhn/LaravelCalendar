<?php

namespace Serh\LaravelCalendar;

class Week
{
    public $week = [
        0 => 'su',
        1 => 'mo',
        2 => 'tu',
        3 => 'we',
        4 => 'th',
        5 => 'fr',
        6 => 'sa',
        7 => 'su'
    ];
    private $first;

    public function __construct($first = "su")
    {
        $this->first = $first;
        if ($this->first == "mo") {
            unset($this->week[0]);
        } else {
            unset($this->week[7]);
        }
    }
    public function numEmptyDaysBefor($year, $month)
    {
        $mktime = strtotime($year . "-" . $month . "-01");
        if ($this->first == "mo") {
            return date("N", $mktime) - 1;
        } else {
            return date("w", $mktime);
        }
    }
    public function numEmptyDaysLast($year, $month)
    {
        $mktimeBefor = strtotime($year . "-" . $month . "-01");
        $daysMonth = date("t", $mktimeBefor);
        $mktime = strtotime($year . "-" . $month . "-" . $daysMonth);
        if ($this->first == "mo") {
            $numLast =  date("N", $mktime);
        } else {
            $numLast = (date("w", $mktime)+1);
        }
        return ($numLast == 7) ? 0 : 7 - $numLast;
    }
}
