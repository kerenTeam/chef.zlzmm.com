<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?=site_url('home/index');?>" >
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    支付订单
    </h1>
    <div class="am-header-right am-header-nav">
      <a href="<?php echo site_url('home/index')?>" class="">
        首页
      </a>
    </div>
  </header>
  <!-- 付款成功提示 -->
  <div class="suc">
    <p><a href='<?=site_url("home/index");?>' ><img src="skin/img/ok.png" alt=""> 支付成功</a></p>
  <!--   <p>支付方式：支付宝</p>
    <p>支付金额：<span class="am-icon-cny">288</span></p> -->
    <a href="<?php echo site_url('home/cailan')?>" class="red"><span class="am-icon-reply"></span>继续点菜</a>
  </div>
  
</body>
</html>