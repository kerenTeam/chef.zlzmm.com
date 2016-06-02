<link rel="stylesheet" type="text/css" href="skin/css/order.css">
<link href="skin/css/city.css" rel="stylesheet" type="text/css" />
<body class="bpa">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="javascript:" onclick="javascript:history.go(-1);">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    <?=$foods[0]['foodname'];?>
    </h1>
    
  </header>
  <script>
// 增加菜品数量
  function addcart(){
      var id = "<?=$foods[0]['foodid'];?>";
      var number = $('.numTxt').val();
      var code = '1';
      var shopid = "";
      // alert(number);
       $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/foodaddcart'); ?>',
            data: 'foodid='+id+'&numbers='+number+'&code='+code+'&shopid='+shopid,
            success: function(data) {
               // console.log(data);
            }
        });
         
  }
  // 减少菜品数量
 function delcart(){
        var id = "<?=$foods[0]['foodid'];?>";
        var number = $('.numTxt').val();
        var code = '1';
        var shopid = "";
      
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/foodaddcart'); ?>',
            data: 'foodid='+id+'&numbers='+number+'&code='+code+'&shopid='+shopid,
            success: function(data) {
               // console.log(data);
            }
        });
  }


</script>
  <!-- 详情 -->
  <form action="<?=site_url('home/foodaddcart');?>" method="post" enctype="mutiltype/data">
    <div class="foodinfo am-shadow">
      <!-- <div class=""><img src="skin/img/party1.png" class="am-img-responsive card" alt="大厨到家"></div> -->
             <div data-am-widget="slider" class="am-slider am-slider-c3" data-am-slider='{"controlNav":false}' >
          <ul class="am-slides">
          <?php foreach($foodspic as $val):?>
              <li>
                  <a href="javascript:;"><img src="<?=IP.$val['imgaddress'];?>" />
                  </a>
                 
              </li>
            <?php endforeach;?>
            
          </ul>
        </div>
      <div class="am-g">
         <h2><?=$foods[0]['foodname'];?></h2>
          <div class="tbref"><?=$foods[0]['foodtrait'];?></div>
      </div>
      <!-- <p class="am-text-center menutit">宴会菜单</p> -->
      <?php  echo str_replace('&nbsp;', ' ',htmlspecialchars_decode($foods[0]['packagedetails'])) ;?>
  
  
     <!--  <p class="am-text-center am-text-sm  menuname">凉菜</p>

        <p class="am-text-center am-text-sm">老成都拌土鸡元</p>
        <p class="am-text-center am-text-sm">辣鲜手剥笋</p>
        <p class="am-text-center am-text-sm">捞汁珊瑚蜇头</p>
        <p class="am-text-center am-text-sm">田七伴桃仁</p>
        <p class="am-text-center am-text-sm">客家卤汁九香鸭</p>
        <p class="am-text-center am-text-sm">酸辣汁黑木耳</p>
        <p class="am-text-center am-text-sm">巴蜀豆花</p>

      <p class="am-text-center am-text-sm  menuname">热菜</p>

        <p class="am-text-center am-text-sm">白灼基围虾</p>
        <p class="am-text-center am-text-sm">百年全家福</p>
        <p class="am-text-center am-text-sm">双椒蒸江团</p>
        <p class="am-text-center am-text-sm">山地土豆烧甲鱼</p>
        <p class="am-text-center am-text-sm">馋嘴呱呱叫</p>
        <p class="am-text-center am-text-sm">石锅酱仔排</p>
        <p class="am-text-center am-text-sm">香辣仔兔</p>
        <p class="am-text-center am-text-sm">川味小炒肉</p>
        <p class="am-text-center am-text-sm">豆豉鲮鱼油麦菜</p>
        <p class="am-text-center am-text-sm">百合苡仁老南瓜</p>
        <p class="am-text-center am-text-sm">腊味荷兰豆</p>
        <p class="am-text-center am-text-sm">清炒时蔬</p>

      <p class="am-text-center am-text-sm  menuname">汤</p>

        <p class="am-text-center am-text-sm">酸萝卜老鸭汤</p>
        
        <p class="am-text-center am-text-sm  menuname">小吃</p>
        
        <p class="am-text-center am-text-sm">波记小丝煎饺</p>
        <p class="am-text-center am-text-sm">冰糖银耳羹</p>

      <p class="am-text-center am-text-sm  menuname">主食</p>
        <p class="am-text-center am-text-sm">米饭</p> -->
      
      <div class="am-g">
        <input type="hidden" name='foodid' value="<?=$foods[0]['foodid']?>" />
        <input type="hidden" name='shopid' value="" />
        <input type="hidden" name='code' value="1" />
        <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$foods[0]['foodprice'];?></span>/<small>桌</small></div>
        <div class="foodNum">

          <span class="reduce am-icon-minus-circle" onClick="handle(this, false),addcart()"></span>
          <input type="text" class="numTxt" name="numbers" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" value="<?php if(isset($foods[0]['number'])){echo $foods[0]['number'];}else{echo '0';}?>">
          <span class="add am-icon-plus-circle" onClick="handle(this, true),delcart()"></span>
        </div>
      </div>

    </div> 
  <div class="customBanner">
    <a href="<?=site_url('home/customServ');?>"><img src="skin/img/custom.png" alt=""></a>
  </div>
<!--    <div class="am-form am-form-horizontal customForm am-cf am-shadow">
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
                    <input type="hidden" name="cho_City" value="请选择城市">
                  </span>
                  <span id="Area">
                    <i>请选择地区</i>
                    <ul>
                      <li><a href="javascript:void(0)" alt="请选择地区">请选择地区</a></li>

                    </ul>
                    <input type="hidden" name="cho_Area" value="请选择地区">
                  </span>
                  <span id="Insurer">
                    <i>请选择乡镇街道</i>
                    <ul>
                      <li><a href="javascript:void(0)" alt="请选择乡镇街道">请选择乡镇街道</a></li>
                    </ul>
                    <input type="hidden" name="cho_Insurer" value="请选择乡镇街道">
                  </span>
                </div>
              </div> 
          </div>
      </div>
    </div>
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">桌数</label>
      <div class="am-u-sm-10">
        <select class="am-radius">
          <option>请选择您的用餐桌数</option>
          <option>10桌以下</option>
          <option>10~20桌</option>
          <option>20~30桌</option>
          <option>30桌以上</option>
        </select>
      </div>
    </div>
    <div class="am-form-group">
      <label class="am-u-sm-2 am-text-right">电话</label>
      <div class="am-u-sm-10">
        <input id="phone" class="am-radius" type="tel" placeholder="请输入你的联系电话">
        <p class="customP">输入电话，客服稍后会给您回电</p>
      </div>
      <div class="am-u-sm-1"></div>
    </div>-->
  <!-- footer -->
<!--    <div class="customBtn am-margin-bottom-sm">
      <button type="button" class="am-btn am-btn-danger customSubmit">提 交</button>
    </div> -->
  <!-- modal -->
  <!--   <div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
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
  </div>  -->

    <!-- 评价 -->
    <div class="am-shadow am-margin-top am-cf">
      <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
        <h2 class="am-titlebar-title ">
        消费评价
        </h2>
      </div>
      <div class="am-u-sm-5 am-text-center">
        <span class="red am-text-xxl">10</span>分<br>
        <span class="am-text-xs red"><i class="am-icon-star "></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i><i class="am-icon-star"></i></span><br>
        <span class="am-text-xs"> 共0人评价</span>
        
      </div>
      <div class="am-u-sm-7 stars">
        <p class="am-text-xs"><span class="am-text-right">菜品</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 5分</p>
        <p class="am-text-xs"><span class="am-text-right">厨师</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 5分</p>
        <p class="am-text-xs"><span class="am-text-right">服务员</span> <i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i><i class="am-icon-star red"></i> 5分</p>
      </div>
      <hr data-am-widget="divider" style="" class="am-divider am-divider-dashed" />
      <!-- 文字评论 -->
      <?php if(!empty($evaluate)):?>
            <?php foreach($evaluate as $v):?>
          <div class="am-shadow">
            <header class="am-comment-hd">
              <!--<h3 class="am-comment-title">评论标题</h3>-->
              <div class="am-comment-meta">
                <a href="#link-to-user" class="am-comment-author"><img src="<?=IP.$v['userimage'];?>" class="am-circle comimg" alt=""><?php if($v['username'] == ''){echo $v['userphone'];}else{echo $v['username'];}?></a>
                <time datetime="2013-07-27T04:54:29-07:00" class="am-fr"><?php echo substr($v['createtime'],0,10);?></time>
              </div>
            </header>
            <div class="am-comment-bd am-text-xs">
              <?=$v['comment'];?>
            </div>
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-4 am-gallery-default" data-am-gallery="{ pureview: true }" >
            <?php 
            $pinimg = file_get_contents(POSTAPI.'API_Food?dis=splimg&foodid='.$v['id']);
            $arrimg = json_decode(json_decode($pinimg),true);
            ?>
            <?php if(!empty($arrimg)):?>
              <?php foreach($arrimg as $val):?>
          <li>
            <div class="am-gallery-item">
                <a href="<?=IP.$val['address']?>" class="">
                  <img src="<?=IP.$val['address']?>"/>
                </a>
            </div>
          </li>
        <?php endforeach;?>
        <?php endif;?>
      </ul>
          </div>
        <?php endforeach;?>
      <?php else:?>
         <div class="am-comment-bd am-text-xs">
             暂无评论！
          </div>
        <?php endif;?>
    </div>

    <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" style="bottom:48px;" id="">
      <a href="<?php echo site_url('home/order')?>">
        <div class="am-u-sm-8 green a">
          <img src="skin/img/cl.png" class="cartImg" alt=""><span id="fen" class="allmoney">0</span>份
          <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red">0</span>
        </div>
        <div class="am-u-sm-4 b">
          
          <button type="submit" class="am-btn am-btn-success tijiao">确定</button>
          
        </div>
      </a>
    </div>
  </form>
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
<script type="text/javascript" src="skin/js/jquery-1.8.0.min.js"></script> 
<script src="skin/js/amazeui.min.js"></script>
<script src="skin/js/num_cailan.js"></script>
  <script>
  $(function(){
      var inputs = $('.numTxt');

          inputs.each(function() {
     var numI=$(this).val();
        if(numI == 0){
        $(this).css('display','none');
        $(this).parent('.foodNum').find('.reduce').css('display','none'); 
      }
      else{
        $(this).css('display','inline-block');  
        $(this).parent('.foodNum').find('.reduce').css('display','inline-block');
      }
   });

  
  })
    $('.customSubmit').live('click',function(){
      var phone = $("#phone");
        if(phone.val() == ''){
          alert("请输入手机号");
        }else if(!(/^1((3|4|5|8|7){1}\d{1}|70)\d{8}$/.test(phone.val()))){
          alert("请输入正确的手机号");
        }else{
          
          $('#doc-modal-1').modal('open')
          return false;
        }
      return false;
    })
</script>
<script type="text/javascript" src="skin/js/city4.city.js"></script>
<script type="text/javascript" src="skin/js/city4.js"></script>
</body>
</html>