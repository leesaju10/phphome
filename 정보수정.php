<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
mysqli_query($conn,"set names utf8");
?>
<?php
    $id=$_SESSION['id'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $nickname = $_POST['nickname'];
    $sex = $_POST['sex'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    
    $sql = "UPDATE `Profile` SET `password` = '$password', `address` = '$address', `name` = '$nickname', `sex` = '$sex', `phone_num` = '$phone', `email` = '$email' WHERE `Profile`.`id` ='$id'";

    $result =  mysqli_query($conn, $sql);
    if($result){
	echo "<script>
              	   alert( '수정 완료' );
		   location.href='메인.php';
              </script>";
    }
?>    
