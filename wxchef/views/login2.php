
  <link rel="stylesheet" href="skin/css/login.css">
  <style type="text/css">
  	html{
  		height: 100%;
        background: url('../img/login_bg.png') repeat;

  	}
  </style>
<body class="login">

	<div class="login_center">
  <form action="<?=site_url('home/login2')?>"  method="post" id="login">
		<img class="login_logo" src="skin/img/logoico.png">
		<br/>
    <div class="login_form">
    <input type="tel" placeholder="用户" id='UserPhone' name='UserPhone' class="am-form-field am-radius"></input>
    <input type="password" placeholder="密码" name='UserPwd' id='UserPwd' class="am-form-field am-radius"></input>
    <p>
      <a href="<?php echo site_url('home/register')?>">新用户</a>
      <a href="<?php echo site_url('home/forgetPassword')?>">忘记密码？</a>
    </p>
    </div>
		<button type="submit" class="am-btn am-btn-success am-radius">登陆</button>
    </form>
	</div>
<div class="shade">
  <div>
    <span class="am-icon-meh-o"></span>
    <p>请输入正确的手机号码</p>
  </div>
</div>

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="skin/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="skin/js/amazeui.min.js"></script>
<script type="text/javascript">
    $(function(){
      $("#login").bind('submit',function(){
          var username = $(".login_form input[type='text']").val();
          var password = $(".login_form input[type='password']").val();
          if(username == ''){
              shade('am-icon-meh-o','用户名为空');
              return false;
          }
          if(password == ''){
              shade('am-icon-meh-o','密码为空');
              return false;
          }
      });
    // 提示框
        function shade(icon,cue){
            $('.shade').addClass('up');
            setTimeout(function(){$('.shade').removeClass('up');},1000);
            $('.shade div').remove();
            $('.shade').append('<div><span class="'+icon+'"></span><p>'+cue+'</p></div>');
        }
    });


  
</script>
</body>
</html>