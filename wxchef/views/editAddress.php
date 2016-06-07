<link href="skin/css/city.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="http://cache.amap.com/lbs/static/main1119.css" />
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=5ea10305c1cb19f5289caf17d1424136"></script>
<script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
<style type="text/css" media="screen">
  #container {
    position:static;
    width: 100%;
    height: 100%;
}
#tip,.amap-logo,.amap-copyright{
  display:none;
}
 
</style>
<body>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?=site_url('home/ucent');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    新增地址
    </h1>
    
  </header>
  <br>
  <div class="am-g ammake" style="margin-top: -2rem;">
    <div class="">
      <form class="am-form afcheck" action="<?=site_url('home/addressedit');?>" method="post">
         <div class="mapAddress" style="overflow: hidden;">
                <div id='container'></div>
                <div id="tip"></div>
        </div>
        <fieldset class="am-form-set afiel">
       <!--  <div class="am-u-sm-2 am-text-right">地址</div>
        <div class="am-u-sm-10">
          <div class="demo" style="margin-top:-0.5rem;">     
              <div class="infolist"> 
                <div class="liststyle">
                  <span>
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
                      <li><a href="javascript:void(0)" alt="请选择乡镇街道">请选择街道</a></li>
                    </ul>
                    <input type="hidden" name="cho_Insurer" value="">
                  </span>
                </div>
              </div> 
          </div>
        </div>
		<div class="am-cf"></div> -->
    <div class="am-margin-sm">
          <img src="skin/img/addr.png" style="width: 2.5rem;" alt=""><span class="curAddress">成都市高新区天府五街美年广场。</span>
          <input type="hidden" value="">
        </div>
        <div class="am-u-sm-3 am-text-right">详细地址</div>
        <div class="am-u-sm-9">
          <input type="text" placeholder="请填写您的详细地址" class="uname" name='address' required>
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-3 am-text-right">姓名</div>
        <div class="am-u-sm-9">
          <input type="text" placeholder="请填写您的姓名" class="uname" name='name' required value="<?=$address[0]['name'];?>">
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-3 am-text-right">电话</div>
        <div class="am-u-sm-9">
          <input type="text" placeholder="请填写能够联系到您的电话号码" name='GoodsPhone' class="uphone" value="<?=$address[0]['goodsphone'];?>">
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-3 am-text-right">备用</div>
        <div class="am-u-sm-9">
          <input type="text" placeholder="备用联系电话（选填）" name='SparePhone' value="<?=$address[0]['sparephone'];?>"> 
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-12">
         <label class="am-checkbox am-success am-margin-left">
            设为默认 <input type="checkbox" name="IsDefault" value="1" data-am-ucheck <?php if($address[0]['isdefault'] == 1){echo "checked";}?>>
         </label>
        </div>
        <input type="hidden" value="<?=$address[0]['memberaddressid'];?>" name='id' />
        <button type="submit" class="am-btn am-center am-btn-block bred" style="width: 90%">保存</button>
      </form>
    </div>
  </div>
</body>
<!--  <script src="skin/js/jquery.min.js"></script> -->
<script type="text/javascript" src="skin/js/jquery-1.8.0.min.js"></script>
 <script src="skin/js/amazeui.min.js"></script>
 <script>
var map, geolocation;
//加载地图，调用浏览器定位服务
map = new AMap.Map('container', {
    resizeEnable: true
});
map.plugin('AMap.Geolocation', function() {
    geolocation = new AMap.Geolocation({
        enableHighAccuracy: true, //是否使用高精度定位，默认:true
        timeout: 10000, //超过10秒后停止定位，默认：无穷大
        buttonOffset: new AMap.Pixel(10, 20), //定位按钮与设置的停靠位置的偏移量，默认：Pixel(10, 20)
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
    var str = ['定位成功'];
    str.push('经度：' + data.position.getLng());
    str.push('纬度：' + data.position.getLat());
    str.push('精度：' + data.accuracy + ' 米');
    str.push('是否经过偏移：' + (data.isConverted ? '是' : '否'));
    document.getElementById('tip').innerHTML = str.join('<br>');
}
//解析定位错误信息
function onError(data) {
    document.getElementById('tip').innerHTML = '定位失败';
}
//地图js结束


 
   $(function(){
      
     $('.bred').click(function() { 
       // alert('还有信息未输入');
        var name = $('.uname').val();
        var address = $('.uaddress').val();
        var phone = $('.uphone').val();
        // var city = $('input[name="cho_City"]').val();
        // var area = $('input[name="cho_Area"]').val();
        // var Insurer = $('input[name="cho_Insurer"]').val();
        // if(area=='' || Insurer=='请选择街道' || address==''){
        //    // $('.bred').removeAttr('disabled');
        //    alert('请输入完整地址');
        //    return false;
        // }
        if(name==''){
           // $('.bred').removeAttr('disabled');
           alert('请输入用户名');
           return false;
        }
        if(phone==''){
           // $('.bred').removeAttr('disabled');
           alert('请输入电话号码');
           return false;
        }
        if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(phone))){
          alert("请输入正确电话号码");
          $('.uphone').focus();
          return false;
        }
       });
   })
 </script>
<script type="text/javascript" src="skin/js/city4.city.js"></script>
<script type="text/javascript" src="skin/js/city4.js"></script>
</html>