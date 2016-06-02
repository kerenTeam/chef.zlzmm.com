<body class="bwhite">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    服务
    </h1>
    
  </header>
  <!-- banner -->
  <div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
    <ul class="am-slides">
     <?php foreach($banner as $val):?>
      <li>
        <a href="<?=site_url('home/bannerinfo?id=').$val['id'].'&name='.$val['name'];?>"><img src="<?=IP.$val['img'];?>" class="am-img-responsive card" alt="<?=$val['name']?>"></a>
      </li>
    <?php endforeach;?>
      
    </ul>
  </div>
  <!-- content -->
  <form action="<?=site_url('home/servadd');?>" method="post">

    <div>
      <?=htmlspecialchars_decode($serv[0]['ideacontent']);?>
    </div>
    <div class="am-text-center am-margin am-text-lg red"><strong><span class="am-icon-cny"></span> 80/位</strong></div>
    <div class="am-g am-text-sm am-padding">
      <div class="am-u-sm-6 am-center sexSer">
        <img src="skin/img/boy.png" class="am-fl" alt="">
        <span class="price am-hide">80</span>
        <div class="srNum">
          <span class="reduce am-icon-minus-circle" onClick="handle(this, false)"></span>
          <input type="text" class="numTxt" name="boy"  onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="0">
          <span class="add am-icon-plus-circle" onClick="handle(this, true)"></span>
        </div>
      </div>
      <div class="am-u-sm-6 am-center sexSer">
        <img src="skin/img/girl.png" class="am-fl" alt="">
        <span class="price am-hide">80</span>
        <div class="srNum">
          <span class="reduce am-icon-minus-circle" onClick="handle(this, false)"></span>
          <input type="text" class="numTxt" name="girl"  onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="0">
          <span class="add am-icon-plus-circle" onClick="handle(this, true)"></span>
        </div>
      </div>
    </div>
    <div class="am-shadow">
      <header class="am-comment-hd">
        <!--<h3 class="am-comment-title">评论标题</h3>-->
        <div class="am-comment-meta">
          <a href="#link-to-user" class="am-comment-author"><img src="skin/img/user.jpg" class="am-circle comimg" alt="">157****4450</a> 
          <span class="am-fr"><time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12</time></span>
        </div>
      </header>
      <div class="am-comment-bd am-text-xs combo">
        味道很不错,服务人员很耐心
      </div>
      <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
        <li>
          <div class="am-gallery-item">
            <a href="skin/img/article/it1.png" class="">
              <img src="skin/img/article/it1.png"/>
            </a>
          </div>
        </li>
      </ul>
    </div>
    <div class="am-shadow">
      <header class="am-comment-hd">
        <!--<h3 class="am-comment-title">评论标题</h3>-->
        <div class="am-comment-meta">
          <a href="#link-to-user" class="am-comment-author"><img src="skin/img/user.jpg" class="am-circle comimg" alt="">157****4450</a>
           <span class="am-fr"><time datetime="2013-07-27T04:54:29-07:00" title="2013年7月27日 下午7:54 格林尼治标准时间+0800">2014-7-12</time></span>
        </div>
      </header>
      <div class="am-comment-bd am-text-xs combo">
        味道很不错,服务人员很耐心
      </div>
      <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
        <li>
          <div class="am-gallery-item">
            <a href="skin/img/article/it1.png" class="">
              <img src="skin/img/article/it1.png"/>
            </a>
          </div>
        </li>
      </ul>
    </div>
    <!-- footer -->
    <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="">
      
      <div class="am-u-sm-8 a">
        <span class="green"><img src="skin/img/cart.png" id="car" alt=""><span id="fen" class="allmoney">0</span>位</span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
      </div>
      <div class="am-u-sm-4 b">
        
        <button type='submit'  class="am-btn am-btn-success">确认</button>
        
      </div>
    </div>
  </form>
</body>
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
$(this).parent('.srNum').find('.reduce').css('display','none');
}
else{
$(this).css('display','inline-block');
$(this).parent('.srNum').find('.reduce').css('display','inline-block');
}
});
})
</script>
</html>