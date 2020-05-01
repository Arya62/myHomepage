<?php
	session_start();
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);
	$sql = "SELECT * from user where id = '$_SESSION[id]'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);

	if($password == "" || $name == "") { //입력 칸들 중 하나라도 빈 칸이 있을 경우
		echo "<script> 
				alert('비밀번호와 이름을 입력해주세요.');
				history.go(-1);
			</script> ";
	}
	else if($password == $row['password'] && $name == $row['name']){ //비밀번호와 이름 둘 다 맞을 경우
		$delete = "DELETE from user where id = '$_SESSION[id]'";
		mysql_query($delete, $connect);
		echo "<script> 
				alert('탈퇴 완료. 메인 페이지로 되돌아갑니다.');
				location = 'index.php';
			</script> ";

		unset($_SESSION['login']);
		unset($_SESSION['id']);
		unset($_SESSION['password']);
		unset($_SESSION['name']);
		unset($_SESSION['age']);
	}
	else{ //비밀번호나 이름을 틀렸을 경우
		echo "<script> 
				alert('비밀번호 또는 이름이 틀립니다.');
				history.go(-1);
			</script> ";
	}
	mysql_close($connect);
?>