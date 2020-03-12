<?php 
session_start();
session_destroy();
echo "
<script> 
alert('로그아웃 되셨습니다.');
location.href='로그인페이지.html';</script>
";
?>
