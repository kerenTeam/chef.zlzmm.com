<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?=site_url('home/ucent');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    选择地址
    </h1>
    <div class="am-header-right am-header-nav edaddress"> 
        编辑 
    </div>
  </header>
  
  <div class="am-list-news-bd">
    <ul class="am-list odl">
    <?php if(!empty($address)):?>
      <?php foreach($address as $val):?>
      <li class="am-g am-cf lpt">
        <p class="am-fl">
        <?=$val['address'];?><br>
        <?=$val['name'];?>&nbsp;<?=$val['goodsphone'];?>
        </p>
        <div class="am-list-date edtclose">
        <a href="<?=site_url('home/deladdress?id=').$val['memberaddressid'];?>" class="am-fr red">删除</a>
        <a href="<?=site_url('home/editAddress?id=').$val['memberaddressid'];?>" class="am-fr green">修改</a>
        </div>
      </li>
    <?php endforeach;?>
    <?php else:?>
         <li class="am-g am-list-item-dated lilast am-padding-sm">
        你还没有添加收货地址！
            </li> 
    <?php endif;?>
      <li class="am-g am-list-item-dated lilast odl">
        <a href="<?php echo site_url('home/addressAdd2')?>" class="am-list-item-hd gray">新增地址
        <span class="am-list-date"><i class="am-icon-angle-right am-icon-sm"></i></span></a>
      </li> 
   
    </ul>
    
  </div>
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
      $('.edtclose').css('display','none');
      $('.edaddress').click(function() {
        if($('.edtclose').css('display') == 'none'){
           $(this).html('完成');
           $('.edtclose').css('display','block');
        }
        else{
           $(this).html('编辑');
           $('.edtclose').css('display','none');
        }
      });
   })
 </script>
</html>