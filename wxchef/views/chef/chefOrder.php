<body class="am-padding-bottom-lg">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('chef/index')?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    订单详情
    </h1>
    
  </header>

  <!-- 详情 -->

  <div class="am-shadow am-padding am-cf am-text-sm">
     <img src="skin/img/addr.png" style="width:auto" class="am-fl" alt="">
     <div class="am-fr moa">
       服务人：<?=$poorder['Name']?>&nbsp;&nbsp;&nbsp;&nbsp;<a href="tel:15708434450" class="black"><?=$poorder['GoodsPhone'];?></a><br> 
       地  址：<?=$poorder['Address'];?>
     </div>
  </div>
<!--       <hr data-am-widget="divider" class="am-divider am-divider-dashed" />
 -->
    <div class="foodinfo am-padding">
 
      <p class="am-text-center red">菜品查看</p>

      <p class="am-text-center am-text-sm  menuname2 red">所有菜品</p>
      <?php foreach($poorder['Fooddetail'] as $v):?>
        <p class="am-text-center am-text-sm"><?=$v['FoodName']?><span class="red"> x<?=$v['FoodNumber'];?></span></p>
      <?php endforeach;?>

 
    </div>  
         <div class="am-padding-sm am-cf mob">
            <span class="am-fl red" style="line-height: 26px;">合计：<?=$poorder['Amount']?>元</span>
            <a href='<?=site_url('chef/index');?>' class="am-fr am-btn am-btn-primary bgreen am-btn-xs checkOrder"> 确定</a>
         </div> 

</body>
</html>