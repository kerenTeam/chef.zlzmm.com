<body>
<style type="text/css" media="screen">
  .am-selected{
        width: 100%;
    height: 4rem;
    line-height: 4rem;
    border: 1px solid rgb(210, 208, 208);
    border-radius: 0;
    box-shadow: 0px 0px 6px rgba(0,0,0,0.1); 
     margin: auto;
  }
textarea{
  width: 100%;
   box-shadow: 0px 0px 6px rgba(0,0,0,0.1); 
     margin: auto;
     border-color:#eee;
}
.am-selected-btn{
  background:none!important;
  outline:none;
}
</style>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?=site_url('home/index');?>" >
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    退款申请
    </h1> 
  </header> 
   <div class="am-g am-padding-sm">
    
<form action="" data-am-validator> 
 <h2 class="">退款原因<span class="red">*</span></h2>
     <select name="test" class="am-text-center" placeholder="选择退款原因" data-am-selected="{btnWidth: '100%', btnSize: 'lg'}" required>
     <option selected value=""></option>
    <option value="a">不想买了</option>
    <option value="b">买错了</option>
    <option value="o">未按约定时间服务</option>
    <option value="o">其他原因</option>
  </select> 

  <h2 class="">退款说明<span class="red">*</span></h2>
<textarea name="" class="am-padding-sm" placeholder="说明" rows="4"></textarea>
  <p class="fixButton">
    <button type="submit" class="am-btn am-btn-primary am-btn-success">提交</button>
  </p>
</form>
   </div>
</body>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script>
  $(function(){
    $('form').on('submit',function(){
       if($('select option:selected').val()==''){
      alert('请选择退款原因')
    }
    })
   
  })
</script>
</html>