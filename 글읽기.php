<?php
session_start();
$id=$_SESSION['id'];
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
   		$num = $_GET["idx"];
	        $sql = 'SELECT * FROM `board` WHERE num ='.$num;
                $result =  mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$title = $row['title'];
		$writer = $row['writer'];
		$content = $row['content'];
		$file = $row['image'];
		$view = $row['view'];

		$sql2 = 'UPDATE `board` SET `view` = '.$view.'+1 WHERE `board`.`num` ='.$num.' ';
		$result2 = mysqli_query($conn,$sql2);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>글읽기</title>
    </head>
    <body>

	<table>
		<tr>
		<td><?php echo $num?></td>
		<td><?php echo $title?></td>
		<td><?php echo $writer?></td>
		</tr>
		<tr>
		<td><?php echo $content?></td>
		</tr>	
		<tr>
		<td><a href="download.php?idx=<?php echo $num?>" target='_blank'><?php echo $file?></td>
		</tr>	
	</table>

<script src="//code.jquery.com/jquery.min.js"></script>


	<table>
		<tr>
			<form action="댓글달기.php" method="POST">
			<input type="hidden" value="<?php echo $id ?>" name = "id" id="id">
			<input type="hidden" value="<?php echo $num ?>" name = "idx" id="idx">
			<td><?php echo $id?></td>
			<td><input type="text" name="content" id="content"></td>
			<td><button type="submit">댓글달기</button></td>
			</form>
			</tr>
	</table>
	<table>
	
	<?php 

	        $sql2 = 'SELECT * FROM `reply_board` WHERE article_num ='.$num;	
                $result2 =  mysqli_query($conn, $sql2);
		
		while($row2 = mysqli_fetch_array($result2)){
			$id = $row2['writer'];
			$content = $row2['content'];
			$date = $row2['date'];
			$idx = $row2['idx'];
		echo "<tr><td>$id</td><td>$content</td></tr><tr><td>$date</td><td><a href='댓글수정.php?idx=$idx&article=$num'>수정</a><a href='댓글삭제.php?idx=$idx&article=$num'>삭제</a></td></tr>";

		};
	?>
	</table>
	<a href="글삭제.php?idx=<?php echo $num?>">삭제</a>
	<a href="글수정.php?idx=<?php echo $num?>">수정</a>
	<br>
	<a href="메인.php">메인으로 돌아가기</a>
	<a href="글목록.php">글목록으로 돌아가기</a>
</body>
</html>
