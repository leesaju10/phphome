<?php 
session_start();

$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');

$id=$_POST['id'];
$content=$_POST["content"];
$idx=$_POST['idx'];
mysqli_query($conn,"set names utf8");

$sql = "INSERT INTO `reply_board` (`article_num`, `writer`, `content`, `date`) VALUES ('$idx', '$id', '$content', CURRENT_TIMESTAMP)";
$result = mysqli_query($conn, $sql);
$sql2 = "UPDATE `board` SET `reply` = reply+1 WHERE `board`.`num` = $idx";
$result2 = mysqli_query($conn, $sql2);
if($result && $result2){
echo "<script>alert('댓글 달기 성공');history.back();</script>";
}
else{
echo "<script>alert('댓글 달기 실패');history.back();</script>";
}
?>
