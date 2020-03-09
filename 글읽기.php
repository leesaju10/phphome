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
	<a href="글삭제.php?idx=<?php echo $num?>">삭제</a>
	<br>
	<a href="글수정.php?idx=<?php echo $num?>">수정</a>
	<br>
	<a href="메인.php">메인으로 돌아가기</a>
	<a href="글목록.php">글목록으로 돌아가기</a>
</body>
</html>
