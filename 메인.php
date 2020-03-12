<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>메인</title>
    </head>
    <body>
    <h1>
        환영합니다!
    </h1>
    <br>
    <?php $id=$_SESSION['id'];
	echo $id; ?>님!
    <a href="글목록.php">글 목록 가기</a><br>
    <a href="회원정보관리.php">회원정보관리 가기</a><br>
    <?php if($id=='admin'){
	echo '<a href="관리자페이지.php">관리자페이지 가기</a>';}?>
<button type="button"onclick = "location.href='로그아웃.php'">로그아웃</button>
    </body>
</html>
