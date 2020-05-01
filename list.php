<!DOCTYPE HTML>
<html>
	<head>
		<title> 게시판 </title>
	</head>

	<style>
		body{background:#7070A9; color:white;}
		table{border-color:#848484; border-width:2px;}
		#container{width:1600px; height:740px;}
	</style>

	<body>
		<div id = "container">
			<h1> 게시판 </h1> <hr>
			<?php
				session_start(); 

				if($_SESSION['login']){ //로그인 상태 일 때 글쓰기 버튼을 활성화
					echo "{$_SESSION['name']}님으로 로그인 중 입니다. &nbsp;
							<a href='write.php'> 
								<input type = 'submit' value = '글쓰기' /> 
							</a> ";					
				}
				$connect = mysql_connect("localhost", "sm15", "00102");
				mysql_select_db("myinformation", $connect);
				$sql = "SELECT * from board order by num desc"; 
				$result = mysql_query($sql);

				echo "<form method = 'post' action = 'view.php'>
						<table border=1>
						<tr>
							<td width = '100' align ='center'> 번호 </td>
							<td width = '700' align ='center'> 제목 </td>
							<td width = '300' align ='center'> 작성자 </td>
						</tr> ";
				while($rows = mysql_fetch_array($result)) {
					echo "<tr>
								<td width = '100' align = 'center'>" .$rows['num']. "</td>
								<td width = '700' align = 'center'><a href = 'view.php'>" .$rows['subject']. "</a> </td>
								<td width = '300' align = 'center'>" .$rows['name']. "</td>
							</tr> ";				
				}
				echo "</table> </form> <br>
						<a href = 'index.php'>
							<input type = 'button' value = '이전 페이지로' />
						</a> ";
				mysql_close($connect);
			?>
		</div>
	</body>
</html>