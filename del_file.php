<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn,"root","iamdoris19930303");

$id = $_GET['id'];

if(!empty($_GET['do'])) {  //判斷是否有按按鈕的動作
    if($_GET['do'] == "true") {  //假如是按確認按鈕(get回傳值是字串)

        // 刪除檔案夾的檔案
        $sql = "SELECT * FROM files WHERE id='$id'";
        $origin = $pdo->query($sql)->fetch();
        $origin_file = $origin['path'];
        unlink($origin_file);

        // 刪除資料庫的資料
        $sql = "DELETE FROM files WHERE id='$id'";
        $pdo->exec($sql);
        header("location:manage.php");

    }else {  //假如是按取消按鈕

        header("location:manage.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    * {
        text-decoration: none;
    }
    a {
        display: inline-block;
        border: 1px solid #ccc;
        padding: 5px;
        border-radius: 10px;
        box-shadow: 1px 1px 3px #ccc;
    }
    </style>
</head>
<body>

    你是否確認刪除檔案?
    <a href="?do=true&id=<?=$id;?>">確認刪除</a>
    <a href="?do=false&id=<?=$id;?>">取消刪除</a>

</body>
</html>

