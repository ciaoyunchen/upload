<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳檔案機制
 * 3.取得檔案資源
 * 4.取得檔案內容
 * 5.建立SQL語法
 * 6.寫入資料庫
 * 7.結束檔案
 */

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>文字檔案匯入</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header">文字檔案匯入練習</h1>
<!---建立檔案上傳機制--->



<!----讀出匯入完成的資料----->
<?php

// 1.讀取檔案 fopen(檔案,"r")
// 2.讀取每一行資料 fgets()
// 3.將資料字串切割並存入陣列 explode()
// 4.建立sql語法 insert into
// 5.將資料寫入資料庫 pdo連線
// 6.迴圈 while()
// 7.判斷是否還有資料 feof()
// 8.略過標題 if....


$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn,"root","iamdoris19930303");

$file = fopen("台灣糖業公司_近5年退休人數.csv","r");
$line = fgets($file);  //讀出第一行'標題'但是不處理

while(!feof($file)){
    $line = fgets($file);  //從第二行開始讀取，並執行sql
    $data = explode(",",$line);

    if(count($data)>1){  //避免讀取到空白行(空白行會有一個值)
        $sql = "INSERT INTO `retire` (`id`, `year`, `num`, `pro`) VALUES (NULL," . $data[0] . "," . $data[1] . "," . $data[2] . ")";
        $pdo->exec($sql);
    }
    
}








?>


</body>
</html>