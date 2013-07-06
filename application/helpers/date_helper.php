<?php

  function date_short($date)
  {
    $tmp = explode('-', $date);
    $date_now = $tmp[2].' - '.$tmp[1].' - '.$tmp[0];
    return $date_now;
  }

  function date_with_name_month($date)
  {
    $tmp = explode('-', $date);
    $name_month = date("F", $tmp[1]);
    $date_now = $tmp[2].' '.$name_month.' '.$tmp[0];
    return $date_now;
  }

  function date_with_name_month_and_days($date)
  {
    $tmp = explode('-', $date);
    $name_month = date("F", $tmp[1]);
    $name_day = date("l", $tmp[2]);
    $date_now = $name_day.', '.$tmp[2].' '.$name_month.' '.$tmp[0];
    return $date_now;
  }

?>