<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<body>
  <!-- header -->
  <header data-am-widget="header"class="am-header am-header-default topform bheader" style="position:fixed!important;top:0px !important; width: 100%;height: 49px;z-index: 9999"> 
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/index')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
  菜谱
  </h1>

</header>

<form action="<?=site_url('home/addcart');?>" method='post'  id='question' enctype="multipart/form-data">
  <!-- 菜品栏目 -->
  <div class="am-u-sm-3 cmn aml">
     <nav class="scrollspy-nav" data-am-scrollspy-nav="{offsetTop: -48}" data-am-sticky="{top:49}">
    <div class="pink typec"><img src="skin/img/type.png" alt="">&nbsp;分类</div>
    <ul class="am-list typel">
    <?php foreach($cates as $cate):?>
        <li><a href="javascript:;"><img src="<?php echo IP.$cate['imgaddress'];?>" alt=""> <?=$cate['name'];?></a></li>
      <?php endforeach;?>
    </ul>
    </nav>
  </div>
  <!-- 菜品选择 --> 
  <div data-am-widget="list_news" class="am-u-sm-9 asp cmn amr">
    <div class="cmn cmnb am-list-news am-list-news-default" >
      <div class="am-list-news-bd">
  
      <?php foreach($cates as $val):?>
        <div class="cptit typeName" id="<?=$val['foodcategoryid']?>"><span><?=$val['name'];?></span></div>
        <ul class="am-list">
        
        <?php foreach($foods as $v):?>
  
          <?php if($val['foodcategoryid'] == $v['foodpid']):?>
       
           
          <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
            <div class="am-u-sm-4 am-text-center am-list-thumb">
            <!-- <?php var_dump($v['code']); ?> -->
            <?php if($v['code'] == 1999):?>
              <a href="<?php echo site_url('home/partyInfo?id=').$v['foodid'];?>" class="vimg">
            <?php else:?>
              <a href="<?php echo site_url('home/food?id=').$v['foodid'];?>" class="vimg">
            <?php endif;?>
                <img src="skin/img/exp.gif" data-original="<?php echo IP.$v['thumbnail'];?>" class="lazy" alt="<?=$v['foodname'];?>"/>
              </a>
            </div>
            <div class=" am-u-sm-8 am-list-main am-padding-right-xs">
              <?php if($v['code'] == 1999):?>
                   <a href="<?php echo site_url('home/partyInfo?id=').$v['foodid'];?>" class="gray">
              <?php else:?>
                  <a href="<?php echo site_url('home/food?id=').$v['foodid'];?>" class="gray">
              <?php endif;?>
              <h3 class="am-list-item-hd black"><?=$v['foodname'];?></h3>

              <input type="hidden" name="foodid[]" value="<?=$v['foodid'];?>">
              <div class="am-list-item-text"><strong>特点：</strong><?=$v['foodtrait'];?>。</div>
              <div class="months">推荐指数：<?php for ($i=0; $i < $v['recommend']; $i++) { 
               echo "<i class='am-icon-star red'></i>";
              }?></i>月销<span>123</span>份</div>
             </a>
             <?php if($v['discountproportion']):?>
              <div class="pr">
                <span class="price am-icon-cny"><?php echo $v['foodprice']*$v['discountproportion'];?></span>
                <span class="am-text-xs gray"> /份</span>
  
                
              </div>
            <?php else:?>
               <div class="pr">
                <span class="price am-icon-cny"><?php echo $v['foodprice'];?></span>
                <span class="am-text-xs gray"> /份</span>
                </div>
            <?php endif;?>
              <div class="foodNum">
            
                <span class="reduce am-icon-minus-circle" onClick="handle(this, false),delcart();"></span>
                
                <input type="text" class="numTxt" name="numbers[]" onkeydown="keydown(this)" onkeypress="return IsNum(event)" oninput="ueserWrite(this)" value="<?php if(isset($v['number'])){echo $v['number'];}else{echo '0';}?>">
                
                <span class="add am-icon-plus-circle"  onClick="handle(this, true)"></span><!--  onClick="handle(this, true)" -->
              </div>
            </div>
          </li>
              <?php if($v['code'] == 1999){$a = 1;}else{$a = 0;}?>
              <input type="hidden" name='code[]' value="<?=$a;?>">
           <?php endif;?>
        <?php endforeach;?>
        </ul>
      <?php endforeach;?>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="">
     
      <div class="am-u-sm-8 a">
        <span class="green am-posR"><img src="skin/img/cart.png" id="car" alt=""><span id="fen" class="allmoney cartA">0</span></span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
      </div>
      <div class="am-u-sm-4 b">
        
        <button type='submit'  class="am-btn am-btn-success">去结算</button>
        
      </div>
  </div>
</form>


<script src="skin/js/num_cailan.js"></script>
<script src="skin/js/jqueryLazyload.js"></script>

</body>
</html>