<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">  
<html>  
<head>  
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">  
<title>欢迎您的到来</title>  
</head>  
<style type="text/css">  
    .div  
    {  
        height:1000px;  
        width:700px;  
        text-align:center;  
        margin:40px;  
          
    }  
    .text  
    {  
        font-size:20px;  
        margin:20px;  
          
    }  
    .button  
    {  
        font-size:10px;  
          
    }  
  
    </style>  
    <script>
        function changing(){
    document.getElementById('checkpic').src="showing.php?"+Math.random();
} 
    </script>
<body>  
<h1>注册页面</h1>  
<form method="post" action="register_1.php">  
<div class="div">  
    <div class="text">  
    用户名<input type="text" name="name1" ></div>
    <div class="text">  
    密码:<input type="password" name="password1"></div>
    <div class="text">  
    再次输入密码：<input type="password" name="pwd_again"></div>  
    <div class="text">  
    验证码：<input type="text" name="check"><img id="checkpic" onclick="changing();" src='showing.php' /></img></div>  
      
    <div class="text">  
    <input type="radio" name="agree" value="是否同意我们的条款">同意我们的条款?</div>  
      
    <input type="submit" value="提交">  
    <input type="reset" value="清除">  
      
  
</div>  
  
</form>  
  
  
</body>  
</html>  