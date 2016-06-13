<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
 <script type="text/javascript" src="skin/js/quick_links.js"></script>
<link rel="stylesheet" type="text/css" href="skin/css/base.css" />
<body>
  <!-- header -->
  <header data-am-widget="header"class="am-header am-header-default topform bheader" style="position:fixed!important;top:0px !important; width: 100%;height: 49px;z-index: 9999"> <!-- data-am-sticky  am-header-fixed header固定在顶部-->
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/index')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
  菜篮子
  </h1>
 <script type="text/javascript">
  function doaction() {
  $.ajax({
    type: "POST",
    url: '<?=site_url('home/cart');?>',
    data: $('#question').serialize(),
    success: function(data) { 
      alert(data);

    }

  });
}
</script>
</header>
<form  id='question' enctype="multipart/form-data">
 <!-- style="position: fixed;top:49px;left:0;width:100%;height:100%;" -->
  <!-- 菜品栏目 -->
  <div class="am-u-sm-3 cmn aml"><!--  style="height: 100%;overflow-y:auto; " -->
     <nav class="scrollspy-nav" data-am-scrollspy-nav="{offsetTop: -48}" data-am-sticky="{top:49}">
    <div class="pink typec"><img src="skin/img/type.png" alt="">&nbsp;分类</div>
    <ul class="am-list typel">
    <?php foreach($cates as $cate):?>
      <li><a href="#<?=$cate['id']?>"><img src="<?=base_url($cate['packicon']);?>" alt="">&nbsp;<?=$cate['packname'];?></a></li>
    <?php endforeach;?>
    </ul>
    </nav>
  </div>
  <!-- 菜品选择 --> <!-- style="height: 100%;overflow-y:auto;padding-bottom: 8.5rem;" -->
  <div data-am-widget="list_news" class="am-u-sm-9 asp cmn amr">
    <div class="cmn cmnb am-list-news am-list-news-default" >
      <div class="am-list-news-bd">

      <?php foreach($cates as $val):?>
        <p id="<?=$val['id']?>"><?=$val['packname']?></p>
        <ul class="am-list">
        <?php $pid = $val['id']; $foods = $this->db->query("select * from food where pid ='$pid'");$food = $foods->result_array();?>
        <?php foreach($food as $v):?>
          <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
            <div class="am-u-sm-4 am-list-thumb">
              <a href="<?php echo site_url('home/food?id=').$v['id'];?>" class="vimg">
                <img src="<?=base_url($v['thumbnail']);?>" alt="<?=$v['foodName'];?>"/>
              </a>
            </div>
            <div class=" am-u-sm-8 am-list-main">
              <h3 class="am-list-item-hd"><?=$v['foodName'];?></h3>
              <input type="hidden" name="foodid[]" value="<?=$v['id'];?>">
              <div class="am-list-item-text"><strong>特点：</strong><?=$v['specialty'];?>。</div>
              <div class="months">推荐指数：<i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i>月销<span class="vimg"><?=$v['monthSalesm'];?></span>份</div>
              <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$v['price'];?></span><span class="am-text-xs gray"> /份</span></div>
              <div class="foodNum">
                <span class="reduce am-icon-minus-circle" onClick="handle(this, false)"></span>
                <input type="text" class="numTxt" name="numbers[]"  onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="0">
                <span class="add am-icon-plus-circle" onClick="handle(this, true)"></span>
              </div>
               <a href="javascript:;" class="add_cart_large btnCart">加入购物车</a>
 
            <div id="flyItem" class="fly_item"><img src="images/item-pic.jpg" width="40" height="40"></div>
            </div>
          </li>
        <?php endforeach;?>
        </ul>
      <?php endforeach;?>
      </div>
    </div>
  </div>

  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="">
      <div class="am-u-sm-8 a">
        <span class="green"><img src="skin/img/cart.png" alt=""><span id="fen" class="allmoney">0</span>份</span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
      </div>
       <div class="quick_links_panel"><div id="quick_links" class="quick_links"><li id="shopCart"><a href="#" class="message_list" ><i class="message"></i><div class="span">购物车</div><span class="cart_num">0</span></a></li>
                </div></div>
                <div id="quick_links_pop" class="quick_links_pop hide"></div>
      <div class="am-u-sm-4 b">
        
        <button  onclick="doaction()" class="am-btn am-btn-success">确认</button>
        
      </div>
  </div>
</form>

<script src="skin/js/num.js"></script>
<script src="skin/js/parabola.js"></script>
    <script type="text/javascript">
   
    // 元素以及其他一些变量
    var eleFlyElement = document.querySelector("#flyItem"), eleShopCart = document.querySelector("#shopCart");
    var numberItem = 0;
    // 抛物线运动
    var myParabola = funParabola(eleFlyElement, eleShopCart, {
        speed: 600, //抛物线速度
        curvature: 0.0001, //控制抛物线弧度
        complete: function() {
            eleFlyElement.style.visibility = "hidden";
            eleShopCart.querySelector("span").innerHTML = ++numberItem;
        }
    });
    // 绑定点击事件
    if (eleFlyElement && eleShopCart) {
        
        [].slice.call(document.getElementsByClassName("btnCart")).forEach(function(button) {
            button.addEventListener("click", function(event) {
                // 滚动大小
                var scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft || 0,
                scrollTop = document.documentElement.scrollTop || document.body.scrollTop || 0;
                eleFlyElement.style.left = event.clientX + scrollLeft + "px";
                eleFlyElement.style.top = event.clientY + scrollTop + "px";
                eleFlyElement.style.visibility = "visible";
                
                // 需要重定位
                            myParabola.position().move();
            });
        });
    }
    </script>
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