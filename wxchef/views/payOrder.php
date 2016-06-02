<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="javascript:" onclick="javascript:history.go(-1);">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    收银台
    </h1>
  </header>
  <form action="" method="">
    <div class="am-list-news-bd">
      <ul class="am-list odl">
        <li class="am-g am-list-item-dated">
          <a href="javascript:" class="am-list-item-hd">订单金额</a>
          <span class="am-list-date red"><i class="am-icon-cny atf">10</i></span>
        </li> 
        <li class="am-g am-list-item-dated preduce">
          <a class="am-list-item-hd" id="vippay"><img src="skin/img/vp.png" class="payimg" alt="">会员卡支付
            <span class="am-list-date"><i class="am-icon-angle-right atf"></i></span>
          </a>
        </li>
        
      </ul>
     </div>
       <div class="tk" style="display: none;">
         <div class="tkcontent tkvip bwhite" style="background: white;border-radius: 5px;">
           <div class="tktxt2">

              <div class="am-text-center am-text-lg am-margin-sm">会员卡支付</div>
              <!-- <hr data-am-widget="divider" style="margin:0;" class="am-divider am-divider-default" /> -->
              <div class="am-text-center am-margin">

                <strong>至尊金卡</strong><br>
                当前余额<strong class="am-margin-right am-icon-cny pink">300</strong>
              </div>
              </div>

          <button type='button' class="am-u-sm-6 bno gray closem">取消</button>

          <button type='button' id="sub" class="am-u-sm-6 bno green">提交</button>
          </div>
     </div>
     <div class="am-shadow fpa preduce">
      <p class="htit sad">其他支付方式</p>
 
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><!-- <img src="skin/img/ap.png" class="payimg" alt=""> --> <span class="am-icon-apple apple"></span>Apple Pay <span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/wp.png" class="payimg" alt=""> 微信支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/zp.png" class="payimg" alt="">支付宝支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/op.png" class="payimg" alt="">线下支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      </div>
    </form>
  </body>
   <script src="skin/js/jquery.min.js"></script>
      <script>
        $(function(){
          $('#vippay').click(function() {
           $('.tk').fadeIn(400);
        });
         $('.closem').click(function() {  
          $('.tk').fadeOut(400); 
        });
         $('#sub').click(function() {  
          $('.tk').fadeOut(400);
          window.location.href="<?php echo base_url().'index.php/orderWXPay/postOrderData?MenberMoney=1'?>" ;
        });
        })
      </script>
</html>