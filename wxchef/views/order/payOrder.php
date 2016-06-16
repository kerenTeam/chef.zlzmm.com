<?php 
error_reporting(0);

if(!isset($_SESSION['rePayData'])){
  echo "<script>window.location.href='gohome';</script>";
  exit;
}else{
  if($_SESSION['rePayData'] == ''){
    echo "<script>window.location.href='gohome';</script>";
    exit;
  }
}


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
$input->SetBody("大厨到家订餐支付");
$input->SetAttach("大厨到家－微信支付");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
//$input->SetTotal_fee(str_replace(".0000","00",$_SESSION['rePayData'][0]['MoneyAll']));
$input->SetTotal_fee('1');
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 36000));
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
              document.getElementById("makeformToPayOrder").submit();
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
      <a href="<?php echo site_url('home/ucent');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    收银台
    </h1>
  </header>
  <form action=' <?php echo base_url()."index.php/orderWXPay/postOrderData"; ?> ' id='makeformToPayOrder' method="post">
    <div class="am-list-news-bd">
      <ul class="am-list odl">
        <li class="am-g am-list-item-dated">
          <a href="javascript:" class="am-list-item-hd">订单金额</a>
          <span class="am-list-date red"><i class="am-icon-cny atf"><?php  echo round($_SESSION['rePayData'][0]['MoneyAll'],2); ?></i></span>
        </li> 
        <li class="am-g am-list-item-dated preduce">
        <?php 
         $user = file_get_contents(POSTAPI."API_User?dis=ckxx&UserPhone=".$_SESSION['phone']);
        $userdata = json_decode(json_decode($user),true);
        $balance  =  $userdata[0]['balance'];
         ?>
<!--          <?php if ($balance >= $_SESSION['rePayData'][0]['MoneyAll']): ?>
            <a href="javascript:;" class="am-list-item-hd" id="vippay">&nbsp;&nbsp;&nbsp;<img src="skin/img/vp.png" class="payimg" alt="">&nbsp;会员卡支付
            <span class="am-list-date"><i class="am-icon-angle-right atf"></i></span>
          </a>
         <?php else: ?>
            <a href="javascript:;" class="am-list-item-hd" style="color:#ccc;">&nbsp;&nbsp;&nbsp;<img src="skin/img/vp_gray.png" class="payimg" alt="">&nbsp;会员卡支付  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;会员卡余额不足
            <span class="am-list-date"><i class="am-icon-angle-right atf"></i></span>
          </a>
         <?php endif ?> -->
            <a href="javascript:;" class="am-list-item-hd" id="vippay"> &nbsp;<img src="skin/img/vp.png" class="payimg" alt="">&nbsp;会员卡支付
            <span class="am-list-date"><i class="am-icon-angle-right atf"></i></span>
            </a>
        </li>
      </ul>
     </div>

     
    <!-- 会员卡支付弹框 -->


    <div class="tk" style="display: none;">
         <div class="tkcontent tkvip bwhite" style="background: white;border-radius: 5px;">
		 <?php if($balance >= $_SESSION['rePayData'][0]['MoneyAll']):?>
			 <div class="tktxt2">
              <div class="am-text-center am-text-lg am-margin-sm">会员卡支付</div>
			 <!-- <hr data-am-widget="divider" style="margin:0;" class="am-divider am-divider-default" /> -->
               <div class="am-text-center am-margin">
                当前余额<strong class="am-margin-right am-icon-cny pink"><?=$balance?></strong>
				</div> 
             </div>
				  <button type='button' class="am-u-sm-6 bno gray closem">取消</button>
				  <button type='button' id="sub" class="am-u-sm-6 bno green">提交</button>
		<?php else:?>
			<div class="tktxt2">
              <div class="am-text-center am-text-lg am-margin-sm">会员卡余额不足</div>
			 <!-- <hr data-am-widget="divider" style="margin:0;" class="am-divider am-divider-default" /> -->
               <div class="am-text-center am-margin">
                当前余额<strong class="am-margin-right am-icon-cny pink"><?=$balance?></strong>
				</div> 
             </div>
			 <button type='button' class="am-u-sm-6 bno gray closem">取消</button>
			 <a href='<?=site_url('home/vipCard');?>' class="am-u-sm-6 bno green" onclick='delrepaydata();'>去充值</a>
		<?php endif;?>
          </div>
     </div>

     <div class="am-shadow fpa preduce">
      <p class="htit sad am-cf am-text-center"><span class="am-fl">其他支付方式</span> 
<!--         <?php if ( str_replace(".0000","00",$_SESSION['rePayData'][0]['MoneyAll']) >= 5000):?>
        <span class="red am-fr">交易额大于5K,请选择会员卡支付或线下支付</span>
        <?php endif ?> -->
      </p>
 

<!-- <h1> <?php echo round($_SESSION['rePayData'][0]['MoneyAll'],2); ?></h1>
<h1> <?php echo str_replace(".0000","00",$_SESSION['rePayData'][0]['MoneyAll']); ?></h1>
 -->

      <?php if ( str_replace(".0000","00",$_SESSION['rePayData'][0]['MoneyAll']) >= 5000):?>

            <div  style="color:rgb(248, 85, 84);">
              <a href="javascript:;"  class="am-cf adc" onclick="mall();"><span style="color:gray;" class="am-icon-apple apple"></span>Apple Pay </span></a>
              <a  href="javascript:;" class="am-cf adc" disabled > &nbsp;<img src="skin/img/wp_gray.png" class="payimg" alt="">&nbsp;微信支付 </a>
              <a  href="javascript:;" class="am-cf adc" disabled onclick="mall();"> &nbsp;<img src="skin/img/zp_gray.png" class="payimg" alt="">&nbsp;支付宝支付</a>
              
       <!--        <div class="gs"></div> -->
              <a href="<?php echo site_url('home/paySuccess')?>" class="am-cf adc"> &nbsp;<img src="skin/img/op.png" class="payimg" alt="">&nbsp;线下支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            </div>

      <?php else: ?>

            <a href="javascript:;" class="am-cf adc" onclick="mall();"><span class="am-icon-apple apple"></span>Apple Pay <span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            <a onclick="callpay()" href="javascript:;" class="am-cf adc"> &nbsp;<img src="skin/img/wp.png" class="payimg" alt="">&nbsp;微信支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            <a href="javascript:;" class="am-cf adc" onclick="mall();"> &nbsp;<img src="skin/img/zp.png" class="payimg" alt="">&nbsp;支付宝支付<span class="am-icon-angle-right am-fr  am-icon-xs"></span></a>
            
      <?php endif ?>

      


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

        function delrepaydata(){
          $.ajax({
            type:'post',
            url:'<?=site_url("orderWXPay/delpaydata")?>',
            data: 'id=1',
            success: function(data){

            }
          });
        }

        function mall(){
          alert('该功能暂时还没有开通，请用微信支付或会员卡支付');
        }
      </script>
</html>