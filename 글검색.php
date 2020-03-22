<?php
$conn = mysqli_connect(
  'localhost',
  'admin',
  'Admin1347!',
  'konyang');

mysqli_query($conn,"set session character_set_client=utf8");
mysqli_query($conn,"set session character_set_results=utf8");
mysqli_query($conn,"set session character_set_connection=utf8");
?>
<?php 
	$search = $_GET['search'];
	$page = 1;

	if($_GET['page']!=NULL){
	$page = $_GET['page'];}

	$list = 5; // 한 페이지에 보여줄 게시글 갯수
	$block = 5; // 한 페이지에 보여줄 블록 갯수 

        $sql = "SELECT count(*) as total FROM board WHERE title LIKE '%".$search."%' ";

        $result =  mysqli_query($conn, $sql);
	$tmp = mysqli_fetch_array($result); 
	$num = $tmp['total'];//총 게시글 갯수 

	$pageNum = ceil($num/$list);//총 페이지 갯수 

	$blockNum = ceil($pageNum/$block);//총 블록 갯수 
	$nowBlock = ceil($page/$block);//현재 페이지가 위치한 블록 번호 (현재 페이지랑 보여줄 블록 갯수를 나누면 현재 블록 값이 나온다.)
	$s_page = ($nowBlock*$block)-($block-1);//현재 위치한 블록 * 보여줄 블록 수 는 블록에서 마지막 페이지 이므로, 보여줄 블록 수 - 1 을 거기서 빼줘야 현재 블록의 첫번째 페이지다
	$e_page = ($nowBlock*$block);
	if($s_page <1){ $s_page = 1;}
	if($e_page >=$pageNum){ $e_page = $pageNum;}

?>
<?php
	
	$start = 0;
	if($page !=NULL){
	$start = $_GET['page'];
	}	

	$board_num = $start*$list-$list;
	if($start==0){$board_num=0;}

        $sql2 = "SELECT * FROM board WHERE title LIKE '%".$search."%' order by num desc limit $board_num, $list";
        $result2 =  mysqli_query($conn, $sql2);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>글 목록</title>
    </head>
    <body>
       번호 / 제목 / 작성자 / 날짜 / 조회수 / 댓글수 <br>
<table>
	<?php
		while($row2 = mysqli_fetch_array($result2)){
                $num = $row2['num'];
                $title = $row2['title'];
                $writer = $row2['writer'];
                $date = $row2['date'];
                $view = $row2['view'];
                $reply = $row2['reply'];
	
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
	<a href="글검색.php?search=<?php echo $search;?>&page=<?php if($s_page==1){echo 1;}else{echo $s_page-1;}?>">이전</a>
	<?php 
	//이전은 스타트 아래로 가면 이전 블록이 되고, 다음은 엔드 위로 가면 다음 블록이 된다.
	 for($p=$s_page; $p<=$e_page; $p++){//페이지는 시작 페이지부터 마지막 페이지 까지만 나오게 한다.
	 echo"<a href='글검색.php?search=$search&page=$p'>$p</a> ";
	 }
	?>


	<a href="글검색.php?search=<?php echo $search;?>&page=<?php if($e_page<$pageNum){echo $e_page+1;} else if($e_page==$pageNum){echo $pageNum;} ?>">다음</a>

<br>
<a href="글쓰기.html">글쓰기</a>
<a href="메인.php">메인으로 돌아가기</a>
<a href="글목록.php">글목록으로 돌아가기</a>
<form action="글검색.php" method="get">
검색창 : <input type="text" name ="search"><input type="submit" value="검색">

</form>
    </body>
</html>
