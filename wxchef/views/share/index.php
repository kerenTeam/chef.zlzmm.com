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

<!-- https 适应IOS9 -->
<script src="https://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
///
///    微信分享api接口
///
wx.config({
      debug: false,  
      appId: '<?php echo APPID; ?>',
      timestamp: '<?php echo $signPackage["timestamp"];?>',
      nonceStr: '<?php echo $signPackage["nonceStr"];?>',
      signature: '<?php echo $signPackage["signature"];?>',
      jsApiList: [
        'onMenuShareTimeline',
        'onMenuShareAppMessage',
        'onMenuShareQQ',
        'onMenuShareWeibo',
        'onMenuShareQZone'
      ]
  });
///
///    自定义分享数据  标题随机
///
    // var titlekf=['互联网之子1','互联网之子2','互联网之子3','互联网之子4','互联网之子5','互联网之子6','互联网之子7','互联网之子8'];
    // var title = titlekf[Math.floor(Math.random()*titlekf.length)];
    // var title = '<?php echo $_SESSION['userinfo']['nickname']; ?> -- Biji Coffee Company';
    // var desc = 'Biji Company is looking for the best coffee in Indonesia, that is why the website of the Biji Coffee Company introduce the image of public and traveling company.';
    // var link = 'http://www.csswinner.com/details/biji-coffee-company/10426';
    // var imgUrl = '<?php echo $_SESSION['userinfo']['headimgurl']; ?>';

    var title = '人生没有如果，时间不会重来';
    var desc = '行走在如风过耳的红尘，乍看盛夏的漠然置之，心中皱起了无言的涟漪，在隐隐约约的影子里，我看到伊人哭泣的面容';
    var link = 'http://img.jj59.com/upload/userup/109827/143G954c-P33.jpg';
    var imgUrl = 'http://www.baidu.com/';

</script>
<!-- 分享响应 API -->
<script src="<?php echo base_url('wxchef/views/share/js/demo.js');?>"> </script>



<body class="am-shadow">
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
         <a href="<?php echo site_url('home/orderRe');?>">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <h1 class="am-header-title">
      分享
      </h1>
    </header> 
    <div class="shareto"><img src="skin/img/shareto.png" alt=""></div>
    <!-- content -->
    <div class="shareimg"><img src="skin/img/share.gif" alt=""></div>
    <div class="am-padding-sm am-text-sm">
      <p class="sline">
        感谢亲！当前积分累计<span class="red">300</span>分。<br>
        每分享一次可以<span class="red">增加30积分 </span>  <span class="am-icon-smile-o"></span>
      </p>
      <a href="javascript:;" class="share" id="share">分享</a>
    </div>
    <!-- footer -->
 <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
      <ul class="am-navbar-nav am-cf am-avg-sm-5 am-shadow">
        <li >
          <a href="<?php echo site_url('home/index')?>" class="active">
            <span class=""><img src="skin/img/home2.png" alt=""></span>
            <span class="am-navbar-label">首页</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/cart')?>">
            <span class=""><img src="skin/img/clz.png" alt=""></span>
            <span class="am-navbar-label">菜篮子</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/find')?>">
            <span class="find">发现</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/customServ')?>">
            <span class=""><img src="skin/img/kf.png" alt=""></span>
            <span class="am-navbar-label">客服</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/ucent')?>">
            <span class=""><img src="skin/img/gr1.png" alt=""></span>
            <span class="am-navbar-label">我的</span>
          </a>
        </li>
      </ul>
    </div>

   <form action="<?php echo site_url('home/sharetosql'); ?>"  id="sharetosql" method="POST" accept-charset="utf-8">
   <?php if (!empty($_SESSION['phone'])): ?>
     <input type="hidden" name="UserPhone" value="<?php echo $_SESSION['phone']; ?>">
   <?php else: ?>
     <input type="hidden" name="UserPhone" value="<?php echo $_SESSION['userinfo']['openid']; ?>">
   <?php endif ?>
   </form>

</body>
<script src="skin/js/jquery.min.js"></script>
<script>
  $(function(){
    $('#share').click(function(){
      $('.shareto').fadeIn(400);
      $('body').css('overflow-y','hidden');
    });
     $('.shareto').click(function(){
      $('.shareto').fadeOut(400);
      $('body').css('overflow-y','auto');
     })
  })
 
</script>
</html>

