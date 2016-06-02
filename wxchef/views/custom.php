<link rel="stylesheet" type="text/css" href="skin/css/order.css">
<link href="skin/css/city.css" rel="stylesheet" type="text/css" />

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
   <!-- action="<?=site_url('home/customServ');?>" method="post" -->
  <div class="am-form am-form-horizontal">
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">区域</label>
      <div class="am-u-sm-10 customAdd" style="margin-top:-0.5rem;">
        
          <div class="demo">     
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
                    <i>请选择乡镇街道</i>
                    <ul>
                      <li><a href="javascript:void(0)" alt="请选择乡镇街道">请选择乡镇街道</a></li>
                    </ul>
                    <input type="hidden" name="cho_Insurer" value="">
                  </span>
                </div>
              </div> 
          </div>
      </div>
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
<script type="text/javascript" src="skin/js/jquery-1.8.0.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script type="text/javascript"> 
$(function(){
  $('.liststyle ul').css('overflow','scroll');
  $('.cusForm').live('click',function(){
      var phone = $("#phone").val();
      var city = $('input[name="cho_City"]').val();
      var area = $('input[name="cho_Area"]').val();
      var Insurer = $('input[name="cho_Insurer"]').val();
      var tableNum = $("#select1 option:selected").text();

      console.log(tableNum);
      if(area =='' || Insurer =='请选择乡镇街道'){
         alert("请输入详细区域");
         return false;
      }
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
              data:'phone='+phone+'&city='+city+'&area='+area+'&Insurer='+Insurer+'&tableNum='+tableNum,
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
<script type="text/javascript" src="skin/js/city4.city.js"></script>
<script type="text/javascript" src="skin/js/city4.js"></script>
</html>