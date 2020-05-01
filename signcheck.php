<?php
	extract(array_merge($_POST));

	$connect = mysql_connect("localhost", "sm15", "00102");
	mysql_select_db("myinformation", $connect);
	$sql_id = "SELECT * from user where id = '$id'";
	$result = mysql_query($sql_id);
	$num = mysql_num_rows($result);

	if($id == "" || $password == "" || $name == "" || $age == ""){ //입력 칸들 중 하나라도 빈 칸이 있을 경우
		echo "<script> 
				alert('모두 입력하셔야 합니다.');
				history.go(-1);
			</script> ";
	}
	else if($num){ //아이디가 중복될 경우
		echo "<script> 
				alert('입력하신 아이디는 중복된 아이디입니다.');
				history.go(-1);
			</script> ";
	}
	else{ //회원가입 완료
		$insert = "INSERT into user values('{$id}', '{$password}', '{$name}', '{$age}')";
		mysql_query($insert, $connect);
		echo "<script> 
				alert('회원가입 완료. 메인 페이지로 되돌아갑니다.');
				location = 'index.php';
			</script> ";
	}
	mysql_close($connect);
?>