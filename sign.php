<!DOCTYPE HTML>
<html>
	<head>
		<title> 회원 가입 </title>
	</head>

	<style>
		body{background:#7070A9; color:white;}
		table{border-color:#848484; border-width:2px;}
		#container{width:1600px; height:740px;}
	</style>

	<body>
		<div id = "container">
			<?php
				echo "<h1> 회원가입 페이지 </h1> <hr>
						<form method = 'post' action = 'signcheck.php'>
							<table border = 1 width = 350 cellspacing = 1 cellpadding = 1>
								<tr>
									<td> 아이디: </td> 
									<td> &nbsp; <input type = 'text' name = 'id' size = 20 /> </td> 
								</tr>
								<tr>
									<td> 비밀번호: </td> 
									<td> &nbsp; <input type = 'password' name = 'password' size = 20 /> </td> 
								</tr>
								<tr>
									<td> 이름: </td> 
									<td> &nbsp; <input type = 'text' name = 'name' size = 20 /> </td> 
								</tr>
								<tr>
									<td> 나이: </td> 
									<td> &nbsp; <input type = 'text' name = 'age' size = 20 /> </td> 
								</tr>
							</table> <hr>
							<a href = 'index.php'>
								<input type = 'button' value = '이전 페이지로' />
							</a>
							<input type = 'submit' value = '가입하기' />
						</form> ";
			?>
		</div>
	</body>
</html>
