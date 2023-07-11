<?php
function dateformat()
{
     $d = new DateTime("now");
     $d = $d->format("Y") . "Year";
     echo $d;
}
dateformat();
