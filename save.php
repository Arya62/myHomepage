<?php
	session_start();
	extract(array_merge($_POST));
	
	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);

	if($subject != "" && $content != "") { //제목과 내용이 빈칸이 아닐 경우 저장
		$id = $_SESSION['id'];
		$name = $_SESSION['name'];
		$subject = $_POST['subject'];
		$content = $_POST['content'];

		$query = "INSERT into board(id, name, subject, content) values('$id', '$name', '$subject', '$content')";
		mysql_query($query, $connect);

		echo "<script> 
				alert('저장완료.');
				location = 'list.php';
			</script> ";
	}
	else{
		echo "<script> 
				alert('제목과 내용을 작성해주세요.');
				history.go(-1);
			</script> ";
	}
	mysql_close($connect);
?>