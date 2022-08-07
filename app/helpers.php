<?php

use Carbon\Carbon;




function presentMonthYear($date)
{
    return Carbon::parse($date)->format('M, Y');
}

function yearOnly($year)
{
    return Carbon::parse($year)->format('Y');
}

function presentMonth($date)
{
    return Carbon::parse($date)->format('F');
}

function presentDay($date)
{
    return Carbon::parse($date)->format('d');
}


function DayofTheWeek($date)
{
    return Carbon::parse($date)->format('l');
}



function timeFormat($time) 
{
    return Carbon::parse($time)->format('h:i A');
}