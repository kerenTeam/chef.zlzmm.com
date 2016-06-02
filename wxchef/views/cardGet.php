
  <body>
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
           <a href="<?php echo site_url('home/ucent');?>">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title"> 
            饭票 
      </h1>
 
  </header> 
  <!-- 领票 -->

  <div class="am-list-news-bd">
  <ul class="am-list">

      <li class="am-g am-list-item-dated">
          <a><img src="skin/img/quan.png" class="am-u-sm-7" alt="card"></a>
          <span class="am-list-date"> <button type="button" class="am-u-sm-5 am-btn am-btn-primary cardbtn" data-am-modal="{target: '#my-alert'}"> 领取
    </button></span>
      </li> 
  </ul>
   <a href="<?php echo site_url('home/card')?>" class="am-u-sm-12 am-btn bred go">查看我的饭票</a> 
  </div> 
  <!-- 弹框 -->
  <div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd"><!-- <img src="skin/img/chef.png" alt=""> --><i class="am-icon-check green"></i>饭票领取成功</div>
    <div class="am-modal-bd" style="font-size: 14px">
     该票截止日期：3月18号，<a class="red" href="<?php echo site_url('home/cailan')?>">立即使用</a>吧！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
  </body>
    <script src="skin/js/jquery.min.js"></script>
    <script src="skin/js/amazeui.min.js"></script>
</html>