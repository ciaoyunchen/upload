<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */


// 有"說明欄位"的判斷式，因為POST只接收text或submit的值
// if(!empty($_POST)){
if(!empty($_FILES) && $_FILES['img']['error']==0){  // 判斷 1.有資料 2.上傳成功
    echo "有POST的資料<br>";
    echo $_FILES['img']['error']; // 顯示錯誤代碼
    echo "<br>";
    echo $_FILES['img']['tmp_name']; // 上傳檔案後的暫存資料夾位置
    echo "<br>";
    echo $_FILES['img']['type']; // 上傳檔案的檔案類型
    echo "<br>";
    echo $_FILES['img']['size']; // 上傳的檔案原始大小
    echo "<br>";
    // 搬移檔案 move_uploaded_file(來源位置,目標位置+檔名) 來源及目標+檔名位置為字串型式
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->

 <form action="upload.php" method="post" enctype="multipart/form-data">
  檔案：<input type="file" name="img" ><br>
  <!-- 檔案說明：<input type="text" name="imgdesc"><br> -->
  <input type="submit" value="上傳">
 </form>




<!----建立一個連結來查看上傳後的圖檔---->  
<br><br>
<a href="./img">查看你上傳的檔案</a>

</body>
</html>