<?php 

 function GenerateString($length)  
{  
    $characters  = "0123456789";  
    $characters .= "abcdefghijklmnopqrstuvwxyz";  
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  
      
    $string_generated = "";  
      
    $nmr_loops = $length;  
    while ($nmr_loops--)  
    {  
        $string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];  
    }  
      
    return $string_generated; }  

$password = GenerateString(10);
$encrypted_passwd = password_hash($password, PASSWORD_DEFAULT);
?>

<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");

mysqli_query($conn,"set session character_set_client=utf8");
mysqli_query($conn,"set session character_set_results=utf8");
mysqli_query($conn,"set session character_set_connection=utf8");

$email=$_POST['email'];
$sql = 'SELECT * FROM `Profile` WHERE email="'.$email.'"';
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$nickname = $row['name'];
if($row['email']!=NULL){

    $to = "$email";
    $subject = $nickname."님 아이디/비밀번호 찾기 입니다.";
    $message = "귀하의 아이디는 $id 입니다. 임시 비밀번호는 다음과 같습니다. $password";
    $headers = "From: 관리자<admin@kkk.kkk>";
    $rs=mail( "$id<$to>", $subject, $message, $headers);
    if($rs){
    echo "<script>alert('존재하는 이메일 입니다. 아이디와 임시 비밀번호가 이메일로 전송됩니다.');   </script>";	
	$sql2 = "UPDATE `Profile` SET `password` = '$encrypted_passwd' WHERE `Profile`.`id` = '$id'";
$result2 =  mysqli_query($conn, $sql2);	
 echo "<script>location.href='로그인페이지.html'; </script>";
}
    else{
	echo "fail";
}
}
else{
    echo "<script> alert('존재하지 않는 이메일 입니다.');
                    location.href='로그인페이지.html';
    </script>";
}
?>


