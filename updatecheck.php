<?php
	session_start();
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);

	$update = "UPDATE board set subject = '$subject', content = '$content' where id = '$_SESSION[id]' ";
	mysql_query($update, $connect);

	echo "<script> 
				alert('수정 완료. 이전 페이지로 되돌아갑니다.');
				location = 'view.php';
			</script> ";

	mysql_close($connect);
?>