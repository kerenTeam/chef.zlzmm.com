<style>
  .adda:hover,.adda:focus{
    color:black!important;
  }
  .liststyle i,.liststyle input{
    color:#333!important;
  }
</style>
<body>
  <link href="skin/css/city.css" rel="stylesheet" type="text/css" />
  <link href="skin/css/common.css" rel="stylesheet" type="text/css" />
  <!-- header -->
  <header data-am-widget="header" am-header-fixed class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href='<?php echo site_url('home/cart'); ?>'>
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    支付订单
    </h1>
  </header>
  <form action="<?php echo site_url('orderWXPay/payOrder');?>" method="post"> 
    <div class="am-list-news-bd">
      <ul class="am-list odl">
      <?php if(!empty($booking)):?>
<?php foreach ($booking as $k => $value): ?>
          <li class="am-g am-list-item-dated">
          <a href="javascript:" class="am-list-item-hd "><?php echo $value['foodname'];?> <span class="am-fr gray">X <?php echo $postBooking[$value['foodid']];?></span></a>
          <span class="am-list-date ath"><i class="am-icon-cny cc"></i><?php if($value['discountproportion']){$a = $value['foodprice']*$value['discountproportion'];}else{$a = $value['foodprice'];}  echo $a * $postBooking[$value['foodid']]; $pricetotal[] = $a * $postBooking[$value['foodid']]; ?> </span>
          <!-- 发送到order数据 -->
           <!--------------------这里是我的foodID ------------------------>
          <input type="hidden" name="foodid[]" value="<?php echo $value['foodid'];?> ">
           <!--------------------这里是我的numbers------------------------>
          <input type="hidden" name="numbers[]" value="<?php echo $postBooking[$value['foodid']];?>">
          <!-- 发送到order数据 END-->
        </li>
<?php endforeach ?>
<?php endif;?>
<!-- 服务员 -->
  <?php if(!empty($writes)):?>
    <?php if($writes['boy'] != 0):?>
        <li class="am-g am-list-item-dated">
        <a href="javascript:" class="am-list-item-hd "> 男服务员人数 <span class="am-fr gray">X <?php echo $writes['boy']; ?></span></a>
          <span class="am-list-date ath"><i class="am-icon-cny cc"></i> <?php echo $writes['boy']*80; ?></span>
          <input type="hidden" name="boy" value="<?php echo $writes['boy']; ?>">
        </li> 
      <?php endif;?>
      <?php if($writes['girl'] != 0):?>
        <li class="am-g am-list-item-dated">
        <a href="javascript:" class="am-list-item-hd "> 女服务员人数 <span class="am-fr gray">X <?php echo $writes['girl']; ?></span></a>
          <span class="am-list-date ath"><i class="am-icon-cny cc"></i> <?php echo $writes['girl']*80; ?></span>
          <input type="hidden" name="girl" value="<?php echo $writes['girl']; ?>">
        </li> 
      <?php endif;?>
      <?php endif;?>
      <!-- 庆典 -->
      <?php if(!empty($ceremony)):?>
        <li class="am-g am-list-item-dated">
              <a href="javascript:" class="am-list-item-hd "><?=$ceremony['name']?></a>
                <span class="am-list-date ath"><i class="am-icon-cny cc"></i> <?php $ceremoney=$ceremony['moneyall']; echo $ceremony['moneyall'];?></span>
                <input type="hidden" name="cereid" value="<?php echo $ceremony['celebrationid']; ?>">
              </li> 
      <?php endif;?>
      <!-- 庆典end -->
      <!-- 伴餐 -->
      <?php if(!empty($eleginfo)):?>
        <li class="am-g am-list-item-dated">
              <a href="javascript:" class="am-list-item-hd "><?=$eleginfo['title']?></a>
                <span class="am-list-date ath"><i class="am-icon-cny cc"></i> <?php $elegmoney=$eleginfo['money']; echo $eleginfo['money'];?></span>
                <input type="hidden" name="eleg" value="<?php echo $eleginfo['id']; ?>">
              </li> 
      <?php endif;?>
      <!-- 伴餐end -->

      <!-- 是否点菜满300 -->
      <?php if($pricetotal):?>
        <?php if (empty($servmoneydata)): ?>
        <li class="am-g am-list-item-dated">
        <a href="javascript:" class="am-list-item-hd "> 菜品消费额满300元,不收取服务费 <span class="am-fr gray"></span></a>
        </li> 
        <?php else: ?>
        <li class="am-g am-list-item-dated">
        <a href="javascript:" class="am-list-item-hd "> 服务费 <span class="am-fr gray"></span></a>
          <span class="am-list-date ath"><i class="am-icon-cny cc"></i> <?php echo $servmoneydata; ?></span>
        </li> 
        <?php endif ?>
      <?php endif;?>
        <!-- 是否点菜满300 end -->

        <li class="am-g am-list-item-dated">
          <a href="javascript:" class="am-list-item-hd red">订单总计:</a>
          <span class="am-list-date ath"><i class="am-icon-cny red" id='money'><?php if($pricetotal){$money = array_sum($pricetotal); }else{$money = 0;}if($elegmoney){$eleg= $elegmoney; }else{$eleg = 0;}if($ceremoney){$cere = $ceremoney;}else{$cere = 0;} echo $money + array_sum($writes)*80 + $servmoneydata + $eleg + $cere;?></i></span>
        </li>  

      </ul>
     </div>

  <?php if($pricetotal):?>
         <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
 <?php if(isset($_SESSION['phone'])){
        // 总金额
       $money = array_sum($pricetotal);
        
            // 优惠卷
            $fan = file_get_contents(POSTAPI."API_UserCoupon?UserPhone=".$_SESSION['phone']);
            $userphone = json_decode(json_decode($fan),true);
            if(!empty($userphone)){
              foreach ($userphone as $key => $value) {
                  if($money > $value['usethreshold']){
                      $usercoupon[$key] = $value;
                  }
              } 
            }
         }
  ?>
    <div class="am-shadow am-margin-vertical-sm fpa2">
       <?php if(empty($usercoupon)):?>
            
            <a href="javascript:;" class="am-cf adc">饭票<span class="am-fr am-icon-xs red">无可用饭票 </span></a>
      <?php else:?>

           <a class="am-cf adc fclick">饭票可用<?=count($usercoupon);?>张<span class="am-fr am-icon-xs red">选择 <span class="am-icon-angle-down"></span></span></a>
       <div class="am-list-news-bd" id="fpc" style="display: none">
      <ul class="am-list odl"> 
      <?php foreach($usercoupon as $val):?>
          <li class="am-g am-list-item-dated">
           <a href="javascript:" class="am-list-item-hd "><img src="<?php echo IP.$val['img'];?>" alt="<?=$val['coupponname']?>" class="cardimg"><?=$val['coupponname']?></a> 
           <input type="hidden" name="usercouponid" value="<?=$val['usercouponid']?>" id='couponid' />
           <span class="am-list-date ath"> <i class="am-icon-cny"><?=$val['coupponmoney'];?></i></span>
          </li>
        <?php endforeach;?>
      </ul>
     </div>
   <?php endif;?>
  <!-- 积分 -->
   <?php if(empty($jifen)):?>
      <a href="javascript:;" class="am-cf adc">积分<span class="am-fr am-icon-xs red">你还没有积分!</span></a>
      <input type="hidden" name='jifen' id="jifen" value="0" checked>
    <?php else:?>
       <a href="javascript:;" class="am-cf adc">积分<span class="am-fr am-icon-xs red"><span id='diyong'><?=abs($jifen);?></span>积分已抵用  <span class="am-icon-cny" id='jifenmoney'></span> <input type="checkbox" name='jifen' id="jifen" value="1"></span></a>
    <?php endif;?>

      <a href="javascript:;" class="am-cf adc">应付金额<span class="am-fr am-icon-xs am-icon-cny red" id='pricetotal'></span></a>

    </div>
  <?php endif;?>
        <input type="hidden" name='yfje' value="0" id='yfje'>

      <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />

     <div class="am-shadow am-margin-vertical-sm">
      <p class="htit sad"><span class="am-icon-map-marker red"></span> 服务地址</p>


      <!-- 未添加地址这显示 -->
      <div class="am-list-news-bd" >
          <?php if(empty($address)):?>
          <!-- 地址添加弹框 -->


    <!-- 地址添加弹框 -->


    <div class="tk" style="display: none;">
         <div class="tkcontent bwhite" style="background: white;border-radius: 5px;">
           <div class="tktxt2">
              <div class="am-text-center am-text-lg am-margin-top">地址添加</div>
              <div class="am-g ammake am-padding-sm">
               <div class="demo">     
                  <div class="infolist"> 
                    <div class="liststyle">
                      <span id="city">
                        <i>成都市</i>
                        <ul>
                          <li><a href="javascript:void(0)" alt="请选择城市">成都市</a></li>
                        </ul>
                        <input type="hidden" name="cho_City" value="成都市">
                      </span>
                      <span id="Area">
                        <i>请选择地区</i>
                        <ul>
                          <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>

                        </ul>
                        <input type="hidden" name="cho_Area" value="">
                      </span>
                      <span id="Insurer">
                        <i>请选择街道</i>
                        <ul>
                          <li><a href="javascript:void(0)" alt="请选择街道">请选择街道</a></li>
                        </ul>
                        <input type="hidden" name="cho_Insurer" value="">
                      </span>
                    </div>
                  </div> 
          </div>
		   <input type="text" class="am-form-field am-radius am-margin-bottom-sm ofp" placeholder="请输入详细地址" required id='address'/>
                <input type="tel" class="am-form-field am-radius am-margin-bottom-sm ofp" placeholder="请输入联系 电话" required id='GoodsPhone' value='<?=$_SESSION['phone'];?>'/>
                <input type="text" class="am-form-field am-radius am-margin-bottom-sm ofn" placeholder="请输入联系人姓名" required id='name'/>
                 <!-- <input type="text" class="am-form-field am-radius am-margin-bottom-sm ofa" placeholder="请输入用餐 地址" required id='Address'/> --> 
              
              </div> 
            </div>

          <button type='button' class="am-u-sm-6 bno gray closem" onclick="noorders();">取消</button>

          <button type='button' id="sub" class="am-u-sm-6 bno green">提交</button>
          </div>
     </div>

          <div id='mainContent'>
    
           <a href="javascript:;" id="model" class="am-cf adc">添加服务地址 <span class="am-icon-angle-right am-fr  am-icon-sm"></span></a>
           </div>

         <?php else:?>
            <!--------------    UserPhone   -------------->
   
                 <!-- 已添加过地址 -->

                 <ul class="am-list am-margin-top">
                 <?php foreach($address as $val):?>
                      <li class="am-g am-list-item-dated lpt2 mbtop">
                        <div class="am-margin-top-sm am-margin-left-sm">
                          <?=$val['name'];?>&nbsp;&nbsp;<?=$val['goodsphone'];?><br>
                        </div>
                         <a href="javascript:;" class="am-list-item-hd black adda"><?=$val['address'];?>
                        <label class="am-radio am-fr label"><input type="radio" class="am-margin-left green" name="memberaddressid" value="<?=$val['memberaddressid'];?>" data-am-ucheck checked></label>
          
                        </a>
                      </li>
                    <?php endforeach;?>
                    <?php if(count($address) <= 5):?>
                      <a href="<?php echo site_url('home/address2')?>" class="am-cf adc">添加服务地址 <span class="am-icon-angle-right am-fr  am-icon-sm"></span></a>
                    <?php endif;?>
                 </ul> 

          <?php endif;?>
        </div> 
        </div>

        <!-- 用餐时间 -->
        <div class="am-shadow am-margin-vertical-sm">  
         <p class="htit"><img src="skin/img/calendar.png" class="bpurple"> 用餐时间</p>
          <div class="demo am-margin-sm">
            <div class="lie">日期:<input  id="beginTime" class="kbtn am-radius" name='riqi' required/></div>
          </div>
          <div id="datePlugin"></div>
          <div class="am-margin-sm am-cf">
          <span class="am-fl">时间:</span>
          <input type="hidden" id="timeEat" name='time' value="">
          <table class="am-table am-table-bordered am-fl" style="width: 80%;margin-left:5px;">
          <tr>
            <td>10:00</td>
            <td>11:00</td>
            <td>11:30</td>
            <td>12:00</td>
        </tr>
        <tr>
            <td>12:30</td>
            <td>13:00</td>
            <td>14:30</td>
            <td>15:00</td>
        </tr>
        <tr>
            <td>16:00</td>
            <td>17:00</td>
            <td>17:30</td>
            <td>18:00</td>
        </tr>
        <tr>
            <td>18:30</td>
            <td>19:00</td>
            <td>19:30</td>
            <td>20:00</td>
        </tr>
          </table>
          </div>
       
      </div>
      <input type="hidden" name="UserPhone" value="<?=$_SESSION['phone'];?>"/>

      <?php if(!empty($address)):?>
          <button type="submit" class="am-u-sm-12 am-btn bgreen os" id="pay">去支付</button>
      <?php else:?>
          <button type="button" class="am-u-sm-12 am-btn bgreen os firstPay" id="pay">去支付</button>
      <?php endif;?>
  
    </form>
 
  </body>
<!--  <script src="skin/js/jquery.min.js"></script> -->
<script type="text/javascript" src="skin/js/jquery-1.8.0.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script type="text/javascript" src="skin/js/date.js" ></script>
<script type="text/javascript" src="skin/js/iscroll.js" ></script>
 <script>
        var payable = '';
        var jine = '';
        var discount =0;
        //总金额
        var dijifen = $('#diyong').text();
        jine = dijifen/100;
        $('#jifenmoney').text(jine.toFixed(2));
        var amount = $('#money').text();

        payable = amount;
        $('#pricetotal').text(payable); 
        $('#yfje').val(payable);
        var jifenmoney = 0;
        // 积分
     
        
      
      $(function(){
        var adate = $('#beginTime');
        var html;
        var date = new Date();
        var month = date.getMonth() + 1;
        var m =(month <10) ? '0'+month : month;
            month = m;
        var day = date.getDate();
        var d =(day <10) ? '0'+day : day;
            day=d;
        var year = date.getFullYear(); 
        var hour = date.getHours();
        var minutes = date.getMinutes();
        var b =(minutes <10) ? '0'+minutes : minutes;
            minutes =b;
        var curTime = hour+2+":"+minutes;
         html=year+'-'+month+'-'+day;
       adate.attr('placeholder',html+" 默认");
       adate.val(html);
       console.log(html);
         // 弹出添加地址弹框
         $('#model').live('click',function() {
          //$('.tkp').css('display','');
          // $('body').css('overflow-y','hidden');
          $('.tk').fadeIn(400);
        });
         $('.closem').live('click',function() { 
          // $('body').css('overflow-y','auto');
          $('.tk').fadeOut(400); 
        });

        $('.fclick').click(function() {
          
           $('#fpc').slideToggle(400);          
        });
        $('#fpc li').click(function() {
          $('#fpc').slideUp(400);
          $('.fclick').html('饭票<span class="am-fr am-icon-xs red">'+$(this).find('.am-list-item-hd').text()+'<input type="hidden" name="couponid" value="'+$(this).find('#couponid').val()+'" /><span class="am-icon-cny" id="youhui" >'+$(this).find('.am-icon-cny').html()+'</span></span>');
            discount = $('#youhui').text();
            payable = (amount - discount - jifenmoney).toFixed(2);
            if(payable<0){
               payable = 0;
            }
            $('#pricetotal').text(payable);
            $('#yfje').val(payable);

        });

         $('#jifen').live('click',function(){

           if($('#jifen').prop("checked")){

           // alert(jifenmoney);
            jifenmoney = $('#jifenmoney').text();
            payable = (amount - discount - jifenmoney).toFixed(2);
            if(payable<0){
               payable = 0;
            }
            $('#pricetotal').text(payable);
            $('#yfje').val(payable);
    
        }else{
           payable = (amount - discount).toFixed(2);
            $('#pricetotal').text(payable);
            $('#yfje').val(payable);
        }
        })
        $('#sub').live('click',function() { 
            var phone = $('input[type="tel"]').val();
            var area = $('input[name="cho_Area"]').val();
            var Insurer = $('input[name="cho_Insurer"]').val();
     
          if( $('.ofp').val()==''||$('.ofa').val()==''||$('.ofn').val()==''||area==''||Insurer=='请选择街道'){
              alert('还有信息未输入');
              $(this).focus();
              return false;
            }
          if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(phone))){
            alert('请输入正确的电话号码');
            $('.ofp').focus();
              return false;
          }
          else{
            getorders();
          }
        });

            $('#beginTime').date();
            $('#endTime').date({theme:"datetime"});
            // if($('#timeEat').val()==''){
            //   $('#pay').attr('disabled','disabled');
            // }  
              console.log($('#beginTime').val());

              $('td').each(function(){ 
                if($(this).html()>curTime){
                  $(this).addClass('can');
                }else{
                  $(this).attr({
                    disabled: 'disabled'
                  });
                  $(this).css('color','#eee')
                }
              })
               $('#dateconfirm').live('click',function(){  
                 console.log($('#beginTime').val()); 

                 $('td').removeClass('can am-danger');
                 $('#pay').attr({
                    disabled: 'disabled'
                  });
              if(html!=$('#beginTime').val()){ 
                 console.log($('#beginTime').val()); 
                 $("td").css('color','')
                 $('td').removeAttr('disabled');
                 $('td').addClass('can'); 
             }else{ 

              $('td').each(function(){ 

                if($(this).html()>curTime){
                  $(this).addClass('can');
                }else{
                  $(this).attr({disabled: 'disabled'});
                  $(this).css('color','#eee')
                }
              })
             }   
             });
              $('td').click(function() { 
                if($(this).hasClass('can')){
               $('#pay').removeAttr('disabled');
               $('td').removeClass('am-danger');
               $(this).addClass('am-danger');
               $('#timeEat').val($(this).html());
             }else{
               return;
             }
              }); 
            $('.firstPay').live('click',function(){

              if(!$('#mainContent').has('li').length){
                alert('请添加服务地址');
                return false;
              }
              if($('#timeEat').val()==''){
              alert('请添加用餐日期');
               return false;
            }  
            })
             $('#pay').live('click',function(){ 
              if($('#timeEat').val()==''){
              alert('请添加用餐日期');
               return false;
            }  
            })
      })

function getorders(){
            var name=$('#name').val();
            var city = $('input[name="cho_City"]').val();
            var area = $('input[name="cho_Area"]').val();
            var Insurer = $('input[name="cho_Insurer"]').val();
            var phone=$('#GoodsPhone').val(); 
            var address=$('#address').val(); 
            $.ajax({
               type: "POST",
               url: "<?=site_url('pricesearch/payOrder');?>",
               data: 'GoodsPhone='+phone+"&city="+city+"&area="+area+"&Insurer="+Insurer+"&name="+name+'&address='+address,
               success: function(msg){ 
                  console.log(msg);
                  $('#mainContent').html('<ul class="am-list am-margin-top" style="margin-bottom:0;"><li class="am-g am-list-item-datedlpt2 mbtop"><div class="am-margin-top-sm am-margin-left-sm">'+name+'&nbsp;&nbsp;'+phone+'<br></div><a href="javascript:;" class="am-list-item-hd black adda">'+city+area+Insurer+address+'<label class="am-radio am-fr label"><input type="radio" class="am-margin-left green" name="memberaddressid" value="'+msg+'" data-am-ucheck checked></label></a></li></ul><a href="<?php echo site_url('home/address2')?>" class="am-cf adc">添加服务地址 <span class="am-icon-angle-right am-fr  am-icon-sm"></span></a>'); 
                $('#pay[type=button]').prop('type','submit');
               }
            });
            $('.tk').fadeOut(400);
}
 

    </script> 
<script type="text/javascript" src="skin/js/city4.city.js"></script>
<script type="text/javascript" src="skin/js/city4.js"></script>
</html>