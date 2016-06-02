<?php 
ini_set('date.timezone','Asia/Shanghai');
//打印输出数组信息

function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#00ff55;'>$key</font> : $value <br/>";
    }
}

//①、获取用户openid
$tools = new JsApiPay();
$openId = $tools->GetOpenid();
//②、统一下单
$input = new WxPayUnifiedOrder();
$input->SetBody("大厨到家VIP");
$input->SetAttach("大厨到家－微信支付");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
//$input->SetTotal_fee($_GET['Money'].'00');
$input->SetTotal_fee('1');
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("大厨到家－微信支付");
$input->SetNotify_url("http://www.baidu.com");
$input->SetTrade_type("JSAPI");
$input->SetOpenid($openId);
$order = WxPayApi::unifiedOrder($input);
$jsApiParameters = $tools->GetJsApiParameters($order);

//获取共享收货地址js函数参数
//$editAddress = $tools->GetEditAddressParameters();

?>
  <script type="text/javascript">
  //调用微信JS api 支付
  function jsApiCall()
  {
    WeixinJSBridge.invoke(
      'getBrandWCPayRequest',
      <?php echo $jsApiParameters; ?>,
          function(res)
          {
            WeixinJSBridge.log(res.err_msg);
            if (res.err_msg == "get_brand_wcpay_request:ok")
            { 
              document.getElementById("makeformToPayCardPage").submit();
            }
            else if (res.err_msg == "get_brand_wcpay_request:cancel")
            { alert("已取消微信支付,你可选择其他支付或线下付款");}
          }
    );
  }

  function callpay()
  {
    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
            document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
        }
    }else{
        jsApiCall();
    }
  }
  </script>
  <script type="text/javascript">
  //获取共享地址
  function editAddress()
  {
    WeixinJSBridge.invoke(
      'editAddress',
      <?php echo $editAddress; ?>,
      function(res){
        var value1 = res.proviceFirstStageName;
        var value2 = res.addressCitySecondStageName;
        var value3 = res.addressCountiesThirdStageName;
        var value4 = res.addressDetailInfo;
        var tel = res.telNumber;
        
        alert(value1 + value2 + value3 + value4 + ":" + tel);
      }
    );
  }
  
  window.onload = function(){
    if (typeof WeixinJSBridge == "undefined"){
        if( document.addEventListener ){
            document.addEventListener('WeixinJSBridgeReady', editAddress, false);
        }else if (document.attachEvent){
            document.attachEvent('WeixinJSBridgeReady', editAddress); 
            document.attachEvent('onWeixinJSBridgeReady', editAddress);
        }
    }else{
      editAddress();
    }
  };
  
  </script>

 <!------------------  微信支付 END  ------------------>
 <body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
        <a href='<?php echo site_url('home/cart'); ?>'>
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    收银台
    </h1>
  </header>
  <form action=' <?php echo base_url()."index.php/orderWXPay/PayVipCard"; ?> ' id='makeformToPayCardPage' method="post">



      <div class="am-shadow fpa preduce">
      <p class="htit sad am-cf am-text-center"><span class="am-fl">其他支付方式</span> 
        <?php if ($_GET['Money'] >= 5000):?>
        <span class="red am-fr">会员卡面值大于5K,请选择线下支付</span>
        <?php endif ?>
      </p>
 
    

      <?php if ( $_GET['Money'] >= 5000):?>
            <div style="position: relative;" style="color:rgb(248, 85, 84);">
              <a href="javascript:;"  class="am-cf adc"><span style="color:gray;" class="am-icon-apple apple"></span>Apple Pay </span></a>
              <a  href="javascript:;" class="am-cf adc" disabled><img src="skin/img/wp_gray.png" class="payimg" alt=""> 微信支付 </a>
              <a  href="javascript:;" class="am-cf adc" disabled><img src="skin/img/zp_gray.png" class="payimg" alt="">支付宝支付</a>
              <div class="gs"></div>
            </div>
      <?php else: ?>
            <a href="javascript:;" class="am-cf adc"><span class="am-icon-apple apple"></span>Apple Pay <span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            <a onclick="callpay()" href="javascript:;" class="am-cf adc"><img src="skin/img/wp.png" class="payimg" alt=""> 微信支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/zp.png" class="payimg" alt="">支付宝支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
      <?php endif ?>

      <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"><img src="skin/img/op.png" class="payimg" alt="">线下支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>


      </div>
    </form>
  </body>
</html>