<?php
session_start();
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
<?php
$id = $_SESSION['id'];
$sql = 'SELECT * FROM `Profile` WHERE id ="'.$id.'"';
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$sex = $row['sex'];
$email =$row['email'];
$phone = $row['phone_num'];
$address=$row['address'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>로그인</title>
    </head>
    <body>
        <form action="정보수정.php" method = "post">
               아이디 : <?php echo "$id";?>
            <br>
            <label for="password">
                패스워드  : 
            </label>
            <input type="password" name="password" id="password">
            <br>
            <label for="password2">
                패스워드 확인 : 
            </label>
            <input type="password" name="password2" id="password2">
            <br>
            <label for="nickname">
                닉네임 : 
            </label>
            <input type="text" name="nickname" id="nickname" value="<?php echo "$name";?>">
            <br>
                성별 : 
            <input type="radio" name="sex" id="sex" value="남" <?php if($sex=="남"){echo 'checked="checked" ';}?>>남
            <input type="radio" name="sex" id="sex" value="여" <?php if($sex=="여"){echo 'checked="checked" ';}?>>여
            <br>
            <label for="email">
                이메일 : 
            </label>
            <input type="text" name="email" id="email" value="<?php echo $email;?>">
            <br>
            <label for="phone">
                핸드폰번호 : 
            </label>
            <input type="text" name="phone" id="phone" value="<?php echo $phone;?>">
            <br>
            <label for="address">
                주소 : 
            </label>
            <input type="text" name="address" id="address" value="<?php echo $address;?>" >
            <br>
            <input type="submit" value="클릭시 정보 전송">
        </form>
    </body>
</html>
