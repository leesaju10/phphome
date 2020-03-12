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
    $num = $_GET['idx'];
    $id=$_SESSION['id'];
    $sql2 = 'SELECT writer FROM `board` WHERE `num` = "'.$num.'"';
    $result2 =  mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $writer = $row2['writer'];

	if($id==$writer || $id=="admin"){
   		$num = $_GET["idx"];
	        $sql = 'DELETE FROM `board` WHERE `board`.`num` ='.$num;
            $result =  mysqli_query($conn, $sql);
            if($result){
                	echo "<script>
			   alert( '삭제되었습니다.' );
			      location.href='글목록.php';
		      </script>
		     ";
            }
            else{
                echo 'fail';
            }
			

    }
	else{
	echo "<script>
			   alert( '작성자가 아니면 삭제하실 수 없습니다.' );
			   history.back();
		      </script>
		     ";
}
?>
