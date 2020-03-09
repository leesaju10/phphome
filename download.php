<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');
ini_set("display_errors", "1");
		$num = $_GET['idx'];
	        $sql = 'SELECT * FROM `board` WHERE num ='.$num;
                $result =  mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		$filename=$row['image'];
		$file = $row['image_change'];
		header('Content-Description: File Transfer');
    		header('Content-Type: application/octet-stream');
   		header('Content-Disposition: attachment; filename='.$filename);
    		header('Content-Transfer-Encoding: binary');
    		header('Expires: 0');
    		header('Cache-Control: must-revalidate');
    		header('Pragma: public');
    		header('Content-Length: '.filesize($file));
    		ob_clean();
    		flush();
    		readfile($file);

?>

