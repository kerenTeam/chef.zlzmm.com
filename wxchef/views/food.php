<body class="bpa">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/cailan');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">

    <?php echo $foods['foodname'];?>
    </h1>
   
  </header>
  <!-- 详情 -->
<script>
// 增加菜品数量
  function addcart(){
      var id = "<?=$foods['foodid'];?>";
      var number = $('.numTxt').val();
      var code = $('input[name=code]').val();
      var shopid = "<?=$shopid?>";
      // alert(number);
       $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/foodaddcart'); ?>',
            data: 'foodid='+id+'&numbers='+number+'&code='+code+'&shopid='+shopid,
            success: function(data) {
               // console.log(data);
            }
        });
         
  }
  // 减少菜品数量
 function delcart(){
        var id = "<?=$foods['foodid'];?>";
        var number = $('.numTxt').val();
        var code = $('input[name=code]').val();
        var shopid = "<?=$shopid?>";
      
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/foodaddcart'); ?>',
            data: 'foodid='+id+'&numbers='+number+'&code='+code+'&shopid='+shopid,
            success: function(data) {
               // console.log(data);
            }
        });
  }


</script>
  <form action="<?=site_url('home/foodaddcart');?>" method="post" enctype="mutiltype/data">
    <div class="foodinfo am-shadow">
 
     <!--  <img src="<?php echo IP.$foodspic['imgaddress'];?>" class="am-img-responsive card" alt="<?=$foods['foodname'];?>"> -->
<style>ol{display:none;}</style>
      <!-- banner -->
        <div data-am-widget="slider" class="am-slider am-slider-default fimg" data-am-slider='{}' >
          <ul class="am-slides">
             <?php foreach($foodspic as $val):?>
            <li>
             <img src="<?=IP.$val['imgaddress'];?>" class="am-img-responsive card" alt="<?=$foods['foodname'];?>">
            </li>
          <?php endforeach;?>
          
          </ul>
        </div>

 
      <div class="am-g">
        <h2> <?=$foods['foodname'];?></h2>
        <div class="months"><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i>月销<span class=""> 12</span>份</div>
        <p class="am-text-sm"><strong>主料：</strong><?=$foods['ingredients'];?></p>
        <p class="am-text-sm"><strong>辅料：</strong><?=$foods['accessories'];?></p>
        <p class="am-text-sm"><strong>简介：</strong><?=$foods['blurb'];?></p>
        
        <div class="pr"><i class="am-icon-cny"></i><span class="price"><?php if($foods['discountproportion']){echo $foods['foodprice']*$foods['discountproportion'];}else{echo $foods['foodprice'];}?></span></div>

          <input type="hidden" name='code' value="<?php if ($foods['foodkind'] == 1){if($foods['code'] == 1999){echo "1";}else{echo "0";}}elseif($foods['foodkind'] == 2){echo "2";}?>">
       <div class="foodNum">
          <span class="reduce am-icon-minus-circle" onClick="handle(this, false),addcart()"></span>
          <input type="text" class="numTxt" name="numbers"  onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="<?php if($number){echo $number;}else{echo "0";}?>">
          <input type="hidden" value="<?=$foods['foodid'];?> " name='foodid'/> 
          <input type="hidden" value="<?=$shopid;?>" name='shopid'/>
          <span class="add am-icon-plus-circle" onClick="handle(this, true),delcart()"></span>
        </div>
        
      </div>
    </div>
    <!-- 评价 -->
    <div class="am-shadow">
      <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
        <h2 class="am-titlebar-title ">
        消费评价
        </h2>
      </div>
      <div class="am-u-sm-5 am-text-center">
        <span class="red am-text-xxl"><?php $zong=$foods['foodstar'] + $fen['cookscore'] + $fen['consumptionscore']; $pin = $zong/3*2;echo round($pin);?></span>分<br>
        <span class="am-text-xs red"><i class="am-icon-star "></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i></span><br>
        <span class="am-text-xs"> 共<?php echo count($evaluate);?>人评价</span>
        
      </div>
      <div class="am-u-sm-7 stars">
        <p class="am-text-xs"><span class="am-text-right">菜品</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> <?=round($foods['foodstar']);?></p>
        <p class="am-text-xs"><span class="am-text-right">厨师</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> <?=round($fen['cookscore']);?></p>
        <p class="am-text-xs"><span class="am-text-right">服务分</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> <?=round($fen['consumptionscore']);?></p>
      </div>
      <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
      <!-- 文字评论 -->
      <?php if(!empty($evaluate)):?>
        <?php foreach($evaluate as $v):?>
      <div class="am-shadow">
        <header class="am-comment-hd">
          <!--<h3 class="am-comment-title">评论标题</h3>-->
          <div class="am-comment-meta">
            <a href="javascript:;" class="am-comment-author"><img src="<?=IP.$v['userimage'];?>" class="am-circle comimg" alt=""><?php if($v['username'] == ''){echo $v['userphone'];}else{echo $v['username'];}?></a>
            <time datetime="2013-07-27T04:54:29-07:00" class="am-fr"><?php echo substr($v['createtime'],0,10);?></time>
          </div>
        </header>
        <div class="am-comment-bd am-text-xs">
          <?=$v['comment'];?>
        </div>
        <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
        <?php 
        $pinimg = file_get_contents(POSTAPI.'API_Food?dis=splimg&foodid='.$v['id']);
        $arrimg = json_decode(json_decode($pinimg),true);
        ?>
        <?php if(!empty($arrimg)):?>
          <?php foreach($arrimg as $val):?>
      <li>
        <div class="am-gallery-item">
            <a href="<?=IP.$val['address']?>" class="">
              <img src="<?=IP.$val['address']?>"/>
            </a>
        </div>
      </li>
    <?php endforeach;?>
    <?php endif;?>
  </ul>
      </div>
    <?php endforeach;?>
    <?php endif;?>
    </div> 
    <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" style="bottom:48px;" id="">
        <div class="am-u-sm-8 green a">
          <img src="skin/img/cl.png" class="cartImg am-posR" alt=""><span id="fen" class="allmoney cartA" style="top: 1rem;left: 1.8rem;">0</span>
          <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
        </div>
        <div class="am-u-sm-4 b">
          <button type="submit" class="am-btn am-btn-success tijiao">去结算</button>
        </div>
    </div>
  </form>
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
  <script src="skin/js/jquery.min.js"></script>
  <script src="skin/js/amazeui.min.js"></script>
  <script src="skin/js/num_cailan.js"></script>
  <script>
  $(function(){
      var inputs = $('.numTxt');

          inputs.each(function() {
     var numI=$(this).val();
        if(numI == 0){
        $(this).css('display','none');
        $(this).parent('.foodNum').find('.reduce').css('display','none');
        // $('.tijiao').attr('disabled','disable');
      }
      else{
        $(this).css('display','inline-block'); 
        // $('.tijiao').removeAttr('disabled').html('选好了');
        $(this).parent('.foodNum').find('.reduce').css('display','inline-block');
      }
   }); 
  })
  
  </script>
</body>
</html>