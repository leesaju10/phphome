<?php
session_start();
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
?>
<?php 

$num = $_GET["idx"];
$sql = 'SELECT * FROM `board` WHERE num ='.$num;
    $result =  mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$title = $row['title'];
$content = $row['content'];

    $id=$_SESSION['id'];
    $sql2 = 'SELECT writer FROM `board` WHERE `num` = "'.$num.'"';
    $result2 =  mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $writer = $row2['writer'];

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
        <form action="수정.php?idx=<?php echo $num ?>" enctype="multipart/form-data" method = "post">
            <label for="id">
               제목 
            </label>
            <input type="text" name="title" id="title" 
            value="<?php echo $title ?>">
            <br>
            <label for="content">
                내용  : 
            </label>
            <textarea name="content" id="content"><?php echo $content ?></textarea>
            <br>
            <input type="file" name="image">
            <br>
            <input type="submit" value="클릭시 정보 전송">
        </form>
    </body>
</html>
