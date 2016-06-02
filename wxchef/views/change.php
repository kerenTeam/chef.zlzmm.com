<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>

<body>
<!-- header -->
<header data-am-widget="header" class="am-header am-header-default topform">
  <div class="am-header-left am-header-nav">  <a href="<?php echo site_url('home/cart');?>"> <i class="am-header-icon am-icon-chevron-left"></i> </a> </div>
  <h1 class="am-header-title"> 换一换 </h1>
</header>
  <div class="cmn cmnb am-list-news am-list-news-default" >
    <div class="am-list-news-bd">
      <ul class="am-list">
      <?php if(!empty($foods)):?>
	  <?php foreach($foods as $food):?>
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
         <a href="<?=site_url('home/changup?foodid=').$food['changefoodid'].'&shopid='.$shopid.'&id='.$id;?>" class="black">
          <div class="am-u-sm-3 am-text-center am-list-thumb">
            <div class="vimg"> <img src="<?php echo IP.$food['thumbnail'];?>" alt="<?=$food['foodname'];?>"/> </div>
          </div>
          <div class=" am-u-sm-9 am-list-main">
            <h3 class="am-list-item-hd"><?=$food['foodname'];?></h3>
            <div class="am-list-item-text"><strong>特点：</strong><?=$food['foodtrait'];?></div>
            <div class="months"><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i>月销<span class="">213></span>份</div>
            <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$food['foodprice'];?></span></div>
          </div>
            </a>
        </li>
		<?php endforeach;?>
		<?php else:?>
		<li>该菜品暂时没有可换菜品！</li>
      <?php endif;?>
      </ul>
    </div>
  </div>
</body>
</html>