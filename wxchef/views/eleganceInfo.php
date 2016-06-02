

<body> 

  <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
           <a href="<?php echo site_url('home/elegance');?>">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title">
          伴餐
      </h1>
 
  </header>
  <!-- banner -->
<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
  <ul class="am-slides">

  <?php foreach($banner as $val):?>
    <li>
      <a href="<?=site_url('home/bannerinfo?id=').$val['id'].'&name='.$val['name'];?>"><img src="<?=IP.$val['img']?>" class="am-img-responsive card" alt="<?=$val['name']?>"></a>
    </li>
  <?php endforeach;?>
  </ul>
</div>
  <!-- content -->
  <!-- <form action="" method=""> -->
    <div class="artImg"></div>
    <div class="am-margin"> — 擅长曲目</div>
    <div class="am-text-center">
    <?php foreach($cont as $v):?>
      <div class="am-margin-sm"><?=$v?></div>
    <?php endforeach;?>
     
    </div>
    <div class="am-margin"> — 价格</div>
    <div class="am-text-center">
      <div class="am-margin-sm am-text-md red"><span class="am-icon-cny"> <?=$money;?>/次</span></div>
    </div>
    
    <button type="button" id="sub" class="am-center am-btn am-text-sm am-margin-top am-btn-warning bbi">加入购物车</button>
    <a href="<?php echo site_url('home/cailan');?>" class="am-text-center am-block gray am-text-sm am-margin-top-sm"><span class="am-icon-angle-left"></span> 返回点菜</a>
<!--   </form> -->
  <!-- 加入成功提示  -->
   <div class="cart-success">

     <div class="cart-ok white"><span class="am-icon-check am-block green"></span>成功加入购物车</div>
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
      <a href="<?php echo site_url('home/ucent')?>">
        <span class=""><img src="skin/img/gr1.png" alt=""></span>
        <span class="am-navbar-label">我的</span>
      </a>
    </li>
  </ul>
</div>
</body>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script>
  $(function(){
    $('#sub').click(function() {
      // console.log(12);

      var title = "<?=$title?>";
      var money = "<?=$money?>";
      var id = "<?=$id?>";
      console.log(title);
      $.ajax({
        type: 'POST',
        url: '<?=site_url("home/eleganceadd")?>',
        data: "title="+title+"&money="+money+'&id='+id,
        success: function(data){
          console.log(data); 
            $('.cart-success').addClass('over');
      $('.cart-ok').css('marginTop','-4rem');
     setTimeout(function(){$('.cart-success').removeClass('cart-over');},1000);
        }
        
      });

   


 
    });
  })
</script>
</html>
