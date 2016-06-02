<body>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="javascript:" onclick="javascript:history.go(-1);">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    购物车
    </h1>
  </header>
  <!-- form表单 -->
  <form action="" method="">
    <div class="am-list-news-bd">
      <!-- 购物车列表 -->
       <p class="am-text-center oln">点菜</p>
      <ul class="am-list userSC"> 
        <li class="am-g am-list-item-dated">
          <div class="deladd am-cf">
            <div class="am-u-sm-6">sad山药松茸滋补汤锅</div>
            <div class="am-u-sm-3"> X <span class="jnum">1</span></div>
            <div class="am-u-sm-3 red"><i class="am-icon-cny"></i><span class="price">288</span></div>
          </div>
          <!-- 删除 数量加减 -->
          <div class="da">
             <a href="" class="am-fl"><i class="am-icon-trash red ats"></i></a> 
            <div class="am-fr dar"> 
                <span class="am-icon-minus-square-o pink ats" onClick="handle(this,false)"></span>
                <span class="am-icon-plus-square-o green ats" onClick="handle(this,true)"></span> 
            </div>
          </div>
        </li>
        <li class="am-g am-list-item-dated">
          <div class="deladd am-cf">
            <div class="am-u-sm-6">山药松茸滋补汤锅</div>
            <div class="am-u-sm-3"> X <span class="jnum">1</span></div>
            <div class="am-u-sm-3 red"><i class="am-icon-cny"></i><span class="price">288</span></div>
          </div>
          <!-- 删除 数量加减 -->
          <div class="da">
             <a href="" class="am-fl"><i class="am-icon-trash red ats"></i></a> 
            <div class="am-fr dar"> 
                <span class="am-icon-minus-square-o pink ats" onClick="handle(this,false)"></span>
                <span class="am-icon-plus-square-o green ats" onClick="handle(this,true)"></span> 
            </div>
          </div>
        </li>
      </ul>
      <p class="am-text-center oln">套餐</p>
      <ul class="am-list userSC">
         <li class="am-g am-list-item-dated">
          <div class="deladd am-cf">
            <div class="am-u-sm-6">团拜宴套餐</div>
            <div class="am-u-sm-3"> X <span class="jnum">3</span></div>
            <div class="am-u-sm-3 red"><i class="am-icon-cny"></i><span class="price">1288</span></div>
          </div>
          <!-- 删除 数量加减 -->
          <!-- <div class="da">
             <a href="" class="am-fl"><i class="am-icon-trash red ats"></i></a> 
            <div class="am-fr dar"> 
                <span class="am-icon-minus-square-o pink ats" onClick="handle(this,false)"></span>
                <span class="am-icon-plus-square-o green ats" onClick="handle(this,true)"></span> 
            </div>
          </div> -->
        </li>
      </ul>
    </div>
     
     <p class="cart-summary am-fr">共<span class="allnum" id="fen">5</span>&nbsp;份菜 &nbsp;&nbsp;<span class="red"><i class="am-icon-cny all_money">4440</i></span></p>

  <!-- 正确的 -->
  <!-- <button type="submit" class="am-u-sm-12 am-btn bgreen go">去结算</button> -->
   <!-- 操作演示用 -->
   <a href="<?php echo site_url('home/order')?>"> <button type="button" class="am-u-sm-12 am-btn bgreen go">去结算</button></a>
    
  </form>
</body>
<script src="skin/js/jquery.min.js"></script>
<script>
  $(function(){
      $('.da').hide();
      $(".deladd").on('click',function() {
      $(this).next(".da").slideToggle(400);
    });
     
  }) 
</script>
<script>
 
/** 总份数*/
var fen = parseInt($('#fen').html()); 
// if(fen = 0){
   var all_money =parseInt($('.all_money').html());  
// }
var curCount;
function handle(self, isAdd){
    var countEl = $(self).parentsUntil(".am-list-item-dated").prev().find('.jnum');
    var curCount=parseInt(countEl.html());
  var price = parseInt($(self).parentsUntil(".am-list-item-dated").prev().find('.price').html()); 
   
    if(isAdd){
    curCount++;
    fen++;
    all_money += parseInt(price);
    
  }else{
    curCount--;
    fen--;
    if(curCount <1){
    curCount=0;
    $(self).parentsUntil(".userSC").remove();
      all_money =all_money-parseInt(price)*1;
      
    }else
      all_money -= parseInt(price);
  }
  $("#fen").html(fen);
    countEl.html(curCount) ; 
    $(".all_money").html(all_money);
}
</script>
</html>