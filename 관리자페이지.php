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
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>관리자페이지</title>
    </head>
    <body>
       회원 번호 / 회원 아이디 / 닉네임 / 이메일주소 / 휴대폰 번호
	<table>
<?php 

	        $sql = 'select * from Profile';
                $result =  mysqli_query($conn, $sql);
            if($result) {
                echo "조회 성공";
            } else {
                echo "결과 없음: ".mysqli_error($conn);
            }
                while($row = $result->fetch_assoc()){            
                $num = $row['num'];
                $id = $row['id'];
                $nickname = $row['name'];
                $email = $row['email'];
                $phone = $row['phone_num'];
		echo "
			<tr>
			<td>$num</td>
			<td>$id</td>
			<td>$nickname</td>
			<td>$email</td>
            <td>$phone</td>
            <td><a href='회원탈퇴시키기.php?idx=$num'>탈퇴시키기</td>
			</tr>
			";
            }

?>
		</table>
<a href="메인.php">메인으로</a>
    </body>
</html>
