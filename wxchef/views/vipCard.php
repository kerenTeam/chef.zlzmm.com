<body class="am-padding-bottom-lg">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    会员卡
    </h1>
    
  </header>
    <div class="flexv">
    <?php foreach($vip as $val):?>
      <div class="fitem">
         <img src="<?=IP.$val['img']?>" alt="<?=$val['name']?>">
         <?php if($users[0]['balance'] == ''):?>
         <a href="<?=site_url('orderWXPay/payCardPage?Money=').$val['money'];?>" class="open">开通</a>
         <?php else:?>
            <a href="<?=site_url('orderWXPay/payCardPage?Money=').$val['money'];?>" class="open">充值</a>
        <?php endif;?>
      </div>
    <?php endforeach;?>
     
    </div>
     <!-- footer -->
    <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
      <ul class="am-navbar-nav am-cf am-avg-sm-4 am-shadow">
        <li >
          <a href="<?php echo site_url('home/index')?>">
            <span class=""><img src="skin/img/home1.png" alt=""></span>
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
          <a href="<?php echo site_url('home/search')?>">
            <span class=""><img src="skin/img/ss.png" alt=""></span>
            <span class="am-navbar-label">搜索</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/ucent')?>" class="active">
            <span class=""><img src="skin/img/gr2.png" alt=""></span>
            <span class="am-navbar-label">我的</span>
          </a>
        </li>
      </ul>
    </div> 
</body>
</html>