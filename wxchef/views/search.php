<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    搜索
    </h1>
 
  </header>
  <form action="<?=site_url('home/search');?>" method="post"  class="topform">
  
    <div class="am-g">
      <button type="submit" class="am-icon-search sb"></button>
      <input type="text" class="am-form-field" name='search' placeholder="黄焖鸡">
   
    </div>
  </form>

  <!-- 搜索显示 -->
  <div class="cmn cmnb am-list-news am-list-news-default" >
    <div class="am-list-news-bd">

      <ul class="am-list">
<?php if(!empty($search)):?>
  <div class="am-text-sm am-margin">搜索记录：</div>
  <?php foreach($search as $val):?>

        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
         <a href="<?php echo site_url('home/food?id=').$val['foodid'].'&number=&shopid='?>" class="black">
          <div class="am-u-sm-4 am-text-center am-list-thumb"> <div class="vimg"> <img src="<?php echo IP.$val['thumbnail'];?>" alt="<?=$val['foodname'];?>"/> </div> </div>
          <div class=" am-u-sm-8 am-list-main">
            <h3 class="am-list-item-hd"><?=$val['foodname'];?></h3>
            <div class="am-text-sm">主料：<?=$val["ingredients"]?></div>
            <div class="am-text-sm">辅料：<?=$val['accessories']?></div>
            <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$val['foodprice'];?></span></div>
         </a>
        </li>
        <?php endforeach;?> 
      <?php else:?>
       <div class="am-text-center">无记录</div>
<?php endif;?>
       
       
      </ul>
    </div>
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
          <a href="<?php echo site_url('home/search')?>" class="active">
            <span class=""><img src="skin/img/ss2.png" alt=""></span>
            <span class="am-navbar-label">搜索</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('home/ucent')?>">
            <span class=""><img src="skin/img/gr.png" alt=""></span>
            <span class="am-navbar-label">我的</span>
          </a>
        </li>
      </ul>
    </div> 
  </body>
  <script src="skin/js/jquery.min.js"></script>
  <script>
    $(function(){
      $('input[name=search]').focus();
      $('.am-close').on('click',function(){
        $(this).parent('li').remove();
      })

    })
  </script>
</html>