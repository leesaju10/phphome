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
    <?php echo $_SESSION['id']; ?>님!
    <a href="글목록.php">글 목록 가기</a><br>
    <button type="button"onclick = "location.href='로그아웃.php'">로그아웃</button>
    </body>
</html>
