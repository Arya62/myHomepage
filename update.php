<!DOCTYPE HTML>
<html>
	<head>
		<title> 수정하기 </title>
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
			
			$connect = mysql_connect("localhost", "sm15", "00102");
			mysql_select_db("myinformation", $connect);
			$sql= "SELECT * from board";
			$result = mysql_query($sql);
			$rows = mysql_fetch_array($result);

			if($_SESSION['name'] == $rows['name']) { //작성자로 로그인 했을 때
				echo "<h1> 수정하기 </h1> <hr>
						<form method = 'POST' action = 'updatecheck.php'>
							<table border = 1>
								<tr>
									<td width = '100' align = 'center'>작성자</td>
									<td> &nbsp; {$_SESSION['name']} </td>
								</tr>
								<tr>
									<td width = '100' align = 'center'>제목</td>
									<td> <input type = 'text' name = 'subject' size = '78' value = " .$rows['subject']. " />  </td>
								</tr>
								<tr>
									<td width = '100' align = 'center'>내용</td>
									<td> <textarea name = 'content' cols = '80' rows = '30' > ".$rows['content']." </textarea> </td>
								</tr>
							</table> <br>
							<input type = 'submit' value = '수정하기'>
							<a href = 'view.php'>
								<input type = 'button' value = '이전 페이지로' />
							</a>
						</form> ";
			}
			else { //작성자가 아닌 다른 사람으로 로그인 되어 있을 때
				echo "<script>
						alert('권한이 없습니다.');
						history.go(-1);
					</script> ";
			}
			mysql_close($connect);
		?>
	</body>
</html>