<?php
	session_start();
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);
	$sql = "SELECT * from user where id = '$_SESSION[id]' and password = '$password'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);

	if($password == "" || $password2 == "" || $name == "" || $age == "") { //입력 칸들 중 하나라도 빈 칸일 경우
		echo "<script> 
			alert('모두 입력해주세요.');
			history.go(-1);
			</script> ";
	}
	else if($num){ //비밀번호가 맞을 경우
		$pwd = $_POST['password2'];

		$change = "UPDATE user set password = '$pwd', name = '$name', age = '$age' where id = '$_SESSION[id]'";
		mysql_query($change, $connect);

		echo "<script> 
			alert('정보 수정 완료. 메인 페이지로 되돌아갑니다.');
			location = 'index.php';
			</script> ";

		unset($_SESSION['password']);
		unset($_SESSION['name']);
		unset($_SESSION['age']);

		$_SESSION['password'] = $password;
		$_SESSION['name'] = $name;
		$_SESSION['age'] = $age;
	}
	else{ 
		echo "<script> 
			alert('비밀번호를 잘못 입력하였습니다.');
			history.go(-1);
			</script> ";
	}
	mysql_close($connect);
?>