<body>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/cailan');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    我的饭票
    </h1>
    
  </header>

  <!-- 可用饭票 -->
  
  <?php if(!empty($cards)):?>
  <div class="am-list-news-bd">
    <ul class="am-list acr">
      <?php foreach($cards as $val):?>
      <li class="am-g pflist">
        <a href="javascript:" class="flexDisplay">
          
          <div class="am-u-sm-9">
            <h5 class="black"><?=$val['coupponname']?></h5>
            <div class="am-text-xs gray">使用期限：<?php $nt = substr($val['begintime'],0,10);$a = str_replace("-",".",$nt);  echo $a;?> - <?php $et = substr($val['endtime'],0,10);$b = str_replace("-",".",$et); echo $b;?></div>
          </div>
          <div class="am-u-sm-3 fpr">
            <!-- <img src="skin/img/fprb.png"> -->
            <div class="am-text-right fpc">
              <span class="am-icon-cny"> <?=$val['coupponmoney']?></span>
              <?php if($val['usethreshold'] == NULL):?>
              <div>无门槛使用</div>
              <?php else:?>
              <div>满<?=$val['usethreshold'];?>使用</div>
              <?php endif;?>
            </div>
          </div>
        </a>
      </li>
      <?php endforeach;?>
    </ul>
  </div>
   <?php else:?>
  
  <div class="cardno">
    <img  class="am-block" src="skin/img/nocard.jpg" alt="">
    暂无可用饭票！
  </div>
  
  <?php endif;?>
</body>
</html>