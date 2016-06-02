<body class="bwhite">
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform bheader">
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/cart')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
  <?=$name; ?>

  </h1>
  
</header>
<div class="contactCus">
  <img src="skin/img/contactBg.png">
</div>
  <a class="contactGo" href="<?php echo site_url('home/customServ')?>">
    晕了吗？<br>联系客服
  </a>
<form action="<?=site_url('home/cereOrder');?>" method="post" enctype="multipart/form-data">
  <?php foreach($details as $val):?>
  <div class="am-g area">
    <div class="am-u-sm-3"><strong><?=$val['Name'];?></strong></div>
    <!-- 主题名 -->
    <input type="hidden" name="zu[]" value="<?=$val['Sort'];?>"/>
     <input type="hidden" name="detailsname" value="<?=$name;?>"/>
    <div class="am-u-sm-9">
    <?php foreach($cerearr as $key=>$value):?>
      <?php if($val['Sort'] == $key):?>
    <?php  foreach($val['xq'] as $k=>$v):?>
    	<div class="am-cf gsf">
        <div class="am-fl"><?=$k+1?>、<?=$v['Name']?>/<small><?=$v['Unit'];?></small><span class="price red am-icon-cny"><?=$v['Price'];?></span></div>
        <div class="am-fr">
        <!-- 默认数量单位 -->
         <input type="hidden" name="unit" class="unit" value="1">
          <input type="hidden" name="cereid<?=$val['Sort'];?>[]" value="<?=$v['Id']?>" />
          <!-- 数量加减 -->
          <div class="CmNum">
            <span class="reduce am-icon-minus-circle" onClick="handle(this, false)"></span>
            <input type="text" class="numTxt" name="numbers<?=$val['Sort'];?>[]"  onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="<?=$value[$k]['detailsNumber'];?>">
            <span class="add am-icon-plus-circle" onClick="handle(this, true)"></span>
          </div>
        </div>
      </div>
    		
    <?php endforeach;?>
  <?php endif;?>
    <?php endforeach;?>
    
      </div>
    </div>
  </div>
<?php endforeach;?>
<input type="hidden" name='CelebrationId' value="<?=$id;?>" />

  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id=""> 
      <div class="am-u-sm-8 a">
        <span class="green"><img src="skin/img/cart.png" alt=""><span id="fen" class="allmoney">总价</span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
        <input type="hidden" name="moneyall" value="" id="moneyall"/>
      </div>
      <div class="am-u-sm-4 b">
        
        <button type="button" class="am-btn am-btn-success makeCheck">确认</button>
        
      </div> 
  </div>
  <div class="tk" style="display: none;">
         <div class="tkcontent tkvip bwhite" style="background: white;border-radius: 5px;">
           <div class="tktxt2">

              <div class="am-text-center am-text-lg am-margin-sm">订单确认</div>
              <!-- <hr data-am-widget="divider" style="margin:0;" class="am-divider am-divider-default" /> -->
              <div class="am-text-center am-margin am-text-sm">
              线下支付该订单，确认提交订单？
              </div>
              </div>

          <button type='button' class="am-u-sm-6 bno gray closem">取消</button>

          <button type='submit' id="sub" class="am-u-sm-6 bno green">提交</button>
          </div>
     </div>
</form>

</body>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script src="skin/js/num_unit.js"></script>
<script>
$(function(){
var inputs = $('.numTxt');
inputs.each(function() {
var numI=$(this).val();

if(numI == 0){
$(this).css('display','none');
$(this).parent('.CmNum').find('.reduce').css('display','none');

}
else{
$(this).css('display','inline-block');
$(this).parent('.CmNum').find('.reduce').css('display','inline-block');
}

});
$('.makeCheck').click(function(){
$('.tk').fadeIn(400);
});
$('.closem').click(function() {
$('.tk').fadeOut(400);

});

});







</script>
</html>