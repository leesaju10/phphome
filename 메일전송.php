<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
$email=$_POST['email'];
$sql = 'SELECT * FROM `Profile` WHERE email="'.$email.'"';
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$nickname = $row['name'];
if($row['email']!=NULL){
    echo "<script> alert('이메일이 존재합니다.');</script>";

}
else{
    echo "<script> alert('존재하지 않는 이메일 입니다.');
                    location.href='로그인페이지.html';
    </script>";
}
?>
