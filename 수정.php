<?php
session_start();
ini_set("display_errors", "1");
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
    mysqli_query($conn,"set names utf8");  
    $idx = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $writer ="writer";
    $uploaddir = './image/';
    $origin_name= $_FILES['image']['name'];
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    $sql1  = "UPDATE `board` SET `title` = '$title', `content` = '$content' WHERE `board`.`num` = '$idx';";
$result = mysqli_query($conn, $sql1);
    $sql2 = "UPDATE `board` SET `image` = '$origin_name', `image_change` = '$uploadfile' WHERE `board`.`num` = '$idx';";
    
    if($origin_name!=NULL){
        $result2 = mysqli_query($conn, $sql2);
        echo '<pre>';
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "파일이 유효하고, 성공적으로 업로드 되었습니다.\n";
        } 
        else {
            print "파일 업로드 공격의 가능성이 있습니다!\n";
        }
    }
    if($result === false){
        echo mysqli_error($conn);
    } 
?>
