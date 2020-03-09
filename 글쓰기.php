<?php
session_start();
$writer = $_SESSION['id'];
ini_set("display_errors", "1");
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
    mysqli_query($conn,"set names utf8");
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $uploaddir = './image/';
    $origin_name= $_FILES['image']['name'];
    $uploadfile = $uploaddir . basename($_FILES['image']['name']);

    $sql  = "INSERT INTO `board` (`title`, `content`, `image`, `image_change`, `writer`) 
            VALUES ('".$title."','".$content."','".$origin_name."','".$uploadfile."','".$writer."');;
";
$result = mysqli_query($conn, $sql);
if($result === false){
    echo mysqli_error($conn);
} 
if($origin_name!=NULL){
if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    echo "<script>alert( '성공적으로 업로드 되었습니다.' );
location.href='글목록.php';			
	</script>";
} else {
    print "파일 업로드 공격의 가능성이 있습니다!\n";
}}
else{
	echo "<script>alert( '성공적으로 업로드 되었습니다.' );
		location.href='글목록.php';	</script>";
}
  ?>
