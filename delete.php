<?php
	session_start();
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);
	$sql= "SELECT * from board where num";
	$result = mysql_query($sql);
	$rows = mysql_fetch_array($result);

	if($_SESSION['name'] == $rows['name']) { //작성자로 로그인 했을 때
		$delete = "DELETE from board where num = $num";
		mysql_query($delete, $connect);

		echo "<script>
				alert('삭제 완료. 게시판 페이지로 되돌아갑니다.')
				location = 'list.php';
			</script> ";
	}
	else { //작성자가 아닌 다른 사람으로 로그인 되어 있을 때
		echo "<script>
				alert('권한이 없습니다.');
				history.go(-1);
			</script> ";
	}
	mysql_close($connect);
?>