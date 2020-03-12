<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
?>

<?php

    $Post_id = $_POST['id'];

    $Post_password = $_POST['password'];
    $sql = 'SELECT * FROM `Profile` WHERE `id` = "'.$Post_id.'"';

    $result =  mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $id = $row['id'];
    $password = $row['password'];


    if($id != NULL){
		if(password_verify($Post_password, $password)){
			$_SESSION['id'] = $id;
	 		echo '<script type="text/javascript">alert("로그인이 성공하였습니다.");
location.replace("./메인.php");</script>';

		}
		else{
			echo '<script type="text/javascript">alert("패스워드를 확인해 주십시오..");
location.replace("./로그인페이지.html");</script>';
		}
	}
    else 
	{
	 echo '<script type="text/javascript">alert("아이디를 확인해 주십시오..");
location.replace("./로그인페이지.html");</script>';

	}
?>
