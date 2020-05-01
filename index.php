<!DOCTYPE HTML>
<html>
  <head>
    <title>웹 페이지</title>
  </head>
  
  <style>
    body{background:#7070A9;}
    *{box-sizing:border-box;}
    #container{width:1600px; height:740px;}
    #header{background:#7070A9; color:white; height:70px; text-align:center; line-height:15px; font-size:20px;
	          border:2px solid #434370; font-weight:bold; margin:1px;}
    #login{background:#7070A9; color:white; height:50px; text-align:right; line-height:30px; font-size:20px; font-weight:bold;
	         border:2px solid #434370; padding:8px 10px; margin:1px;}
    #menubox{border:2px solid #434370; height:70px; margin:1px;}
    #menu a{color:white; display:block; float:left; text-align:center; line-height:50px;}
    ul{background:#7070A9; margin:0px; padding:7px 10px; text-align:center; line-height:45px; font-weight:bold;}
    li{display:inline; width:370px; height:50px; font-size:20px; border:2px solid #434370;}
    li a{color:white; text-decoration:none;}
    li a:hover{background:#303050; color:white; text-align:center;}
    li.menu{display:inline-block; border-radius:10px/20px; background:#60609F;}
    #content{background:#E0E0EB; border:2px solid #434370; float:left; height:500px;}
  </style>
  
  <body>
    <div id = "container">
      <div id = "header">
        <h1>웹페이지</h1>
      </div>
      
      <div id = "login">
        <?php
            session_start();

            if($_SESSION['login']) { //로그인 한 상태
              echo "{$_SESSION['name']} 님 환영합니다.
                    <a href = 'logout.php'>
                    	<input type = 'button' value = '로그아웃' />
                    </a> ";
            }   
            else { //로그인 전 상태
              echo "<form method = 'post' action = 'logincheck.php'>
                    	아이디: <input type = 'text' name = 'id' size = 20 /> &nbsp;
                    	비밀번호: <input type = 'password' name = 'password' size = 20 />
                    	<input type = 'submit' value = '로그인' />
                    	<a href = 'sign.php'>
                    		<input type = 'button' value = '회원가입' />
                   	  </a>
                    </form> ";
            }
        ?>
      </div>
      
      <div id = "menubox">
        <ul>
          <li class = "menu">
            <a href = "index.php"> Home </a>
          </li>
          <li class = "menu">
            <a href = "list.php"> 게시판 </a>
          </li>
          <li class = "menu">
            <a href = "signout.php"> 탈퇴하기 </a>
          </li>
          <li class = "menu">
            <a href = "mypage.php"> 마이페이지 </a>
          </li>
        </ul>
      </div>
      
      <div id = "content">
        <iframe name = "frame1" width = "1600" height = "500"> </iframe>
      </div>
    </div>
  </body>
</html>