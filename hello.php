<?php

$file = fopen("nine.php","w");

$str = "";
for($i=1; $i<=9; $i++){

    $str = $str . "<h1>";

    for($j=1; $j<=9; $j++){
        $str = $str . $i . "x" . $j . "=" . ($i*$j) . ",,";
    }

    $str = $str . "</h1>\r\n";
} 


fwrite($file,$str);

fclose($file);
?>