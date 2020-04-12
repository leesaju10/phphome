<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');

$id = $_GET['id'];
echo $id;

$sql = "SELECT * FROM `Profile` WHERE id='$id'"; 
$result =  mysqli_query($conn, $sql);
$tmp = mysqli_fetch_array($result); 
$id_temp = $tmp['id'];
if($id_temp == NULL)
echo "중복되지 않은 아이디 입니다.";
else 
echo "중복된 아이디 입니다.";
?>
