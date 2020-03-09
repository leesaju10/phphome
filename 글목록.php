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
        <title>글 목록</title>
    </head>
    <body>
       번호 / 제목 / 작성자 / 날짜 / 조회수 / 댓글수 
	<table>
<?php 

	        $sql = 'select * from board order by num desc';
                $result =  mysqli_query($conn, $sql);
                while($row = $result->fetch_assoc()){            
                $num = $row['num'];
                $title = $row['title'];
                $writer = $row['writer'];
                $date = $row['date'];
                $view = $row['view'];
                $reply = $row['reply'];

		echo "
			<tr>
			<td>$num</td>
			<td><a href='./글읽기.php?idx=$num'>$title</td>
			<td>$writer</td>
			<td>$date</td>
			<td>$view</td>
			<td>$reply</td>
			</tr>
			";
            }

?> 
		</table>
<a href="글쓰기.html">글쓰기</a>
<a href="메인.php">메인으로 돌아가기</a>
    </body>
</html>
