<?php
require "nrc.php";

$fp = fopen('nrc.csv', 'w');


foreach ($nrcDataList as $fields) {
     fputcsv($fp, $fields);
}

fclose($fp);
