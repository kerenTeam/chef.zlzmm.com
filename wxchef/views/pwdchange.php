<body>
<form action="" method="" id="form">
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
        <a href="javascript:" onclick="javascript:history.go(-1);">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <h1 class="am-header-title">
      修改密码
      </h1>
      <div class="am-header-right am-header-nav">
        <input type="submit" class="setf" value="确定">
      </div>
    </header>
<div class="am-list-news-bd">
  <ul class="am-list">

      <li class="am-g am-padding-sm cp">原密码<input type="password" class="tel gray am-fr opwd" value=""></li>
      <li class="am-g am-padding-sm cp">新密码<input type="password" class="tel gray am-fr npwd" value=""></li>
      <li class="am-g am-padding-sm cp">确认密码<input type="password" class="tel gray am-fr rnpwd" value=""></li>
  </ul>
</div>
 </form>
    <!-- footer -->
    <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default nav-bot">
      <ul class="am-navbar-nav am-cf am-avg-sm-4 am-shadow">
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
      <a href="<?php echo site_url('home/search')?>">
        <span class=""><img src="skin/img/ss.png" alt=""></span>
        <span class="am-navbar-label">搜索</span>
      </a>
    </li>
    <li>
      <a href="<?php echo site_url('home/ucent')?>" class="active">
        <span class=""><img src="skin/img/gr2.png" alt=""></span>
        <span class="am-navbar-label">我的</span>
      </a>
    </li>
      </ul>
    </div>
</body>
<script src="skin/js/jquery.min.js"></script>
<script>
  $(function(){
    $('#form').submit(function() { 
      var old = $('.opwd').val();
      var newp = $('.npwd').val();
      var rnew = $('.rnpwd').val(); 
      if(old ==''||newp ==''||rnew ==''){
        alert('请输入完整！');
        return false;
      }
      if(newp !== rnew){
        alert("密码确认错误！");
        $('.rnpwd').focus();
         return false;
      }

  })
  })
</script>
</html>