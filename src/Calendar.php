<?php 
namespace Serh\LaravelCalendar;

use Illuminate\Http\Request;

class Calendar{
    var $year;
    public function __construct(Request $request)
    {
         $this->year=date("Y");
    }
	public function init($config = array())
	{
		foreach ($config as $key => $val)
		{
			if (isset($this->$key))
			{
				$this->$key = $val;
			}
		}
	}
    public function year(){
        return new Year($this->year);
    }
    public function weekTitle(){
        $week = new Week();
        return  $week->week;
    }
}