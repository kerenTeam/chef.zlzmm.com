
  <body>

    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
          <a href="<?php echo site_url('home/ucent');?>">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title">
          会员卡
      </h1> 
  </header> 
 
  <?php if ($name && $balance): ?>
      <div class="am-g am-shadow am-cf">
           <!-- <span class="acm am-fl"> 账户 <span class="green"> 15708434450 </span></span> -->
          <span class="acm am-fl"> <?=$name;?> </span>
          <span class="acm am-fr">余额<span class="pink acm"> <?=$balance;?> </span></span>
      </div> 
      <br>
      <a href="<?=site_url('home/vipCard');?>" class="am-u-sm-12 am-btn bgreen go">去充值</a> 
  <?php else: ?>
            <br><br><br>
            <br><br><br>
            <center><a href="<?php echo site_url('home/vipCard'); ?>"> 您还没有办理会员卡，点击办理 </a></center>
            <br><br><br>
            <a href="<?=site_url('home/vipCard');?>" class="am-u-sm-12 am-btn bgreen go">去办理</a> 
  <?php endif ?>    
  
   
 
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