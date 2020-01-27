<?php

namespace Serh\LaravelCalendar;

class DayEmpty implements DayInterface
{
    public function __construct()
    {

    }
    public function getName()
    {
        return "";
    }

    public function getClass()
    {
        
        return '';
    }
}
