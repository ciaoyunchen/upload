<?php

$dsn = "mysql:host=localhost;charset=utf8;dbname=upload";
$pdo = new PDO($dsn,"root","iamdoris19930303");

if(!empty($_FILES) && $_FILES['file']['error']==0){
    
    $type = $_FILES['file']['type'];
    $filename = $_FILES['file']['name'];
    $path = "./upload/";
    $updateTime = date("Y-m-d H:i:s");
    $id = $_POST['id'];
    
    move_uploaded_file($_FILES['file']['tmp_name'], $path . $filename);

    // 刪除原本的檔案
    $sql = "SELECT * FROM files WHERE id='$id'";
    $origin = $pdo->query($sql)->fetch();
    unlink($origin['path']);

    // 更新資料
    $sql = "UPDATE files SET name='$filename',type='$type',update_time='$updateTime',path='" . $path . $filename . "' WHERE id='$id'";
    $result = $pdo -> exec($sql);

    if($result == 1) {
        echo "上傳成功!";
        header("location:manage.php");
    }else {
        echo "DB有誤:(";
    }


}

$id = $_GET['id'];
$sql = "SELECT * FROM files WHERE id='$id'";
$data = $pdo->query($sql)->fetch();

?>

<form action="edit_file.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td colspan="2">
            <img src="<?=$data['path'];?>" style="width:200px ; height:200px">
        </td>
    </tr>
    <tr>
        <td>name</td>
        <td><?=$data['name'];?></td>
    </tr>
    <tr>
        <td>path</td>
        <td><?=$data['path'];?></td>
    </tr>
    <tr>
        <td>type</td>
        <td><?=$data['type'];?></td>
    </tr>
    <tr>
        <td>create_time</td>
        <td><?=$data['create_time'];?></td>
    </tr> 
</table>
    <input type="file" name="file"><br>
    <input type="hidden" name="id" value="<?=$data['id'];?>">
    <input type="submit" value="更新">
</form>