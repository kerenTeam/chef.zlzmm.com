<body class="bpa">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    日常套餐
    </h1>
    
  </header>
  <!-- 详情 -->
  <form action="" method="" enctype="mutiltype/data">
    <div class="foodinfo am-shadow">
      <div class="fimg"><img src="skin/img/product/rjx.jpg" class="am-img-responsive card" alt="大厨到家"></div>
      <div class="am-g">
        <h2>日常套餐 898元系列</h2>
        <div class="months"><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i>月销<span class="">100</span>份</div>
        <p class="am-text-sm"><strong>菜品：</strong>58元石锅酱仔排，28元玉米香脆骨，48元菌香豉汁肥牛，28元腊味荷兰豆，58元香辣仔兔，48元葱油干烧裸斑，48元金银萝卜炖排骨，22元百合苡仁老南瓜，12元葱香鸡蛋干等等17道菜系。</p>
        <p class="am-text-sm"><strong>简介：</strong>菜品丰富多样，价格实惠。</p>
        
        <div class="pr"><i class="am-icon-cny"></i><span class="price">168</span></div>
        <div class="foodNum">
          <span class="reduce am-icon-minus-circle" onClick="handle(this, false)"></span>
          <input type="text" class="numTxt" name="numbers" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="2">
          <span class="add am-icon-plus-circle" onClick="handle(this, true)"></span>
        </div>
       <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
        <p class="am-text-sm"><strong>菜品展示：</strong></p>
        <div class="tc am-text-sm am-text-center">
           <img src="skin/img/product/shiguo.jpg" alt="">
            58元石锅酱仔排
        </div> 
         <div class="tc am-text-sm am-text-center">
            <img src="skin/img/product/ymxcg.jpg" alt="">
            28元玉米香脆骨
        </div>
         <div class="tc am-text-sm am-text-center">
            <img src="skin/img/product/cxjdg.jpg" alt="">
            12元葱香鸡蛋干
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
        <span class="red am-text-xxl">9.8</span>分<br>
        <span class="am-text-xs red"><i class="am-icon-star "></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i></span><br>
        <span class="am-text-xs"> 共20人评价</span>
        
      </div>
      <div class="am-u-sm-7 stars">
        <p class="am-text-xs"><span class="am-text-right">菜品</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 4.9分</p>
        <p class="am-text-xs"><span class="am-text-right">厨师</span><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 4.9分</p>
        <p class="am-text-xs"><span class="am-text-right">服务员</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 4.9分</p>
      </div>
      <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
      <!-- 文字评论 -->
      <div class="am-shadow">
        <header class="am-comment-hd">
          <!--<h3 class="am-comment-title">评论标题</h3>-->
          <div class="am-comment-meta">
            <a href="#link-to-user" class="am-comment-author"><img src="skin/img/user.jpg" class="am-circle comimg" alt="">某人</a>
            <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
          </div>
        </header>
        <div class="am-comment-bd am-text-xs">
          味道很不错
        </div>
      </div>
      <div class="am-shadow">
        <header class="am-comment-hd">
          <!--<h3 class="am-comment-title">评论标题</h3>-->
          <div class="am-comment-meta">
            <a href="#link-to-user" class="am-comment-author"><img src="skin/img/user.jpg" class="am-circle comimg" alt="">某人</a>
            <time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12 15:30</time>
          </div>
        </header>
        <div class="am-comment-bd am-text-xs">
          味道很不错
        </div>
      </div>
    </div>
    
    <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" style="bottom:48px;" id="">
      <a href="<?php echo site_url('home/order')?>">
        <div class="am-u-sm-8 green a">
          <img src="skin/img/cl.png" class="cartImg" alt=""><span id="fen" class="allmoney">2</span>份
          <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">336</span>
        </div>
        <div class="am-u-sm-4 b">
          
          <button type="submit" class="am-btn am-btn-success tijiao">确定</button>
          
        </div>
      </a>
    </div>
  </form>
   <!-- footer -->
<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
  <ul class="am-navbar-nav am-cf am-avg-sm-4 am-shadow">
    <li >
      <a href="<?php echo site_url('home/index')?>" class="active">
        <span class=""><img src="skin/img/home2.png" alt=""></span>
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
      <a href="<?php echo site_url('home/search')?>">
        <span class=""><img src="skin/img/ss.png" alt=""></span>
        <span class="am-navbar-label">搜索</span>
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
  <script src="skin/js/num.js"></script>
  <script>
  $(function(){
      var inputs = $('.numTxt');

          inputs.each(function() {
     var numI=$(this).val();
        if(numI == 0){
        $(this).css('display','none');
        $(this).parent('.foodNum').find('.reduce').css('display','none'); 
      }
      else{
        $(this).css('display','inline-block');  
        $(this).parent('.foodNum').find('.reduce').css('display','inline-block');
      }
   });

  
  })
  </script>
</body>
</html>