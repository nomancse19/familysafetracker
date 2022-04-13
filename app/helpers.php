<?php


use Carbon\Carbon;

function format_date($date){
  return Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
}


