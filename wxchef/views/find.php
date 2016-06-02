<body class="pab2">
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform bheader">
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/index')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
  发现
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
<!-- 推荐 -->
<div class="am-text-center am-text red promt">产品推荐</div>
<ul class="am-gallery am-avg-sm-3 am-avg-md-3 am-avg-lg-3 am-gallery-default pagallery" data-am-gallery="{ pureview: true }" >

<?php foreach($foods as $v):?>
  <li>
    <a href="<?php echo site_url('home/food?id=').$v['FoodId'].'&number=&shopid=';?>">
      <div class="am-gallery-item">
        <img src="<?=IP.$v['Thumbnail'];?>" alt="<?=$v['FoodName'];?>"/>
        <h3 class="am-gallery-title"><?=$v['FoodName'];?></h3>
      </div>
    </a>
  </li>
<?php endforeach;?>
  
</ul>
<!-- 促销 -->
<div class="am-g findSale">
 <div class="am-text-center am-text purred am-margin-sm">促销信息</div>
<!--  <p class="am-text-center am-shadow htit">促销信息</p> -->
<?PHP foreach($promotion as $val):?>
  <div class="am-u-sm-6 am-shadow">
     <div class="am-u-sm-5 am-list-thumb">
        <a href="<?php echo site_url('home/food?id=').$val['foodid'].'&number=&shopid=';?>">
          <img src="<?=IP.$val['thumbnail'];?>" alt="<?=$val['foodname'];?>"/>
        </a>
     </div>
    <div class=" am-u-sm-7 am-list-main">
     <a href="<?php echo site_url('home/food?id=').$val['foodid'].'&number=&shopid=';?>" class="gray">
      <div class="am-list-item-hd am-text-sm black"><?=$val['foodname'];?></div>
        <div class="prf am-text-sm">特价 <i class="am-icon-cny"></i><span class="price am-text-lg"><?=$val['tejia'];?></span> <span class="am-icon-cny oldPr"><?=$val['foodprice'];?></span></div>
     </a>
      <a href="<?php echo site_url('home/food?id=').$val['foodid'].'&number=&shopid=';?>" class="am-center nowBuy">立即购买</a>    
    </div>
  </div>
<?php endforeach;?>
  
</div>
<!-- 精品生活 -->
<div class="am-text-center am-text green am-margin-sm gsf">精品生活<a href="<?php echo site_url('home/life')?>" class="gray am-text-sm par">更多》</a></div>
<div class="am-g life"> 
<?php foreach($jinpin as $value):?>
  <figure> 
     <a href="<?php echo site_url('home/lifeInfo?id=').$value['boutiqueid'];?>">
       <img src="<?=IP.$value['backgoungimg'];?>">
       <figcaption> <?=$value['name'];?> <br><span class="am-text-sm"><?=$value['abstract'];?></span></figcaption>
     </a>  
  </figure>
<?php endforeach;?>

</div>
<!-- 评价 -->
<div class="am-text-center am-text purred am-margin-sm">七嘴八舌</div>

<?php foreach($qi as $value):?>
<div class="am-shadow imgShow">
    <header class="am-comment-hd">
      <!--<h3 class="am-comment-title">评论标题</h3>-->
      <div class="am-comment-meta">
        <a href="#link-to-user" class="am-comment-author"><img src="skin/img/user.jpg" class="am-circle comimg" alt=""><?php echo substr_replace($value['UserPhone'],'****',3,4);?></a>
        
        <span class="am-fr"><time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800"><?=$value['CreateTime'];?></time></span>
      </div>
    </header>
    <div class="am-comment-bd am-text-xs combo">
      <?=$value['Comment'];?>
    </div>
    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
    <?php foreach($value['Img'] as $v):?>
      <li>
        <div class="am-gallery-item">
            <a href="<?=IP.$v['PoorderImg'];?>" class="">
              <img src="<?=IP.$v['PoorderImg'];?>"/>
            </a>
        </div>
      </li>
    <?php endforeach;?>
  </ul>
</div>
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
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
</html>