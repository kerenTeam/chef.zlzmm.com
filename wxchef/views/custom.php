<link rel="stylesheet" type="text/css" href="skin/css/order.css">
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css"/>
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=61eb3dd738aebf40b63eacbf3c447bdf"></script>
<!-- <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script> -->
<!-- 逆地理编码 js  -->
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=61eb3dd738aebf40b63eacbf3c447bdf&plugin=AMap.Geocoder"></script>
<body class="customBody">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    客服
    </h1>
  </header>
  <div class="customBanner">
    <img src="skin/img/custom.png" alt="">
  </div>  
  <div  id='container' style="max-height: 250px !important;top:49px;"></div>
    <div id="tip" style="top:70px;">
      <span id="resultaddress"></span>
    </div>
  <div class="am-form am-form-horizontal" style="margin-top: 16rem;margin-bottom: 6rem;">
  
    <div  class="am-text-center" style="margin-top:10rem;">
      <img src="skin/img/addr.png" style="width: 2.5rem;" alt="">
      <span id="myaddressSpan"></span>
      <input type="hidden" name="myaddress" id="resultaddresstext" value="234567">
    </div>
    <br>
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">地址</label>
      <div class="am-u-sm-10">
        <input id="address" class="am-radius" type="text" placeholder="定位不准确？" name="address"> 
      </div>
      <div class="am-u-sm-1"></div>
    </div>
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">桌数</label>
      <div class="am-u-sm-10">
        <select class="am-radius" id="select1" name="number">
          <option>请选择您的用餐桌数</option>
          <option value="10桌以下">10桌以下</option>
          <option value="10~20桌">10~20桌</option>
          <option value="20~30桌">20~30桌</option>
          <option value="30桌以上">30桌以上</option>
        </select>
      </div>
    </div>
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">电话</label>
      <div class="am-u-sm-10">
        <input id="phone" class="am-radius" type="tel" placeholder="请输入你的联系电话" name="phone" value="<?php if(isset($_SESSION['phone'])){echo $_SESSION['phone'];}?>">
        <p class="customP">输入电话，客服稍后会给您回电</p>
      </div>
      <div class="am-u-sm-1"></div>
    </div>
    <!-- footer -->
    <!-- <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot"> -->
    <div class="customBtn">
      <button type="submit" class="btn am-btn am-btn-danger cusForm">提 交</button>
    </div>
    <!-- </div> -->
    <!-- modal -->
    <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
      <div class="am-modal-dialog am-radius">
        <div class="am-modal-hd am-text-danger">提 示
          <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd customBtn">
          <p class="customModalP">客服正在处理。<br>请留意我们给您的去电(400-820-1790)</p>
          <a href="javascript:;" class="btn am-btn am-btn-sm am-btn-danger am-radius" data-am-modal-close>好</a>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
    <ul class="am-navbar-nav am-cf am-avg-sm-5 am-shadow">
      <li >
        <a href="<?php echo site_url('home/index')?>">
          <span class=""><img src="skin/img/home1.png" alt=""></span>
          <span class="am-navbar-label">首页</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('home/cart')?>">
          <span class=""><img src="skin/img/clz.png" alt=""></span>
          <span class="am-navbar-label">菜篮子</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('home/find')?>">
          <span class="find">发现</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('home/customServ')?>">
          <span class=""><img src="skin/img/kf.png" alt=""></span>
          <span class="am-navbar-label">客服</span>
        </a>
      </li>
      <li>
        <a href="<?php echo site_url('home/ucent')?>">
          <span class=""><img src="skin/img/gr1.png" alt=""></span>
          <span class="am-navbar-label">我的</span>
        </a>
      </li>
    </ul>
  </div>
</body>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script type="text/javascript">
var map,
geolocation,
lnglatXY;
//加载地图，调用浏览器定位服务
map = new AMap.Map('container', {  resizeEnable: true, zoom: 64});
map.plugin('AMap.Geolocation', function() {
geolocation = new AMap.Geolocation({
enableHighAccuracy: true, //是否使用高精度定位，默认:true
timeout: 10000, //超过10秒后停止定位，默认：无穷大
buttonOffset: new AMap.Pixel(15, 1), //定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
zoomToAccuracy: true, //定位成功后调整地图视野范围使定位位置及精度范围视野内可见，默认：false
buttonPosition: 'RB',
panToLocation: true, //定位成功后将定位到的位置作为地图中心点，默认：true
});
map.addControl(geolocation);
geolocation.getCurrentPosition();
AMap.event.addListener(geolocation, 'complete', onComplete); //返回定位信息
AMap.event.addListener(geolocation, 'error', onError); //返回定位出错信息
});
//解析定位结果
function onComplete(data) {
lnglatXY = [data.position.getLng(), data.position.getLat()]; //已知点坐标
regeocoder(lnglatXY);
// var str = ['定位成功'];
//         str.push('经度：' + data.position.getLng());
//         str.push('纬度：' + data.position.getLat());
//         str.push('精度：' + data.accuracy + ' 米');
//         str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
//         document.getElementById('tip').innerHTML = str.join('<br>');
}
//解析定位错误信息
function onError(data) {
document.getElementById('tip').innerHTML = '定位失败';
}
function regeocoder(xyData) { //逆地理编码
var geocoder = new AMap.Geocoder({radius: 1000, extensions: "all"});
geocoder.getAddress(xyData, function(status, result) {
if (status === 'complete' && result.info === 'OK') {
geocoder_CallBack(result);
}
});
var marker = new AMap.Marker({ //加点
map: map,
position: xyData
});
map.setFitView();
}
function geocoder_CallBack(data) {
var address = data.regeocode.formattedAddress; //返回地址描述
document.getElementById("resultaddress").innerHTML = address;
document.getElementById("resultaddresstext").value = address;
document.getElementById("myaddressSpan").innerHTML = address;
}
</script>
<script type="text/javascript">
$(function(){
$('.liststyle ul').css('overflow','scroll');
$('.cusForm').on('click',function(){
var phone = $("#phone").val();
var adr = $("#address").val();
var tableNum = $("#select1 option:selected").text();
var address = $("#resultaddresstext").val();
console.log(tableNum);

if(tableNum == '请选择您的用餐桌数'){
alert("请选择您的用餐桌数");
return false;
}
if(phone == '' || !(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(phone))){
alert("请输入正确的手机号");
$('#phone').focus();
return false;
}
$.ajax({
type:"POST",
url:'<?=site_url('pricesearch/customSer');?>',
data:'phone='+phone+'&tableNum='+tableNum+'&address='+address+'&addressWrite='+adr,
success:function(data){
console.log(data);
if(data == 1){
$('#doc-modal-1').modal('open');
return false;
}
}
})

})
})

</script>
</html>