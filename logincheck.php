<?php
	session_start();
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);
	$sql = "SELECT * from user where id = '$id' and password = '$password'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if ($id == "" || $password == "") { //입력 칸들 중 하나라도 빈 칸이 있으면
		echo "<script>
				alert('아이디와 비밀번호를 입력해주세요.');
				location = 'index.php';
			</script> ";
	}
	else if($num) { //아이디와 패스워드를 맞게 입력한 경우
		$row = mysql_fetch_array($result);
		$_SESSION['login'] = "true";
		$_SESSION['id'] = $row['id'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['age'] = $row['age'];
		echo "<script> 
				alert('로그인 되었습니다.'); 
				location = 'index.php'; 
			</script> ";
	}
	else { //아이디나 비말번호를 틀렸을 경우
		echo "<script> 
				alert('아이디 또는 비밀번호가 틀립니다.');
				history.go(-1);
			</script> ";
	}
	mysql_close($connect);
?>