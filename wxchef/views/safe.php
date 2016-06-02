<body>
<form action="<?=site_url('home/editpwd')?>" method="post" id="form">
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
        <a href="javascript:" onclick="javascript:history.go(-1);">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <h1 class="am-header-title">
      账号安全
      </h1>
     <div class="am-header-right am-header-nav">
	 <input type='hidden' value='<?=$userid;?>' name='userid'/>
	 <input type='hidden' value='<?=$pwd;?>' name='pwd'/>
        <input type="submit" class="setf" value="确定">
      </div> 
    </header>
<div class="am-list-news-bd">
  <ul class="am-list">

      <li class="am-g am-padding-sm safe">手机号<input type="tel" class="am-fr tel gray" readonly value="<?=$_SESSION['phone'];?>" > 
      </li>
	   <li class="am-g am-padding-sm cp">原密码<input type="password" class="tel gray am-fr opwd" name='userpwd'></li>
      <li class="am-g am-padding-sm cp">新密码<input type="password" class="tel gray am-fr npwd" name='newpwd'></li>
      <li class="am-g am-padding-sm cp">确认密码<input type="password" class="tel gray am-fr rnpwd" name='pwded'></li>

     
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
</html>