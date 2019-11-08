<?php

// fopen()打開檔案 w寫入
// $file = fopen("hello.text","w");

// \r\n斷行
// $string = "Hello world! \r\nToday is a good day,very good day.";

// fwrite()寫入檔案
// fwrite($file,$string);

// fclose()關閉檔案
// fclose($file);


$file = fopen("etax.csv","w");

$str = "";
for($i=0; $i<100; $i++){
    $num = rand(10000000,99999999);
    $month = rand(1,12);
    $str = $str . $num . "," . $month . "\r\n";
}

fwrite($file,$str);

fclose($file);


?>