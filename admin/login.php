<!doctype html>
<html>
<head>
    <title>用户登录</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="public/css/login.css" />
</head>

<body >	
	<h1 class="text">千纸诗书后台管理系统</h1>
	<div id=userlogin_body>
	<form action="check.php" method='post'>
	    <div class="top">
	        <p class="user">用户名： </p>
	        <input class="txtusernamecssclass" id=txtusername 
	          maxlength=20 name=username placeholder="请输入用户名"><br />
	        <p class="pas">密 码： </p>
	        <input class="txtpasswordcssclass" id=txtpassword 
	          type=password name=password placeholder="请输入密码">
	    </div>
	      
	    <div class="foot">
	      <input class="ibtnentercssclass" id=ibtnenter type=image  name=ibtnenter>	
	    </div>

	  <ul>
	</form>
	</div>
</body>
</html>
