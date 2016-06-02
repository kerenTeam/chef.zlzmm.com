<?php 

	    $jsapiTicket = json_decode(file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$_SESSION['update_code']."&type=jsapi"),TRUE);
	 if (isset($jsapiTicket['errcode'])) {
	 	$this->indexwxapi->wxAccessToken(APPID,APPSECRET);
	 	$jsapiTicket = json_decode(file_get_contents("https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=".$_SESSION['update_code']."&type=jsapi"),TRUE);
	 }
	 $_SESSION['jsapi_ticket'] = $jsapiTicket['ticket'];
	 
       $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
       $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$timestamp = time();
				
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$str = "";
				for ($i = 0; $i < 16; $i++) {
					$str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
				}
				$nonceStr = $str;
		
				// 这里参数的顺序要按照 key 值 ASCII 码升序排序
				$string = "jsapi_ticket=".$_SESSION['jsapi_ticket']."&noncestr=$nonceStr&timestamp=$timestamp&url=$url";
		
				$signature = sha1($string);
		
				$signPackage = array("appId" => APPID, "nonceStr" => $nonceStr, "timestamp" => $timestamp, "url" => $url, "signature" => $signature, "rawString" => $string);

?>


                  
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"> </script> 
<script>
 
  wx.config({
	debug:true,
    appId: '<?php echo $signPackage["appId"];?>',
    timestamp: <?php echo $signPackage["timestamp"];?>,
    nonceStr: '<?php echo $signPackage["nonceStr"];?>',
    signature: '<?php echo $signPackage["signature"];?>',
    jsApiList: [
        'checkJsApi',
        'onMenuShareTimeline',
        'onMenuShareAppMessage'
    ]
  });

  wx.ready(function () {

		// var kf=['<?php echo $userinfo['nickname']; ?>的时间兑换一麻袋的吴亦凡',
		//         '<?php echo $userinfo['nickname']; ?>的时间价值等于五毛特效',
		//         '<?php echo $userinfo['nickname']; ?>是朋友圈第一个把时间变成钱的人',
		//         '<?php echo $userinfo['nickname']; ?>太变态用时间兑换了一年的社保',
		//         'OMG!<?php echo $userinfo['nickname']; ?>终于有了自己的一套房！',
		//         '嘘～<?php echo $userinfo['nickname']; ?>刚在朋友圈开了一瓶进口红酒',
		//         '<?php echo $userinfo['nickname']; ?>在家等你来吃火锅哦～',
		//         '谁说没毕业就不能买社保?','要美丽！就别去村口王师傅那里烫头',
		//         '<?php echo $userinfo['nickname']; ?>生是农村人，就是吃不惯防腐剂'];
		// var act = kf[Math.floor(Math.random()*kf.length)];  
		
  wx.checkJsApi({
	  jsApiList: ['checkJsApi','onMenuShareAppMessage','onMenuShareTimeline'], // 需要检测的JS接口列表，所有JS接口列表见附录2,
	  success: function(res) { alert(res); }
		       });
  wx.onMenuShareTimeline({
      title:'要美丽！就别去村口王师傅那里烫头',
      link: 'http://weixin.bestingmedia.com/alg/',
      imgUrl: 'http://weixin.bestingmedia.com/alg/best.png',
      desc:" 去途悦，把时间变成看得见的软妹币!",
      trigger: function (res) {
      },
      success: function (res) {
       $("#yindao").css("display","none");
       $("#linghb").css("display","block");
       alert("恭喜您分享成功！");

      },
      cancel: function (res) {
       $("#yindao").css("display","none");

      },
      fail: function (res) {
       alert(JSON.stringify(res));
      }
    });wx.onMenuShareAppMessage({
      title: '要美丽！就别去村口王师傅那里烫头',
      link: 'http://weixin.bestingmedia.com/alg/',
      imgUrl: 'http://weixin.bestingmedia.com/alg/best.png',
      desc:" 去途悦，把时间变成看得见的软妹币 ",
      trigger: function (res) {
   
      },
      success: function (res) {
        $("#yindao").css("display","none");
        $("#linghb").css("display","block");
        alert("恭喜您分享成功！");

      },
      cancel: function (res) {
        $("#yindao").css("display","none");
     
      },
      fail: function (res) {
       alert(JSON.stringify(res));
      }
    });
  document.querySelector('#getshare').onclick = function () {
    
     $("#yindao").css("display","block");
  };

  })
  


  </script>


  
  		<!-- Bootstrap CSS -->
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  
  		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  		<!--[if lt IE 9]>
  			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
  			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  		<![endif]-->
  	</head>
  	<body>


<script type="text/javascript">
	

function share()
    {
		document.getElementById('sharep').style.display = 'block';
		document.getElementById('sharep').onclick = function(){
			this.style.display = 'none';
		};
	}


</script>


<style type="text/css" media="screen">
	#sharep{
		display:none;
	}
</style>


		<div id="getshare" style="background: #895913; width:200px; height:200px;";>
		</div>

		<div id="yindao" style="background: #66FFFF; width:200px; height:200px;">
			
		</div>


			        <br><br><br><br><br><br><br>
			        <center><button type="button" onclick="share()" style="color: #000; background: #F7EE13;" class="btn btn-default">一键分享 + 300积分 </button></center>

        <br><br>
  		<center><img style="width:50%;" src="https://dl4rygnmrir77.cloudfront.net/muzli_feed/wp-content/uploads/2016/04/19213824/daniel-warnecke-3d-printed-portraits-of-classical-paintings-designboom-01.jpg" id="sharep">
  		</center>

  		

       

  	</body>
  </html>
  
