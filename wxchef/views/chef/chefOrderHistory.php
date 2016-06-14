<link rel="stylesheet" type="text/css" href="skin/css/order.css">
<body>
  <style>ul,.am-list{margin-bottom:-0.8rem!important;} a:link,a:hover,a:active,a:visited{color:inherit;}</style>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('chef/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    订单历史
    </h1>
  </header>
  <div class="manage am-margin-bottom-sm">
  <?php if(!empty($chefOrder)):?>
    <?php foreach($chefOrder as $val):?>
    <div class="manageOrder am-padding-sm am-shadow am-margin-bottom-lg">
      <a href="<?php echo site_url('chef/chefOrder?id=').$val['poorderid'];?>">
        <p class="am-cf manageBor botbor">
          <span class="am-fl am-text-sm">订单号:<?=$val['billno'];?></span>
          <span class="am-fr am-text-sm">下单时间:<?=$val['billdate'];?></span>
        </p>
        <p>付款金额<span class="am-icon-cny am-text-lg am-fr red"><?=$val['amount'];?></span></p>
        <p>用户姓名<span class="am-fr"><?=$val['name'];?></span></p>
        <p>电话号码<span class="am-fr">12344567</span></p>
        <p>服务地址<span class="am-fr"><?=$val['address']?></span></p>
        <p>服务时间<span class="am-fr"><?=$val['appointmenttime']?></span></p>
      </a>
    </div>
    <?php endforeach;?>
  <?php else:?>
    <div>你还没有完成的订单！</div>
  <?php endif;?>
   
    </div>
  </body>
</html>