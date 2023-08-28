<?php
$x = $value['start_date'];
$sd = new DateTime($x);
$sdate = $sd->format('Y') . "  年 " . $sd->format('m') .  " 月 " . $sd->format('d') . " 日";


$y = $value['dob'];
$d = new DateTime($y);
$date = $d->format('Y') . "  年 " . $d->format('m') .  " 月 " . $d->format('d') . " 日";



// function dobdateformat()
// {
//      $dob = new DateTime("now");
//      $formattedDate = $dob->format("Y") . "  年 " . $dob->format("m") . " 月 " . $dob->format("d") . " 日";
//      // echo $formattedDate;
// }
//	2011 Year 08 Month 28 Day
// dobdateformat();

// function startdateformat()
// {
//      $sdate = new DateTime("now");
//      $formattedDate = $sdate->format("Y") . "  年 " . $sdate->format("m") . " 月 " . $sdate->format("d") . " 日";
//      // echo $formattedDate;
// }
// startdateformat();