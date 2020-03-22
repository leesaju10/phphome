<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
    mysqli_query($conn,"set names utf8");  
    $idx = $_GET['idx'];
    $num = $_GET['article'];
    $content = $_POST['content'];
    $sql = "UPDATE `reply_board` SET `content` = '$content' WHERE idx=$idx && article_num=$num";
    $result = mysqli_query($conn,$sql);  
	if($result){
	echo "<script>alert('댓글 수정 성공');location.href='글읽기.php?idx=$num';</script>";
	}
	else{
	echo "<script>alert('댓글 수정 실패');location.href='글읽기.php?idx=$num';</script>";
	}
?>
