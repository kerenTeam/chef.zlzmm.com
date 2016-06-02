<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="javascript:" onclick="javascript:history.go(-1);">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    收银台
    </h1>
  </header>
  <form action="" method="">
    <div class="am-list-news-bd">
      <ul class="am-list odl">
        <li class="am-g am-list-item-dated">
          <a href="javascript:" class="am-list-item-hd">订单金额</a>
          <span class="am-list-date"><i class="am-icon-cny atf">300</i></span>
        </li>
        
      </ul>
     </div>
     <div class="am-shadow fpa preduce">
      <p class="htit sad"><span class="am-icon-usd red"></span> 支付方式</p>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><!-- <img src="skin/img/ap.png" class="payimg" alt=""> --> <span class="am-icon-apple apple"></span>Apple Pay <span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a onclick="callpay()" href="javascript:;" class="am-cf adc"><img src="skin/img/wp.png" class="payimg" alt=""> 微信支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/zp.png" class="payimg" alt="">支付宝支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/op.png" class="payimg" alt="">线下支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
    </form>
  </body>
</html>