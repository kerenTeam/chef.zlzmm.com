<body class="am-shadow">
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
        <a href="javascript:" onclick="<?php echo site_url('home/orderRe')?>">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <h1 class="am-header-title">
      分享
      </h1>
    </header> 
    <div class="shareto"><span class="am-icon-share"></span><!-- <img src="skin/img/shareto.jpg" alt=""> --></div>
    <!-- content -->
    <div class="shareimg"><img src="skin/img/article/it1.png" alt=""></div>
    <div class="am-padding-sm am-text-sm">
      <p class="sline">
        感谢亲！当前积分累计<span class="red">300</span>分。<br>
        每分享一次可以<span class="red">增加30积分</span>
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
</body>
<script src="skin/js/jquery.min.js"></script>
<script>
  $(function(){
    $('#share').click(function(){
      $('.shareto').fadeIn(400);
    });
     $('.shareto').click(function(){
      $('.shareto').fadeOut(400);
     })
  })
 
</script>
</html>