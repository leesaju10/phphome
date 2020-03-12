<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
?>

<?php 
   		$num = $_GET["idx"];
	        $sql = 'DELETE FROM `Profile` WHERE `Profile`.`num` ='.$num;
            $result =  mysqli_query($conn, $sql);
            if($result){
                echo '<script>alert("탈퇴 완료");location.href="관리자페이지.php";</script>';
            }
            else{
                echo 'fail';
            }
?>
