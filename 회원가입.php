
<?php
 header('Content-Type: text/html; charset=UTF-8');
   
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang'); 
mysqli_query($conn,"set names utf8");
    $id = $_POST['id'];
	$pw = $_POST['password'];
    $name = $_POST['name'];
    $sex = $_POST['sex'];
	$phone_num = $_POST['phone_num'];
    $email = $_POST['email'];
    $address = $_POST['address'];
$sql  = "
INSERT INTO `Profile` (`id`, `password`, `address`, `name`, `sex`, `phone_num`, `email`) 
VALUES ('".$id."','".$pw."','".$address."','".$name."','".$sex."','".$phone_num."','".$email."');
";
$result = mysqli_query($conn, $sql);
echo '<script>alert("회원가입 되셨습니다.");
		location.href="로그인페이지.html";
</script>';
?>
