<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<body>
  <!-- header -->
  <header data-am-widget="header"class="am-header am-header-default topform bheader" style="position:fixed!important;top:0px !important; width: 100%;height: 49px;z-index: 9999"> <!-- data-am-sticky  am-header-fixed header固定在顶部-->
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/index')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
  净菜
  </h1>

</header>
<script>
// 增加菜品数量
  function addcart(){
       $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/addcart'); ?>',
            data: $('#question').serialize(),
            success: function(data) {
               // console.log(data);
            }
        });
         
  }
  // 减少菜品数量
 function delcart(){
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/deletecart'); ?>',
            data: $('#question').serialize(),
            success: function(data) {
               // console.log(data);
            }
        });
  }


</script>
<form action="<?=site_url('home/addcart');?>" method='post'  id='question' enctype="multipart/form-data">
 <!-- style="position: fixed;top:49px;left:0;width:100%;height:100%;" -->
  <!-- 菜品栏目 -->
  <div class="am-u-sm-3 cmn aml"><!--  style="height: 100%;overflow-y:auto; " -->
     <nav class="scrollspy-nav" data-am-scrollspy-nav="{offsetTop: -48}" data-am-sticky="{top:49}">
    <div class="pink typec"><img src="skin/img/type.png" alt="">&nbsp;分类</div>
    <ul class="am-list typel">
     <?php foreach($cates as $cate):?>
        <li><a href="javascript:;"><img src="<?php echo IP.$cate['imgaddress'];?>" alt=""> <?=$cate['name'];?></a></li>
      <?php endforeach;?>
    </ul>
    </nav>
  </div>
  <!-- 菜品选择 --> <!-- style="height: 100%;overflow-y:auto;padding-bottom: 8.5rem;" -->
  <div data-am-widget="list_news" class="am-u-sm-9 asp cmn amr">
    <div class="cmn cmnb am-list-news am-list-news-default" >
      <div class="am-list-news-bd"> 
       <?php foreach($cates as $val):?>
        <div class="cptit typeName" id="<?=$val['foodcategoryid']?>"><span><?=$val['name'];?></span></div>
        <ul class="am-list">
        <?php foreach($foods as $v):?>
  
          <?php if($val['foodcategoryid'] == $v['foodpid']):?>
          <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
            <div class="am-u-sm-7 am-text-center">
              <a href="<?php echo site_url('home/food?id=').$v['foodid'].'&number=&shopid=';?>" class="vimg2">
                <img src="skin/img/exp.gif" data-original="<?php echo IP.$v['thumbnail'];?>" class="lazy" alt="<?=$v['foodname'];?>"/>
              </a>
            </div>
            <div class=" am-u-sm-5 am-list-main">
             <a href="<?php echo site_url('home/food?id=').$v['foodid'].'&number=&shopid=';?>" class="gray">
              <h3 class="am-list-item-hd black onlyVege"><?=$v['foodname'];?></h3>
             <div class="months am-margin-vertical">推荐指数：<i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i></div>
              <input type="hidden" name="foodid[]" value="<?=$v['foodid'];?>">
             <!--  <div class="am-list-item-text"><strong>特点：</strong><?=$v['foodtrait'];?>。</div>
              <div class="months">推荐指数：<i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i>月销<span>123</span>份</div> -->
             </a>
              <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$v['foodprice'];?></span><span class="am-text-xs gray"> /份</span></div>
              <div class="foodNum">
            
                <span class="reduce am-icon-minus-circle" onClick="handle(this, false),delcart();"></span>
                <input type="text" class="numTxt" name="numbers[]" onkeydown="if(event.keyCode==13)event.keyCode=9" onkeypress="return IsNum(event)" oninput="ueserWrite(this)" onfocus="blurWrite(this)" value="<?php if(isset($v['number'])){echo $v['number'];}else{echo '0';}?>">
                <span class="add am-icon-plus-circle"  onClick="handle(this, true)"></span><!--  onClick="handle(this, true)" -->
              </div>
            </div>
          </li>
         <input type="hidden" name='code[]' value="2" />
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
        <span class="green"><img src="skin/img/cart.png" id="car" alt=""><span id="fen" class="allmoney">0</span>份</span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
      </div>
      <div class="am-u-sm-4 b">
        
        <button type='submit'  class="am-btn am-btn-success">去结算</button>
        
      </div>
  </div>
</form>

<script src="skin/js/num_cailan.js"></script>
<script src="skin/js/jqueryLazyload.js"></script>
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

$('.typel li:first-child a').addClass('currentType');
$('.typel li').on('click',function(){
  $('.typel li a').removeClass('currentType');
  var curT =  $(this);
 curT.find('a').addClass('currentType'); 
  var typeLi = curT.find('a').text();
  console.log($.trim(typeLi)); 
   $('.typeName').each(function(){
    if($.trim(typeLi) == $(this).find('span').html()){ 
      $(this).css('display','block');
      // $(this).css('marginTop','49px');
      $('body').scrollTop(0);
      $(this).next('ul').css('display','block');
    }
    else{
       $(this).css('display','none');
      $(this).next('ul').css('display','none');
    }
  })

})

 $("img.lazy").lazyload();
}) 
</script>
<style>
   .oo{
      font-size:20px;
      z-index:99999999;
       -webkit-transition:0.5s left linear,
                      0.5s top ease-in,
                      0.1s 0.5s visibility linear;
        transition:0.5s left linear,
                   0.5s top ease-in,
                   0.1s 0.5s visibility linear;
  }
   .typeName:not(:first-child),.typeName:not(:first-child)+ul{
    display:none;
   }
   .currentType{
    border-left: 2px solid #ED3F59;
    background: rgba(248, 85, 84, 0.27);
    color: #ED3F59;
   }
</style>
<script type="text/javascript">
    var add = document.getElementsByClassName("add"); 
    var car = document.getElementById("car");
    for (var i = 0; i < add.length; i++) {
        add[i].onclick = function(){
            clearTimeout(par);
            var x = this.getBoundingClientRect().left;
            var y = this.getBoundingClientRect().top;
            var car_x = car.getBoundingClientRect().left;
            var car_y = car.getBoundingClientRect().top;
            var div = document.createElement("div");
            div.style.position = "fixed";
            div.style.left = x + "px";
            div.style.top = y + "px";
            div.setAttribute("class","add am-icon-plus-circle oo");
            document.documentElement.appendChild(div);
             handle(this, true);
             var par = setTimeout(function(){ 
         div.style.zIndex=99999;
                    div.style.left=car_x + "px";
                    div.style.top=car_y + "px";//加单位很重要，不然不会动 
        var remove=setTimeout(function(){
               div.parentNode.removeChild(div);
      },550)
      },1)
        }
    }
</script>
</body>
</html>