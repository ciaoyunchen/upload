<?php
/****
 * 1.建立資料庫及資料表
 * 2.建立上傳圖案機制
 * 3.取得圖檔資源
 * 4.進行圖形處理
 *   ->圖形縮放
 *   ->圖形加邊框
 *   ->圖形驗證碼
 * 5.輸出檔案
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
<h1 class="header">圖形處理練習</h1>
<!---建立檔案上傳機制--->



<!----縮放圖形----->

<?php

// 練習一

// $img = imagecreatetruecolor(100,100); //建立一個預設是黑色的圖層(寬,高)
// $bg = imagecreatetruecolor(50,50);

// $background = imagecolorallocate($bg, 255, 0, 0);  //分配顏色給圖層bg
// imagefill($bg,0,0,$background);  //填入顏色範圍

// imagecopymerge($img,$bg,25,25,0,0,50,50,100);  //(目標起始點,來源起始點,目標長寬,目標透明度)

// imagepng($img,"test.png");  //存成png檔(目標圖片,檔名)


// 練習二

// $thm = imagecreatetruecolor(50,50);
// $src = imagecreatefrompng("test.png");
// imagecopyresampled($thm,$src,0,0,0,0,50,50,100,100);

// imagepng($thm,"thm.png");


// 練習三

$imgSrc = "scalingtest.png";
$imgInfo = getimagesize($imgSrc);
$rate = 0.5;

//計算縮放後的大小
$dst_w = $imgInfo[0]*$rate;
$dst_h = $imgInfo[1]*$rate;

$thm = imagecreatetruecolor($dst_w,$dst_h);
$src = imagecreatefrompng($imgSrc);
imagecopyresampled($thm,$src,0,0,0,0,$dst_w,$dst_h,$imgInfo[0],$imgInfo[1]);

imagepng($thm,"thm.png");

?>
<img src="scalingtest.png">
<img src="thm.png">


<!----圖形加邊框----->


<!----產生圖形驗證碼----->



</body>
</html>