<!DOCTYPE HTML>
<html>
	<head>
		<title> 게시글 </title>
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
				extract(array_merge($_POST));

				if($_SESSION['login']) { //작성자로 로그인 중일 때
					echo "<h3> {$_SESSION['name']}님으로 로그인 중 입니다. </h3>";

					$connect = mysql_connect("localhost", "sm15", "00102");
					mysql_select_db("myinformation", $connect);					
					$sql = "SELECT * from board where num"; 
					$result = mysql_query($sql); 
					$rows = mysql_fetch_array($result);

					echo "<table border = 1>
							<tr>
								<td width = '100' align = 'center'> 제목 </td>
								<td width = '600' align = 'center'>" .$rows['subject']. "</td>
							</tr>
							<tr>
								<td width = '100' align ='center'> 내용 </td>
								<td width = '600' height = '450'>" .$rows['content']. "</td>
							</tr>
							</table> <br>
							<a href = 'update.php'>
								<input type = 'button' value = '수정하기' />
							</a>
							<a href = 'delete.php'>
								<input type = 'button' value = '삭제하기' />
							</a>
							<a href = 'list.php'>
								<input type = 'button' value = '이전 페이지로' />
							</a>
						";
					mysql_close($connect);
				}
				else {
					echo "<script>
							alert('로그인 전에는 글의 내용을 확인할 수 없습니다.');
							history.go(-1);
						</script>";
				}
			?>
		</div>
	</body>
</html>
