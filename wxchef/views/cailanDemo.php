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
              <a href="<?php echo site_url('home/food?id=').$v['foodid'].'&number=&shopid=';?>" class="vimg">
                <img src="skin/img/exp.gif" data-original="<?php echo IP.$v['thumbnail'];?>" class="lazy" alt="<?=$v['foodname'];?>"/>
              </a>
            </div>
            <div class=" am-u-sm-8 am-list-main am-padding-right-xs">
             <a href="<?php echo site_url('home/food?id=').$v['foodid'].'&number=&shopid=';?>" class="gray">
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
   <div class="bottomCart am-scrollable-vertical" style="display: none;    position: fixed;
    width: 100%;
    bottom: 64px;
    background: rgba(0,0,0,0.4);
    height: 100%;">
      <div class="am-panel am-panel-default" style="    position: absolute;
    width: 100%;
    bottom: 0;">
  <div class="am-panel-hd am-cf">
    <span class="am-panel-title am-fl" style="border-left: 5px solid #F85554;padding-left: 0.5rem;">购物车</span>
    <div class="am-fr gray">
      <span class="am-icon-trash"></span>清空
    </div>
  </div> 
  
  <ul class="am-list am-list-static">
  <div class="am-text-center am-text-lg am-margin-vertical-sm">庆典</div>
    <li class="am-cf">
        <div class="am-u-sm-5 am-margin-top-sm">客家卤汁酒香鸭</div>
        <input type="hidden" name="price" class="priceh" value="38" />
        <div class="am-u-sm-3 am-margin-top-sm"><i class="am-icon-cny red"></i><span class="everyTotal">114</span></div>
        <div class="am-u-sm-4 am-text-center">
           <span class="am-icon-minus-circle" style="    color: #FF9800;
    cursor: pointer;
    font-size: 1.6em;" onClick="deal(this, false),delcart();"></span>
           <span class="readNum">3</span>
           <span class="am-icon-plus-circle" style="    color: #4CAF50;
    cursor: pointer;
    font-size: 1.6em;
}"  onClick="deal(this, true)"></span>
        </div>
    </li>
  </ul> 
</div>

   </div>
   <!-- 服务条款 -->
   <div class="am-text-sm fwftip" style="position: fixed;
    bottom: 49px;height: 36px;
    padding: 0.5rem;
    width: 100%;    white-space: nowrap;
    text-overflow: ellipsis;
    background-color: #FBF9F9;
    border: 1px solid #eee;display: none"><span class="am-badge am-badge-warning am-margin-horizonal">费</span>0-240元 服务费60元，大于300不收, 240-300 服务费+240=300</div>
  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="">
     
      <div class="am-u-sm-8 a">
        <span class="green cartToggle" style="position: relative;margin-right: 10px;"><img src="skin/img/cart.png" id="car" alt=""><span id="fen" class="allmoney" style="    position: absolute;
    background: #F85554;
    left: 1rem;
    /* display: inherit; */
    top: -2px;
    bottom: 0;
    color: white;
    width: 1.7rem;
    height: 1.7rem;
    line-height: 1.7rem;
    border-radius: 50%;">0</span></span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
        <span class="ff am-text-sm gray" style="display: inline-block;">| 包含<span class="am-icon-cny" id="servmoney"></span>服务费 
               <input type="hidden" id="fee" name="servmoneydata" value="0">
      </span>
      </div>
      
      <div class="am-u-sm-4 b"> 
        <button type='submit'  class="am-btn am-btn-success">去结算</button>
      </div>
  </div>
</form>


<script src="skin/js/num_cailan_demo.js"></script>
<script src="skin/js/jqueryLazyload.js"></script>
<script>

 $(function(){
   $("img.lazy").lazyload();
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

 $('.cartToggle').bind('click',function() {
  //  $('.bottomCart').css('display','');
 // if($('.am-panel').find('li').length!=0){
     $('.bottomCart').fadeToggle(200); 
  //} 
  //else{
    
   // $('.bottomCart').css('display','none');
//$('.cartToggle').unbind();
 // }
 });
 $(document).on('click','.bottomCart',function(){ 
     $('.bottomCart').fadeOut(200);
 });
 $('.am-panel').click(function(event){ 
  event.stopPropagation();
    
 })

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