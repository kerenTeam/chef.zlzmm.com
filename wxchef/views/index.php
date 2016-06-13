<style type="text/css">
.per{padding: 20px; border-bottom: 1px dotted #d3d3d3;}
.title{font-weight:bold; color:#39f;}
.nodata{display:none; height:32px; line-height:32px; text-align:center; color:#999; font-size:14px;}
.nodata img{width:25px;}
h2.tip{margin:20px;font-size: 18px}
</style>
<body>
  
   <?php
// var_dump($_SESSION['phone']);
	if(!isset($_SESSION['phone'])){
     // if (empty($_GET["code"]))
      // {
       // header("Location: https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING']."&response_type=code&scope=snsapi_userinfo&state=1&connect_redirect=1#wechat_redirect");
      // }
      // $code = $_GET['code'];
      // 获取access_token 用户令牌
      // $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".APPID."&secret=".APPSECRET."&code=".$code."&grant_type=authorization_code";
      // $res =json_decode(file_get_contents($url));
      // $openId= $res->openid;
      // $_SESSION['openid'] = $openId;
      
      // $_SESSION['update_code'] = $res->access_token;
      // $_token = $res->access_token;
      // 获取用户数据
      // $url2='https://api.weixin.qq.com/sns/userinfo?access_token='.$_token.'&openid='.$openId.'&lang=zh_CN';
      // $_SESSION['userinfo'] = json_decode(file_get_contents($url2),TRUE);
      // $phone = file_get_contents(POSTAPI.'API_User?dis=login&UserPhone='.$openId);
      // $userphone = json_decode($phone);
      // if($userphone != '0'){
        // $_SESSION['phone'] = $userphone;
      // }
       $_SESSION['phone'] = $userphone;
	}
    
  ?> 

  <!-- 注册弹框 -->
  <?php if(!isset($_SESSION['phone']) && empty($_SESSION['userinfo']['openid'])):?>
  <div class="tk">
    <div class="tkcontent">
      <span><img class="closetk" src="skin/img/closetk.png" alt="大厨到家"></span>
      <img src="skin/img/tk.png" class="renote" alt="大厨到家">
      <div class="tktxt">
        <div class="am-text-sm">亲，你还没有注册哟！注册即可享优惠</div>
        <a class="rega" href="<?php echo site_url('home/register')?>">立即注册</a>
        <p class="am-text-xs">已注册，直接<a class="red" href="<?php echo site_url('home/login2')?>"> 登录</a></p>
      </div>
    </div>
  </div>
  <?php endif;?>
  <!-- 搜索 -->
  <div class="am-g searchFix">
    <span class="am-icon-search"></span>
    <input type="text" class="am-form-field" name='search' value="请输入食材或菜品">
    
  </div>
  <!-- banner -->
  <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
    <ul class="am-slides">
      <?php foreach($banners as $val):?>
      <li>
        <a href="<?=site_url('home/bannerinfo?id=').$val['id'].'&name='.$val['name'];?>"><img src="<?=IP.$val['img']?>" class="am-img-responsive card" alt="<?=$val['name']?>"></a>
        
      </li>
      <?php endforeach;?>
    </ul>
  </div>
  <!-- 菜品 -->
  <ul class="am-gallery am-avg-sm-2 am-avg-md-2 am-avg-lg-4 am-gallery-default am-shadow veg" data-am-gallery="{ pureview: true }" >
    <li>
      <a href="<?php echo site_url('home/cailan')?>">
        <div class="am-gallery-item bred">
          <img src="skin/img/menu.png" alt="大厨到家"/>
          <h3 class="am-gallery-title">点菜</h3>
        </div>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('home/cailan')?>#fe7ad9a9-1bec-4929-b160-85f9a784f527">
        <div class="am-gallery-item byellow">
          <img src="skin/img/fork.png" alt="大厨到家"/>
          <h3 class="am-gallery-title">套餐</h3>
        </div>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('home/party')?>">
        <div class="am-gallery-item bgreen">
          <img src="skin/img/food.png" alt="大厨到家"/>
          <h3 class="am-gallery-title">宴席</h3>
        </div>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('home/vegetable')?>">
        <div class="am-gallery-item bblue">
          <img src="skin/img/leaf.png" alt="大厨到家"/>
          <h3 class="am-gallery-title">净菜</h3>
        </div>
      </a>
    </li>
  </ul>
  <!-- 热销 -->
  <div class="am-g am-shadow hot">
    <p class="htit"><img src="skin/img/fire.png" alt=""> 特色服务</p>
    <div class="am-u-sm-3">
      <a href="<?php echo site_url('home/service')?>">
        <img class="am-circle" src="skin/img/vip.png"/>
        <p class="purple">服务</p>
      </a>
    </div>
    <div class="am-u-sm-3">
      <a href="<?php echo site_url('home/elegance')?>">
        <img class="am-circle" src="skin/img/yaz.png"/>
        <p class="purred">伴餐</p>
      </a>
    </div>
    <div class="am-u-sm-3">
      <a href="<?php echo site_url('home/ceremonyType')?>">
        <img class="am-circle" src="skin/img/cemo.png"/>
        <p class="meired">庆典</p>
      </a>
    </div>
    <div class="am-u-sm-3">
      <a href="<?php echo site_url('home/priceSearch')?>">
        <img class="am-circle" src="skin/img/cj.png"/>
        <p class="pink">菜价</p>
      </a>
    </div>
    
  </div>
  <div class="am-shadow am-margin-top-xs">
    <p class="htit"><span class="am-icon-eye yellow"></span> 实时菜价<a href="<?php echo site_url('home/priceSearch')?>" class="am-fr am-text-xs gray">更多 ></a></p>
    <div class="d1" id="div1" onmouseover="clearInterval(timer)" onmouseout="timer=setInterval(mar,30)">
      <span class="div2" id="div2">
  
        <?php if(!empty($caijia)):?>
        <?php foreach($caijia as $val):?>
        <a href="<?php echo site_url('home/price?id=').$val['vegetableid']."&name=".$val['name'];?>"><?=$val['name'];?> <?=$val['price'];?>元/<?=$val['unit'];?></a>
        <?php endforeach;?>
        <?php endif;?>
        </span><span id="div3" class="div2"></span>
      </div>
      <div>
      </div>
    </div>
    <div class="am-g am-margin-top-xs life">
      <p class="htit bwhite"><img src="skin/img/heart.png" alt=""> 精品生活</p>
    </div>
    <!-- 图文加载 -->
    <div class="container bwhite">
      <div class="am-g life">
        <div class="demo">
          <div id="lists">
          </div>
          <div class="nodata"></div>
        </div>
      </div>
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
    <script src="skin/js/jquery.min.js"></script>
    <script src="skin/js/amazeui.min.js"></script>
    <script type="text/javascript">
    var i = 1;
   $(function() {
    $('.closetk').bind('click',
    function() {
        $('.tk').css('display', 'none'); 
    })
    //搜索跳转
    $('.searchFix input').focus(function() {
        window.location.href = "<?php echo site_url('home/search')?>";
    });
 
    //加载
    var totalpage = 6; //总页数，防止超过总页数继续滚动
    var winH = $(window).height(); //页面可视区域高度
    $(window).scroll(function() {
        if (i < totalpage) { // 当滚动的页数小于总页数的时候，继续加载
            var pageH = $(document.body).height();
            var scrollT = $(window).scrollTop(); //滚动条top
            var aa = (pageH - winH - scrollT) / winH;
            if (aa < 0.01) {
                getJson(i); //加载第一页
   }
}
})
  });

            function getJson(page) {
                $(".nodata").show().html("<img src='http://www.sucaihuo.com/Public/images/loading.gif'/>");
                $.getJSON("<?=site_url('pricesearch/quality');?>", {page: i}, function(json) {
                  console.log(json);
                    if (json) {
                        var str = "";
                        $.each(json, function(index, array) {
                          
                            var str = "<figure> <a href='<?php echo site_url('home/lifeInfo?id=');?>";
                            var str = str + array['boutiqueid']+"'><img src='<?php echo IP;?>" + array['backgoungimg'] + "'><figcaption>" + array['name'] + "<br><span class='am-text-sm'>"+ array['abstract'] + "</span></figcaption></a></figure>";
                            $("#lists").append(str);
                        });
                       setTimeout(function(){ $(".nodata").hide();},50000);
                    } else {
                       showEmpty();
                    }
                });
                i++;
}
function showEmpty() {
    setTimeout(function() {
        $(".nodata").show().html("别滚动了，已经到底了。。。");
    },
    10000);
}
var s, s2, s3, timer;
function init() {
    s = getid("div1");
    s2 = getid("div2");
    s3 = getid("div3");
    s3.innerHTML = s2.innerHTML;
    timer = setInterval(mar, 30)
}
function mar() {
    if (s2.offsetWidth <= s.scrollLeft) {
        s.scrollLeft -= s2.offsetWidth;
    } else {
        s.scrollLeft++;
    }
}
function getid(id) {
    return document.getElementById(id);
}
window.onload = init;
      </script>
    </body>
  </html>