<?php
  session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户注册</title>
	<link rel="stylesheet" href="public/css/登录注册.css" />
	<link rel="stylesheet" href="public/css/u_dlzc.css">
	<script src="public/js/jquery-1.11.3.js"></script>
    <script src="public/js/register.js"></script>
</head>
<body>
	<div class="main">
		<div class="bg">  
        <ul>
			<form id="register" action="#">
            <input id="regname" type="text" name="regname" placeholder="请输入用户名"/>
            <div id="namediv"></div>

            <p><input id="regpwd1" type="password" name="regpwd1" placeholder="密码请输入至少6位有效字符"/>
            <div id="pwddiv1"></div></p>

            <input id="regpwd2" type="password" name="regpwd2" placeholder="请再输入一次密码"/>
            <div id="pwddiv2"></div>

            <p><input id="realname" type="text" name="realname" placeholder="请输入真实姓名"/></p>
            <div id="rnamediv"></div>

            <p><input id="regbtn" type="button" value="注册" disabled="disabled"/></p>
          </form>
        </ul>  
       </div> 		
	</div>	
</body>
</html>