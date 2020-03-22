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
$idx = $_GET["idx"];
$num = $_GET["article"];
$sql = "SELECT * FROM `reply_board` WHERE idx=$idx && article_num=$num";
$result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$writer = $row['writer'];
$content = $row['content'];
$id=$_SESSION['id'];
	if($id!=$writer){

		echo "<script>
			   alert( '작성자가 아니면 수정하실 수 없습니다.' );
			   history.back();
		      </script>
		     ";
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>글수정</title>
    </head>
    <body>
        <form action="댓글진짜수정.php?idx=<?php echo $idx; ?>&article=<?php echo $num; ?>" method = "post">
	    <?php echo $writer;?>
            <input type="text" name="content" id="content" value="<?php echo $content; ?>">
            <input type="submit" value="댓글수정">
        </form>
    </body>
</html>
