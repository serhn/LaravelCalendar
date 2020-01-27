<?php

namespace Serh\LaravelCalendar;

class Day implements DayInterface
{
    public $day;
    public $dayType;

    public function __construct($day)
    {
        $this->day = $day;

        $week=date("w", strtotime($this->day));
        $this->dayType=!in_array($week,["6","0"])?"work":"holiday";
    }
    public function getName()
    {
        return date("j", strtotime($this->day));
    }

    public function getClass()
    {
        $classes=[];
        if($this->day==date("Y-m-d")){
            $classes[]="font-weight-bold";
        }
        if( $this->dayType=="holiday"){
            $classes[]="bg-danger text-white";
        }
        return implode(" ",$classes);
    }

}
