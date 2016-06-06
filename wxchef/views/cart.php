
<body>
  <!-- header -->
  <header data-am-widget="header" class="am-header am-header-default topform bheader"> <!-- am-header-fixed header固定在顶部-->
  <div class="am-header-left am-header-nav">
    <a href="<?php echo site_url('home/cailan')?>">
      <i class="am-header-icon am-icon-chevron-left"></i>
    </a>
  </div>
  <h1 class="am-header-title">
      菜篮子
  </h1>
  <div class="am-header-right am-header-nav">
      <a href="javascript:;" onClick="$('#my-confirm').modal('open');">
        清空
      </a> 
      
    </div>
</header>

<script type="text/javascript">
function doaction(obj) {
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/addcart'); ?>',
            data: $(obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode).serialize(),
            success: function(data) {
              //  console.log(data);
            }
        });
    }
// 减少菜品数量
 function delcart(obj){
  // alert(123);
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/deletecart'); ?>',
            data: $(obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode).serialize(),
            success: function(data) {
               console.log(data);
            }
        });
  }
</script>
 
<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    
    <div class="am-modal-bd">
      确认清空购物车吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn gray" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn green" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<form action="<?=site_url('orderWXPay/order');?>" method="post" enctype="multipart/form-data">
  <div data-am-widget="list_news" class="am-u-sm-12 asp cmn">
    <div class="cmn cmnb am-list-news am-list-news-default" >
      <div class="am-list-news-bd pabo">
       <?php if(!empty($carts)):?>
        <?php unset($_SESSION['booking']); foreach($carts as $k=>$val):?>
        <div class="am-text-center oln">
        <?php switch ($k) {
          case 'diancai':
            echo "点菜";
            break;
          case 'taocan':
            echo "套餐";
            break;
          case 'jincai':
            echo "净菜";
            break;
        }?></div>
          <ul class="am-list cul">
      <?php foreach($val as $cart):?>
      <?php 

        $id = $cart['foodid'];
        $shopid = $cart['shopid'];
        $foods = file_get_contents(POSTAPI."API_Food?dis=xq&foodid=".$id);
        $foodjson = ltrim(rtrim($foods,'"'),'"');
        $a =   str_replace('\"','"',$foodjson);
        $food= json_decode($a,true);
        // 缓存
        $f[] = $food;
        if(!isset($_SESSION['booking'])){
           $this->session->set_userdata('booking',$f);
        }else{
            $this->session->set_userdata('booking',$f);
        }
   
      ?>
             <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
              <div class="am-u-sm-3 am-text-center am-list-thumb">
                <a href="<?php echo site_url('home/food?id=').$food['foodid'].'&number='.$cart['number'].'&shopid='.$shopid;?>" class="vimg">
                  <img src="<?php echo IP.$food['thumbnail'];?>" id="img" alt="<?=$food['foodname'];?>"/>
                </a>
              </div>
              <div class=" am-u-sm-9 am-list-main">
                <h3 class="am-list-item-hd cartb"><?=$food['foodname'];?></h3>
                <input type="hidden" name="foodid[]" value="<?=$food['foodid'];?>">
              <?php if($food['discountproportion']):?>
                <div class="pr"><i class="am-icon-cny"></i><span class="price" id="price"><?=$food['foodprice']*$food['discountproportion'];?></span></div>
              <?php else:?>
                 <div class="pr"><i class="am-icon-cny"></i><span class="price" id="price"><?=$food['foodprice'];?></span></div>
              <?php endif;?>
                <?php if($food['code'] == 1999){$a = 1;}else{$a=0;}?>
                <input type="hidden" name="code[]" value="<?=$a;?>" />
                <div class="fNum">

                  <span class="reduce am-icon-minus-circle red" onClick="handle(this, false),delcart(this)"></span>
                  <input type="text" class="numTxt" onkeypress="return IsNum(event)" oninput="ueserWrite(this)"  onkeydown="keydown(this)" name="numbers[]" value="<?=$cart['number'];?>">
                  <span class="add am-icon-plus-circle green" onClick="handle(this, true),doaction(this)"></span>
                </div>
                 <a href="<?php echo site_url('home/change?id=').$food['foodid'].'&pid='.$food['foodpid'].'&shopid='.$shopid;?>"><span class="am-icon-refresh am-fr green"></span></a>
                <a href="<?=site_url('home/delcart?id=').$id;?>" class="am-fl" onclick="return confirm('你确定要删除吗?')"><i class="am-icon-trash red ats2"></i></a>
              </div>
            </li>  
            <?php endforeach;?>
          </ul>
          <?php endforeach;?>
          <?php endif;?>
          <!-- 庆典 -->
             <?php if(!empty($cerearr)):?>
              <div class="am-text-center oln">庆典</div>
           <ul class="am-list">
             <li class="am-g am-padding-horizontal-sm am-padding-vertical-sm">
               <a href="<?=site_url('home/editcere?id=').$cerearr['celebrationid'].'&name='.$cerearr['name'];?>" class="black am-inline"><?=$cerearr['name'];?></a>
               <div class="am-inline am-margin-left red"><i class="am-icon-cny"></i><span class="ban-price"> <?=$cerearr['moneyall'];?></span>
                   <a href="<?=site_url('home/elegdel?id=2');?>" class="am-fr" onclick="return confirm('你确定要删除吗?')"><i class="am-icon-trash red"></i></a>
               </div>
             </li>
           </ul>
         <?php endif;?>
          <!-- 庆典end -->
         <!-- 伴餐 -->
         <?php if(!empty($eleg)):?>
           <ul class="am-list">
             <li class="am-g am-padding-horizontal-sm am-padding-vertical-sm">
               <?=$eleg['title'];?> 
               <div class="am-inline am-margin-left red"><i class="am-icon-cny"></i><span class="ban-price"> <?=$eleg['money'];?></span>
                   <a href="<?=site_url('home/elegdel?id=1');?>" class="am-fr" onclick="return confirm('你确定要删除吗?')"><i class="am-icon-trash red"></i></a>
               </div>
             </li>
           </ul>
         <?php endif;?>
         <!-- 伴餐end -->
           <ul class="am-list">
             <li class="am-g am-padding-horizontal-sm am-padding-vertical-sm ff">
               服务费<span class="am-fr am-icon-cny red" id="servmoney"></span>
               <!-- <p>注：0-240元 服务费60元，大于300不收, 240-300 服务费+240=300</p> -->
               <input type="hidden" id="fee" name="servmoneydata" value="0">
             </li>
            
          <?php if(!empty($witer)):?>
              <li class="am-g am-padding-xs">
                    <label class="am-checkbox am-success am-u-sm-4 serl">
                  服务员(男)
                  </label> 
                <input type="hidden" id="servTotal" value="0">
               <div class="epr am-text-center am-text-sm"><span class="price" id="serprice">80</span>元/位</div>
               <div class="am-marign-top-sm am-fr cd">
                  <span class="reduce am-icon-minus-circle red" onClick="empdel()"></span>
                  <input type="text" class="serinput" readonly="" name="boy" value="<?=$witer['boy'];?>" >
                  <span class="add am-icon-plus-circle green" onClick="empladd()"></span>
                </div>
             </li>
              <li class="am-g am-padding-xs"> 
       
                  <label class="am-checkbox am-success am-u-sm-4 serl">
                     服务员(女)
                  </label> 
                <input type="hidden" id="servTotal2" value="0">
               <div class="epr am-text-center am-text-sm"><span class="price" id="serprice2">80</span>元/位</div>
 
               <div class="am-marign-top-sm am-fr cd2">
                  <span class="reduce am-icon-minus-circle red" onClick="empdel2()"></span>
                  <input type="text" class="serinput2" readonly="" name="girl" value="<?=$witer['girl'];?>" >
                  <span class="add am-icon-plus-circle green" onClick="empladd2()"></span>
                </div>
             </li>
           <?php else:?>
         <li class="am-g am-padding-xs">
                    <label class="am-checkbox am-success am-u-sm-4 serl">
                  服务员(男)
                  </label> 
                <input type="hidden" id="servTotal" value="0">
               <div class="epr am-text-center am-text-sm"><span class="price" id="serprice">80</span>元/位</div>
               <div class="am-marign-top-sm am-fr cd">
                  <span class="reduce am-icon-minus-circle red" style="display: none" onClick="empdel()"></span>
                  <input type="text" class="serinput" style="display: none" readonly="" name="boy" value="0" >
                  <span class="add am-icon-plus-circle green" onClick="empladd()"></span>
                </div>
             </li>
              <li class="am-g am-padding-xs"> 
       
                  <label class="am-checkbox am-success am-u-sm-4 serl">
                     服务员(女)
                  </label>  
                <input type="hidden" id="servTotal2" value="0">
               <div class="epr am-text-center am-text-sm"><span class="price" id="serprice2">80</span>元/位</div>
 
               <div class="am-marign-top-sm am-fr cd2">
                  <span class="reduce am-icon-minus-circle red" style="display: none" onClick="empdel2()"></span>
                  <input type="text" class="serinput2" style="display: none" readonly="" name="girl" value="0" >
                  <span class="add am-icon-plus-circle green" onClick="empladd2()"></span>
                </div>
             </li>
           <?php endif;?>
           </ul>
      </div>

    </div>
  </div>
  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="" style="bottom:49px;">
   
      <div class="am-u-sm-8 a">
        <span class="green am-posR"><img src="skin/img/cart.png" alt=""><span id="fen" class="allmoney cartA"></span></span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red"></span>
      </div>
      <div class="am-u-sm-4 b">
        
        <button   type="submit" class="am-btn am-btn-success">去付款</button>
        
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
      <a href="<?php echo site_url('home/cart')?>" class="active">
        <span class=""><img src="skin/img/clz2.png" alt=""></span>
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
</form>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script src="skin/js/num.js"></script>
<script src="skin/js/service.js"></script>
</body>
</html>