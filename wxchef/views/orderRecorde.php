<link rel="stylesheet" type="text/css" href="skin/css/city.css">
<body>
  <style>ul,.am-list{margin-bottom:-0.8rem!important;}</style>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('home/ucent');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    我的订单
    </h1>
  </header>
  <?php // var_dump($record);?>
  <!-- 订单分类 -->
  <div data-am-widget="titlebar" class="am-titlebar am-titlebar-cols ana am-shadow" >
    <a href="javascript:" class="current">全部</a>
    <a href="javascript:">待服务</a>
    <a href="javascript:">待付款</a>
    <a href="javascript:">服务中</a>
    <a href="javascript:">待评价</a>
    <a href="javascript:">退款</a>
  </div>
  <!-- 所有订单 -->
  
  <div data-am-widget="list_news" class="am-list-news am-list-news-default admt" >
    <!-- 待评价 -->
    <?php if(!empty($record)):?>
      <?php foreach($record as $key=>$value):?>
         <div class="am-list-news-bd am-shadow">
      
      <ul class="am-list olib">
        <!--缩略图在标题左边-->
        <div class="am-cf otop">
          <time datetime="2015-03-22T04:54:29-07:00" title=""><?=$value['BillDate']?></time>
          <span class="am-fr am-text-sm state"><?php switch ($value['State']) {
              case '0':
               echo "待付款";
                break;
              case '1':
              case '2':
              
              case '6':
                  echo "待服务";
                break;
              case '3':
			        case '4':
                  echo "服务中";
                break;
              case '8':
                  echo "待评价";
                break;
              case '7':
                  echo "退款";
                break;
              case '10':
                  echo "退款";
                break;
          }?></span>
        </div>

      <?php  $food = $value['FoodDetails']; foreach($food  as $k=>$v):?>
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
          <a href="<?php echo site_url('home/food?id='.$v['FoodId'].'&number=&shopid=');?>" class="black">
          <div class="am-u-sm-6 am-list-main">
            <h3 class="am-list-item-hd am-padding-left"><?=$v['FoodName'];?></h3>
          </div>   <!-- 订单数量 -->
          <div class="am-u-sm-3 am-text-center am-list-item-text">X <?=$v['FoodNumber'];?></div>
          <div class=" am-u-sm-3 am-text-center am-list-main">
            <!-- 订单价格 -->
            <h3 class="am-list-item-hd"><span class="am-icon-cny"><?=$v['DiscountMoney'];?></span></h3>
            
          </div>
          </a> 

        </li>
      <?php endforeach;?>
      <?php if(!empty($value['CeleId'])):?>

        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
          <a href="<?php echo site_url('home/ceremony?id=').$value['CeleId'];?>" class="black">
          <div class="am-u-sm-6 am-list-main">
            <h3 class="am-list-item-hd am-padding-left"><?=$value['CeleName'];?></h3>
          </div>   <!-- 订单数量 -->
          <div class="am-u-sm-3 am-text-center am-list-item-text">X 1</div>
          <div class=" am-u-sm-3 am-text-center am-list-main">
            <!-- 订单价格 -->
            <h3 class="am-list-item-hd"><span class="am-icon-cny"><?=$value['CeleMoney'];?></span></h3>
          </div>
          </a> 
        </li>

      <?php endif;?>
        <span class="am-margin-left-sm pink am-text-sm">预约时间：<?php echo str_replace('T',' ',$value['AppointmentTime']);?></span><div class="oall am-text-sm am-fr am-margin-right-sm">合计：<span class="am-icon-cny am-text-md"><?=$value['Amount'];?></span></div>
        <hr data-am-widget="divider" class="am-divider am-divider-default ahr" />
        <p class="orderbot am-cf">

        <span class="am-margin-left-sm gray am-text-sm orderNum">订单号：<?=$value['BillNo'];?></span>
        <?php switch ($value['State']) {
            case '0':
              echo "<a href='".site_url('home/payment?id=').$value['PoorderId'].'&money='.$value['Amount']."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>付款</a>"; 
              echo "<a href='".site_url('home/orderState?id=').$value['PoorderId'].'&state=11'."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>取消订单</a>";
              break;
            case '1':
            case '2':
            case '6':
                echo "<a href='".site_url('home/orderState?id=').$value['PoorderId'].'&state=7'."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>退款</a>";
              break;
            case '7':
              echo "<a href='javascript:;' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>退款中</a>";
              break;
            case '8':
              if($value['IsEvaluate'] == '0'){

                echo "<a href='".site_url('home/commentTotal?id=').$value['PoorderId']."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>评价</a>";
              }else{
                  foreach ($food as $key => $v) {
                    if($v['State'] == '0'){
                      $a = '1';
                    }
                  }
                  if($a == 1){
                      echo "<a href='".site_url('home/commentTotal?id=').$value['PoorderId']."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>评价</a>";
                    }else{
                       echo "<a href='javascript:;' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>已评价</a>";
                    }
              }
             
              echo "<a href='".site_url('home/delorder?id=').$value['PoorderId']."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>删除</a>";
              break;
            case '9':
              echo "<a href='".site_url('home/share')."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>分享</a>";
              echo "<a href='".site_url('home/delorder?id=').$value['PoorderId']."' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>删除</a>";
              break;
            case '10':
                 echo "<a href='javascript:;' class='am-fr am-btn am-btn-primary bgreen am-btn-xs'>退款成功</a>";
                break;
          }?>
        
        </p>
        
      </ul>
    </div>
  <?php endforeach;?>
  <?php else:?>
     <div class="am-list-news-bd am-shadow am-padding">你还没有订单！赶紧去下单吧。 </div>
  <?php endif;?>
    <!-- 等待付款 -->
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
  <script src="skin/js/jquery.min.js"></script>
  <script src="skin/js/amazeui.min.js"></script>
 <script>
  $(function(){
  $('.ana a').on('click',function(){
  $('.ana a').removeClass('current');
  $(this).addClass('current');
  console.log($(this).text());
  if($(this).text()!=='全部'){
    var nav = $(this).text();
       $('.am-list-news-bd').css('display','none');
       $('.state').each(function(){
            if($(this).text().substr(0,2)== nav.substr(0,2)){ 
           $(this).parentsUntil('.am-list-news-bd').parent().css('display','');
          } 
       }) 
       } 
  else{
    $('.am-list-news-bd').css('display','');
  }
  
  })
  })
  </script>
</body>
</html>