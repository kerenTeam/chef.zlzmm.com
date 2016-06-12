
  <body>
  <?php if(!empty($users)):?>
   <div class="userhead bred">
   <?php if(isset($_SESSION['userinfo'])): ?>
       <?php if ($_SESSION['userinfo']): ?>
         <img class="am-circle" src="<?php echo $_SESSION['userinfo']['headimgurl']; ?>"/>
         <h3 class="am-header-title am-margin-sm"><?=$_SESSION['userinfo']['nickname'];?></h3>
         <h4 style="font-weight: 400;"> 当前积分:<?php echo abs($users[0]['integral']); ?> </h4>
          <?php if (empty($users[0]['userphone'])): ?>
            <a href="<?php echo site_url('home/binding')?>" >绑定手机号</a>
          <?php else: ?>
            
          <?php endif ?>
       <?php else: ?>
         <img class="am-circle" src="<?php echo IP.$users[0]['userimage'];?>"/>
         <h3 class="am-header-title am-margin-sm"><?=$users[0]['userphone'];?></h3>
       <?php endif;?>
    <?php endif; ?>
     <!-- <p class="am-margin-xs">&nbsp;&nbsp;&nbsp;川菜</p> -->
   </div>

  <?php else:?>
    <?php if(isset($_SESSION['userinfo'])): ?>
     <?php if ($_SESSION['userinfo']): ?>
      <div class="userhead bred">
       <img class="am-circle" src="<?php echo $_SESSION['userinfo']['headimgurl']; ?>"/>
       <h3 class="am-header-title am-margin-sm"><?=$_SESSION['userinfo']['nickname'];?></h3> 
       
          <a href="<?php echo site_url('home/binding')?>" >绑定手机号</a>

       

       </div>
     <?php else: ?>
    <div class="userhead bred">
       <img class="am-circle" src="skin/img/vip.png"/>
       <div class="am-header-title am-margin-sm"><a href="<?php echo site_url('home/login2')?>" class="white">登录</a> / <a href="<?php echo site_url('home/register')?>" class="white">注册</a></div>
       <!-- <p class="am-margin-xs">重口味 &nbsp;&nbsp;&nbsp;川菜</p> -->
     </div>
   <?php endif;?>
   <?php endif;?>
  <?php endif;?>

     <div class="am-list-news-bd asp">
  <ul class="am-list userl">
  <?php if(isset($_SESSION['phone'])):?>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/vip?name=').$users[0]['name'].'&balance='.$users[0]['balance'];?>" class="am-list-item-hd "><img src="skin/img/bc.png" alt=""> 会员卡</a>  
      </li>
    <?php else:?>
       <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/vip');?>" class="am-list-item-hd "><img src="skin/img/bc.png" alt=""> 会员卡</a>  
        </li>
    <?php endif;?>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/cart')?>" class="am-list-item-hd "><img src="skin/img/cl.png" alt=""> 购物车</a> 
      </li>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/orderRe')?>" class="am-list-item-hd "><img src="skin/img/d.png" alt=""> 订单管理</a> 
      </li>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/address2')?>" class="am-list-item-hd "><img src="skin/img/addr.png" alt=""> 地址管理</a> 
      </li>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/card')?>" class="am-list-item-hd "><img src="skin/img/qu.png" alt=""> 我的饭票</a> 
      </li>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/set')?>" class="am-list-item-hd "><img src="skin/img/set.png" alt=""> 个人设置</a> 
      </li>
      <?php if(isset($_SESSION['phone'])):?>
      <li class="am-g am-list-item-dated">
          <a href="<?php echo site_url('home/safe?id=').$users[0]['userid'].'&pwd='.$users[0]['userpwd'];?>" class="am-list-item-hd "><span class="am-icon-lock lock"></span> 账号安全</a> 
      </li>
	  <?php endif;?>
  </ul>
    <ul class="am-list userl">
    <?php if(isset($_SESSION['phone'])):?>
      <li class="am-g am-list-item-dated">
          <a href="<?=site_url('home/zhuxiao');?>" class="am-list-item-hd "><img src="skin/img/signout.png" alt="">注销</a> 
      </li> 

    <?php endif;?>
  </ul>
  </div>
  <!-- 注销弹框 -->
     <div class="am-modal am-modal-confirm" tabindex="-1" id="my-alert">
        <div class="am-modal-dialog">
          <div class="am-modal-bd">
            你，确定要注销吗？
          </div>
          <div class="am-modal-footer">
            <span class="am-modal-btn" data-am-modal-cancel>取消</span>
            <span class="am-modal-btn" data-am-modal-confirm>确定</span>
          </div>
        </div>
      </div>
<!-- footer -->
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
  <ul class="am-navbar-nav am-cf am-avg-sm-5 am-shadow">
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
      <a href="<?php echo site_url('home/ucent')?>" class="active">
        <span class=""><img src="skin/img/gr2.png" alt=""></span>
        <span class="am-navbar-label">我的</span>
      </a>
    </li>
  </ul>
</div> 
  </body>
  <script src="skin/js/jquery.min.js"></script>
  <script src="skin/js/amazeui.min.js"></script>
</html>