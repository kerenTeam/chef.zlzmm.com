

<body class="am-with-fixed-navbar"> 

  <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
           <a href="<?php echo site_url('home/index');?>">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title">
          庆典
      </h1>
 
  </header>
  <!-- 庆典主题 -->
   <?php foreach($cere as $v):?>
  <figure class="CmType am-shadow"> 
     <a href="<?php echo site_url('home/Ceremony?id=').$v['id'];?>">
       <img src="<?=IP.$v['logo'];?>">
       <figcaption><?=$v['name'];?><span class="red am-icon-cny fr"><?=$v['price']?></span></figcaption>
     </a>  
  </figure>
<?php endforeach;?>

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
      <a href="<?php echo site_url('home/ucent')?>">
        <span class=""><img src="skin/img/gr1.png" alt=""></span>
        <span class="am-navbar-label">我的</span>
      </a>
    </li>
  </ul>
</div>
</body> 
</html>
