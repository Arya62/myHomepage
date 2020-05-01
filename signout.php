<!DOCTYPE HTML>
<html>
	<head>
		<title> 회원 탈퇴 </title>
	</head>

	<style>
		body{background:#7070A9; color:white;}
		table{border-color:#848484; border-width:2px;}
		#container{width:1600px; height:740px;}
	</style>

	<body>
		<div id ="container">
			<?php
				session_start();
				extract(array_merge($_POST));
				
				if($_SESSION['login']) { //로그인 한 상태
					echo "<h1> 회원 탈퇴 </h1> <hr>
							<form method = 'post' action = 'signoutcheck.php'>
								<table border = 1 width = 350 cellspacing = 1 cellpadding = 1>
									<tr>
										<td> 아이디: </td> 
										<td> &nbsp;" .$_SESSION['id']. "</td> 
									</tr>
									<tr>
										<td> 비밀번호: </td> 
										<td> &nbsp; <input type = 'password' name = 'password' size = 20 /> </td> 
									</tr>
									<tr>
										<td> 이름: </td> 
										<td> &nbsp; <input type = 'text' name = 'name' size = 20 /> </td> 
									</tr>
								</table> <hr>
								<a href = 'index.php'>
									<input type = 'button' value = '이전 페이지로' />
								</a>
								<input type = 'submit' value = '탈퇴하기' />
							</form> ";
				}
				else { //로그인 전 상태
					echo "<script>
							alert('먼저 로그인을 해주세요.');
							location = 'index.php';
						</script>";
				}
			?>
		</div>
	</body>
</html>