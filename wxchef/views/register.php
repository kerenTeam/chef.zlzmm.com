<link rel="stylesheet" href="skin/css/login.css">
<style type="text/css">
html {
	height: 100%;
	background-color: white;
}
</style>
</head>

<body class="register">
<form method="post" action="<?=site_url('home/registeradd');?>" class="form_test" id="regForm">
  <div class="first">
    <div class="reg_input flex">
      <label>中国 +86</label>
      <input type="tel" placeholder="请输入手机号码" name="UserPhone" id='userphone'/>
    </div>
    <div class="reg_test">
      <input type="text"  placeholder="输入验证码" name='code'/>
      <input type="button" onclick="yzm(this)" value="获取验证码" />
    </div>
    <div class="user_agreement">
      <label class="am-radio am-success">
        <input type="checkbox" data-am-ucheck/>
        <span class="user">我已阅读并同意<a href="<?php echo site_url('home/protocol')?>">《大厨到家》</a>用户手册.</span> </label>
    </div>
  </div>
  <div class="seconde" style="display:none;">
     <div class="reg_input flex">
		<label class="am-text-sm">设置密码</label>
		<input type="password" placeholder="请输入密码" class="pass" name="UserPwd" id="UserPwd"/>
	</div>
     <div class="reg_input flex">
		<label class="am-text-sm">确认密码</label>
		<input type="password"  placeholder="确认密码" class="passcheck"/>
	</div>
  </div>
  <div class="reg_btn">
    <button type="button" class="am-btn am-btn-default">下一步</button>
  </div>
</form>
<div class="shade">
  <div> <span class="am-icon-meh-o"></span>
    <p>请输入正确的手机号码</p>
  </div>
</div>

<!--[if (gte IE 9)|!(IE)]><!--> 
<script src="skin/js/jquery.min.js"></script> 
<!--<![endif]--> 
<script src="skin/js/amazeui.min.js"></script> 
<script type="text/javascript"> 
		 var code;
		// 验证是否同意协议
			function yzm(input){
		 	var phone = $("#userphone").val();
		 	if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(phone))){
		 		shade('am-icon-meh-o','请输入正确的手机号码');
		 	}else{
		 		time(input);
		 		$.ajax({
		 			type: "post",
		 			url: "<?=site_url('pricesearch/send');?>",
		 			data: {"UserPhone":+phone},
		 			success: function(data){
		 				console.log(data);
		 				code = data;
		 			}
		 		});
                // code = "123456";
		 	}

		}
		var checkbox = $(".user_agreement input[type='checkbox']");
		checkbox.bind('change',function(){ 
			if(checkbox.is(':checked')){
				$('.reg_btn button').removeAttr('disabled').removeClass('am-btn-default').addClass('am-btn-success');
			}else{
				$('.reg_btn button').attr('disabled','disabled').addClass('am-btn-default').removeClass('am-btn-success');
			}
		});
		   
		// 绑定提交按钮
		$('.reg_btn button[type=button]').bind('click',function(){
			//alert('123');
			var tell = $(".reg_input input[type='tel']").val();
			var test = $(".reg_test input[type='text']").val();
			if(tell == ''){
				shade('am-icon-meh-o','请输入手机号');
				return false;
			}
			if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(tell))){
				shade('am-icon-meh-o','请输入正确的手机号码');
				return false;
			}

			if(test == ''){
				shade('am-icon-meh-o','请输入验证码');
				return false;
			}
		    if(test !== code.toString()){
				shade('am-icon-meh-o','验证码输入错误');
				return false;
			}
			else{
				$('.first').css('display','none');
			    $('.seconde').css('display','block');
				$(this).addClass('submit');
			    $(this).html('确认');
			    $('.reg_btn button[type=button]').unbind('click')
			}
			
		
		});
			var pass=$('.pass');
			var passcheck=$('.passcheck');
		 
            pass.focus(function(){ 
				  $('.reg_btn button').attr('type','submit'); 
				  console.log( $('.reg_btn button').prop('type'));
				 // alert($('.reg_btn button').prop('type'))
            });
           $('#regForm').bind('submit',function(){
           	if(pass.val()==''){
           		shade('am-icon-meh-o','请输入密码');
           		return false;
           	}
           	 if(pass.val()!==passcheck.val()){
				shade('am-icon-meh-o','密码输入不一致，请重输！！');
				 return false;
			}
           });
		// 表单验证
		/*$('.form_test.submit').bind('click',function(){
            var pass=$('.pass');
			var passcheck=$('.passcheck');
		  if(pass.val()==passcheck.val()){
			  $(this).prop('type','submit');
			  }	
		});*/
		// 提示框
		function shade(icon,cue){
				$('.shade').addClass('up');
				setTimeout(function(){$('.shade').removeClass('up');},1000);
				$('.shade div').remove();
				$('.shade').append('<div><span class="'+icon+'"></span><p>'+cue+'</p></div>');
		} 
	
		var wait = 60;
		function time(o) {  
        if (wait == 0) {  
            o.removeAttribute("disabled");            
            o.value="获取验证码";  
            wait = 60;  

        } else {  
        	
            o.setAttribute("disabled", true);  
            o.value="重新发送(" + wait + ")";  
            wait--;  
            setTimeout(function() {  
                time(o)  
            },
            1000)
        }
		}

</script>
</body>
</html>