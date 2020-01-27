
<div class="serh-calendar-laravel">
    <div class="row">
        <div class="col-12">
            <h2>{{Calendar::year()->getName()}}</h2>
        </div>
    </div>
    <div class="row">

        @foreach(Calendar::year()->months() as $month)
        <div class="month  border p-0 m-1" style="width:250px">
            <div class="month-name text-center font-weight-bold  bg-dark text-white py-2">{{trans('calendar::calendar.'.$month->getName())}}</div>
            <div class="week-header d-flex flex-row justify-content-around bg-primary text-white mb-1">
                @foreach(Calendar::weekTitle() as $name)
            <div style="width:30px" class="week-day text-center p-1 {{in_array($name,["su","sa"])?"font-weight-bold":""}}">{{trans('calendar::calendar.'.$name) }}</div>
                @endforeach
            </div>
            @foreach($month->weeks() as $week)
            <div class="week d-flex flex-row justify-content-around">
                @foreach($week as $day)
                <div style="width:30px" class="day text-center p-1 mb-1 {{$day->getClass()}}">{{$day->getName()}}</div>
                @endforeach
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>