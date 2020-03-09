<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>글 목록</title>
    </head>
    <style>
	img{
		width :300px;
		hieght : 300px;
	   }

    </style>
    <body>
       번호 / 제목 / 작성자 / 날짜 / 조회수 / 댓글수 
	<table>
<?php 

	        $sql = 'select * from board order by num desc';
                $result =  mysqli_query($conn, $sql);
            if($result) {
                echo "조회 성공";
            } else {
                echo "결과 없음: ".mysqli_error($conn);
            }
                while($row = $result->fetch_assoc()){            
                $num = $row['num'];
                $title = $row['title'];
                $writer = $row['writer'];
                $date = $row['date'];
                $view = $row['view'];
                $reply = $row['reply'];
		$image = $row['image_change'];

		echo "
			<tr>
			<td>$num</td>
			<td><a href='./글읽기.php?idx=$num'>$title</td>
			<td><img src='$image'></td>
			<td>$writer</td>
			<td>$date</td>
			<td>$view</td>
			<td>$reply</td>
			</tr>
			";
            }

?>
		</table>
    </body>
</html>
