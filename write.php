<!DOCTYPE HTML>
<html>
	<head>
		<title> 글 쓰기 </title>
	</head>

	<style>
		body{background:#7070A9; color:white;}
		table{border-color:#848484; border-width:2px;}
		#container{width:1600px; height:740px;}
	</style>

	<body>
		<div id = "container">
		<?php
			session_start();
			
			echo "<h1> 글 쓰기 </h1> <hr>
					<form method = 'POST' action = 'save.php'>
						<table border = 1>
							<tr>
								<td width = '100' align = 'center'>작성자</td>
								<td> &nbsp; {$_SESSION['name']} </td>
							</tr>
							<tr>
								<td width = '100' align = 'center'>제목</td>
								<td> <input type = 'text' name = 'subject' size = '78' /> </td>
							</tr>
							<tr>
								<td width = '100' align = 'center'>내용</td>
								<td> <textarea name = 'content' cols = '80' rows = '30' > </textarea> </td>
							</tr>
						</table> <br>
						<input type = 'submit' value = '저장하기'>
						<a href = 'list.php'>
							<input type = 'button' value = '이전 페이지로' />
						</a>
					</form> ";
		?>
		</div>
	</body>
</html>