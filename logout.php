<?php
 session_start();
 
 unset($_SESSION['login']);
 unset($_SESSION['id']);
 unset($_SESSION['password']);
 unset($_SESSION['name']);
 unset($_SESSION['age']);
	
 echo "<script>
			alert('로그아웃합니다.');
			location = 'index.php';
     	</script> ";
?>