<?php

$toName = "키에르"; //받는이 이름
 $toMail = "56numghest@naver.com"; //받는이 메일

 $mail_content = "메일 내용";   //메일 내용

 $subject = "메일 제목";  //메일 제목
 $fromName = "관리자";  //보내는이 이름
 $fromMail = "test@gmail.com";  //보내는이 메일


 $headers = "Return-Path: <".$fromMail.">\n";
 $headers .= "From: ".$fromName." <".$fromMail.">\n";
 $headers .= "X-Sender: <".$fromMail.">\n";
 $headers .= "X-Mailer: PHP\n";
 $headers .= "Reply-To: ".$fromName." <".$fromMail.">\n";
 $headers .= "MIME-Version: 1.0\n";
 $headers .= "Content-Type: text/html;charset=utf-8\n";
 

 $rs = @mail("$toName <$toMail>",$subject,$mail_content,$headers);

if($rs)
{
 echo '<script> alert("메일함에서 메일을 확인하세요.");
location.href="로그인페이지.html";
</script>';
}
else
 {
 echo '<script> alert("전송실패");</script>';
}

?>
