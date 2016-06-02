<link href="skin/css/city.css" rel="stylesheet" type="text/css" />
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
  <div class="am-g ammake">
    <div class="">
      <form class="am-form afcheck" action="<?=site_url('home/addressedit');?>" method="post">
        <fieldset class="am-form-set afiel">
        <div class="am-u-sm-2 am-text-right">地址</div>
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
		<div class="am-cf"></div>
        <div class="am-u-sm-2 am-text-right">详细地址</div>
        <div class="am-u-sm-10">
          <input type="text" placeholder="请填写您的详细地址" class="uname" name='address' required>
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-2 am-text-right">姓名</div>
        <div class="am-u-sm-10">
          <input type="text" placeholder="请填写您的姓名" class="uname" name='name' required value="<?=$address[0]['name'];?>">
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-2 am-text-right">电话</div>
        <div class="am-u-sm-10">
          <input type="text" placeholder="请填写能够联系到您的电话号码" name='GoodsPhone' class="uphone" value="<?=$address[0]['goodsphone'];?>">
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-2 am-text-right">备用</div>
        <div class="am-u-sm-10">
          <input type="text" placeholder="备用联系电话（选填）" name='SparePhone' value="<?=$address[0]['sparephone'];?>"> 
        </div>
        <div class="am-cf"></div>
        <div class="am-u-sm-12">
         <label class="am-checkbox am-success am-margin-left">
            设为默认 <input type="checkbox" name="IsDefault" value="1" data-am-ucheck <?php if($address[0]['isdefault'] == 1){echo "checked";}?>>
         </label>
        </div>
        <input type="hidden" value="<?=$address[0]['memberaddressid'];?>" name='id' />
        <button type="submit" class="am-btn am-center am-btn-block bred" style="width: 90%" disabled>保存</button>
      </form>
    </div>
  </div>
</body>
<!--  <script src="skin/js/jquery.min.js"></script> -->
<script type="text/javascript" src="skin/js/jquery-1.8.0.min.js"></script>
 <script src="skin/js/amazeui.min.js"></script>
 <script>
   $(function(){
      
      $('input[type="text"]').keyup(function() { 
        var name = $('.uname').val();
        // var address = $('.uaddress').val();
        var phone = $('.uphone').val();
        var city = $('input[name="cho_City"]').val();
        var area = $('input[name="cho_Area"]').val();
        var Insurer = $('input[name="cho_Insurer"]').val();
        if(name!='' && area!='' && phone!='' && Insurer!='请选择乡镇街道'){
            $('.bred').removeAttr('disabled');
      }else{
           $('.bred').attr('disabled','disable');
      } 
      });
      $('.liststyle span').live('click',function(){
        if(name!='' && area!='' && phone!='' && Insurer!='请选择乡镇街道'){
           $('.bred').removeAttr('disabled');
         }else{
           $('.bred').attr('disabled','disable');
      }
      })
      $('.afcheck').live('submit',function() { 
        
        if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test($('.uphone').val()))){
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