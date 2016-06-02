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

</header>

<script type="text/javascript">
function doaction(obj) {
        $.ajax({
            type: "POST",
            url: '<?php echo site_url('home/addcart'); ?>',
            data: $(obj.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode).serialize(),
            success: function(data) {
                console.log(data);
            }
        });
    }
</script>

<?php if(!isset($_SESSION['shoping'])):?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <center><div class="am-margin">菜篮子还是空的</div></center>
    <center><div class="am-margin"><a href="<?=site_url('home/cailan');?>" class="am-u-sm-12 am-btn bgreen go">去点菜</a></div></center>

<?php else:;?>

<form action="<?=site_url('orderWXPay/order');?>" method="post" enctype="multipart/form-data">
  <div data-am-widget="list_news" class="am-u-sm-12 asp cmn">
    <div class="cmn cmnb am-list-news am-list-news-default" >
      <div class="am-list-news-bd pabo">
       <?php if(!empty($carts)):?>
        <div class="am-text-center oln">点菜</div>
          <ul class="am-list cul">
     
        <!-- <?php var_DumP($carts);?> -->
      <?php unset($_SESSION['booking']); foreach($carts as $cart):?>
      <?php 
        $id = $cart['foodid'];
        $shopid = $cart['shopid'];
        $foods = file_get_contents(POSTAPI."API_Food?dis=xq&foodid=".$id);
        $food = json_decode(json_decode($foods),true);
     
        if(!isset($_SESSION['booking'])){
         $this->session->set_userdata('booking',$food);
        }else{
          $booking = $_SESSION['booking'];

          $book = array_merge($booking,$food);
          $this->session->set_userdata('booking',$book);
        }
      ?>
            <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
              <div class="am-u-sm-3 am-text-center am-list-thumb">
                <a href="<?php echo site_url('home/food?id=').$food[0]['foodid'].'&number='.$cart['number'].'&shopid='.$shopid;?>" class="vimg">
                  <img src="<?php echo IP.$food[0]['thumbnail'];?>" id="img" alt="<?=$food[0]['foodname'];?>"/>
                </a>
              </div>
              <div class=" am-u-sm-9 am-list-main">
                <h3 class="am-list-item-hd cartb"><?=$food[0]['foodname'];?></h3>
                <input type="hidden" name="foodid[]" value="<?=$food[0]['foodid'];?>">
                <div class="pr"><i class="am-icon-cny"></i><span class="price" id="price"><?=$food[0]['foodprice'];?></span></div>
                <input type="hidden" name="code[]" value="0">
                <div class="fNum">

                  <span class="reduce am-icon-minus-circle red" onClick="handle(this, false),doaction(this)"></span>
                  <input type="text" class="numTxt" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" 
                  name="numbers[]" value="<?=$cart['number'];?>">
                  <span class="add am-icon-plus-circle green" onClick="handle(this, true),doaction(this)"></span>
                </div>
                 <a href="<?php echo site_url('homeange?id=').$food[0]['foodid'].'&pid='.$food[0]['foodpid'].'&shopid='.$shopid;?>"><span class="am-icon-refresh am-fr green"></span></a>
                <a href="<?=site_url('home/delcart?id=').$id.'&shopid='.$shopid;?>" class="am-fl" onclick="return confirm('你确定要删除吗?')"><i class="am-icon-trash red ats2"></i></a>
              </div>
            <li>
            <?php endforeach;?>
          </ul>
          <?php endif;?>
          <?php if(!empty($taocan)):?>
         <div class="am-text-center oln">套餐</div>
          <ul class="am-list cul">
          <?php foreach($taocan as $k=>$v):?>
           <?php 
            $id = $v['foodid'];
            $shopid = $v['shopid'];
            $foods = file_get_contents(POSTAPI."API_Food?dis=xq&foodid=".$id);
            $food = json_decode(json_decode($foods),true);
            // var_dumP($food);
            if(!isset($_SESSION['booking'])){
             $this->session->set_userdata('booking',$food);
                 }else{
              $booking = $_SESSION['booking'];

              $book = array_merge($booking,$food);
              $this->session->set_userdata('booking',$book);
            }
          ?>
              <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
              <div class="am-u-sm-3 am-text-center am-list-thumb">
                 <a href="<?php echo site_url('home/food?id=').$food[0]['foodid'].'&number='.$v   ['number'].'&shopid='.$shopid;?>" class="vimg">
                  <img src="<?php echo IP.$food[0]['thumbnail']?>" alt="<?=$food[0]['foodname']?>"/>
                </a>
              </div>
              <div class=" am-u-sm-9 am-list-main">
                <h3 class="am-list-item-hd cartb"><?=$food[0]['foodname'];?></h3>
                <input type="hidden" name="foodid[]" value="<?=$food[0]['foodid'];?>">
                <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$food[0]['foodprice']?></span></div>
                 <input type="hidden" name="code[]" value="1">
                <div class="fNum">
                  <span class="reduce am-icon-minus-circle red" onClick="handle(this, false),doaction(this)"></span>
                  <input type="text" class="numTxt" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" name="numbers[]" value="<?=$v['number'];?>">
                  <span class="add am-icon-plus-circle green" onClick="handle(this, true),doaction(this)"></span>
                </div>
                <a href="<?=site_url('home/delcart?id=').$id.'&shopid='.$shopid;?>" class="am-fl"><i class="am-icon-trash red ats2"></i></a>
              </div>
            <li> 
          <?php endforeach;?>
           </ul>
         <?php endif;?>  
         <?php if(!empty($jincai)):?>
         <div class="am-text-center oln">净菜</div>
          <ul class="am-list cul">
          <?php foreach($jincai as $k=>$v):?>
           <?php 
            $id = $v['foodid'];
            $shopid = $v['shopid'];
            $foods = file_get_contents(POSTAPI."API_Food?dis=xq&foodid=".$id);
            $food = json_decode(json_decode($foods),true);
            // var_dumP($food);
            if(!isset($_SESSION['booking'])){
             $this->session->set_userdata('booking',$food);
            }else{
              $booking = $_SESSION['booking'];

              $book = array_merge($booking,$food);
              $this->session->set_userdata('booking',$book);
            }
          ?>
              <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
              <div class="am-u-sm-3 am-text-center am-list-thumb">
                <a href="<?php echo site_url('home/food?id=').$food[0]['foodid'].'&number='.$v['number'].'&shopid='.$shopid;?>" class="vimg">
                  <img src="<?php echo IP.$food[0]['thumbnail']?>" alt="<?=$food[0]['foodname']?>"/>
                </a>
              </div>
              <div class=" am-u-sm-9 am-list-main">
                <h3 class="am-list-item-hd cartb"><?=$food[0]['foodname'];?></h3>
                <input type="hidden" name="foodid[]" value="<?=$food[0]['foodid'];?>">
                <div class="pr"><i class="am-icon-cny"></i><span class="price"><?=$food[0]['foodprice']?></span></div>
                 <input type="hidden" name="code[]" value="1">
                <div class="fNum">
                  <span class="reduce am-icon-minus-circle red" onClick="handle(this, false),doaction(this)"></span>
                  <input type="text" class="numTxt" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" name="numbers[]" value="<?=$v['number'];?>">
                  <span class="add am-icon-plus-circle green" onClick="handle(this, true),doaction(this)"></span>
                </div>
                <a href="<?=site_url('home/delcart?id=').$id.'&shopid='.$shopid;?>" class="am-fl"><i class="am-icon-trash red ats2"></i></a>
              </div>
            <li> 
          <?php endforeach;?>
           </ul>
         <?php endif;?>

           <ul class="am-shadow am-list">
             <li class="am-g am-padding-horizontal-sm am-padding-vertical-sm ff">
               服务费<span class="am-fr am-icon-cny red" id="servmoney"></span>
               <!-- <p>注：0-240元 服务费60元，大于300不收, 240-300 服务费+240=300</p> -->
               <input type="hidden" id="fee" name="servmoneydata" value="0">
             <li>
              <li class="am-g am-padding-xs">
              <?php if (empty($_SESSION['Writes'])): ?>
                  <label class="am-checkbox am-success am-u-sm-4">
                  服务员 <input type="checkbox" id="serpeople" ata-am-ucheck>
                  </label> 
                <?php else: ?>
                   <label class="am-checkbox am-success am-u-sm-4">
                  服务员 <input type="checkbox" id="serpeople" checked='checked'>
                  </label> 
                <?php endif ?>
                <input type="hidden" id="servTotal" value="0">
               <div class="epr am-text-center am-text-sm"><span class="price" id="serprice">80</span>元/位</div>
                <?php  if (!empty($_SESSION['Writes'][0]))
                { $writernums = $_SESSION['Writes'][0];}else{ $writernums = 0; } ?>
               <div class="am-marign-top-sm am-fr cd" 
               <?php if ($writernums != 0): ?>
                 style="display: block;"
               <?php else: ?>
                 style="display: none;"
               <?php endif ?> >
                  <span class="reduce am-icon-minus-circle red" onClick="empdel()"></span>
                  <!-- <input type="text" class="serinput" onkeypress="return IsNum(event)" onchange="ueserWrite(this)" onfocus="blurWrite(this)" name="Writes[]" value="<?php echo $writernums; ?>" > -->
                  <input type="text" class="serinput" readonly="" name="Writes[]" value="<?php echo $writernums; ?>" >
                  <span class="add am-icon-plus-circle green" onClick="empladd()"></span>


                </div>
             <li>
           </ul>
      </div>

    </div>
  </div>
  
  <!-- footer -->
  <div data-am-widget="navbar" class="am-navbar am-shadow am-cf am-navbar-default amft" id="" style="bottom:49px;">
   
      <div class="am-u-sm-8 a">
        <span class="green"><img src="skin/img/cart.png" alt=""><span id="fen" class="allmoney"></span>份</span>
        <i class="am-icon-cny red"></i><span id="allmoney" class="allmoney red"></span>
      </div>
      <div class="am-u-sm-4 b">
        
        <button   type="submit" class="am-btn am-btn-success">确认<tton>
        
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
    <li>
    <li>
      <a href="<?php echo site_url('home/cart')?>" class="active">
        <span class=""><img src="skin/img/clz2.png" alt=""></span>
        <span class="am-navbar-label">菜篮子</span>
      </a>
    <li>
    <li>
      <a href="<?php echo site_url('home/find')?>"> 
        <span class="find">发现</span>
      </a>
    <li>
    <li>
      <a href="<?php echo site_url('home/customServ')?>">
        <span class=""><img src="skin/img.png" alt=""></span>
        <span class="am-navbar-label">客服</span>
      </a>
    <li>
    <li>
      <a href="<?php echo site_url('home/ucent')?>">
        <span class=""><img src="skin/img/gr1.png" alt=""></span>
        <span class="am-navbar-label">我的</span>
      </a>
    <li>
  </ul>
</div>
</form>
<?php endif;?>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/jsazeui.min.js"></script>
<script src="skin/js/num.js"></script>

</body>
<script>
  //是否选择服务员

  var sercheck = document.getElementById('serpeople');
  var cd = document.getElementsByClassName('cd')[0];
  var serinput = document.getElementsByClassName('serinput')[0];
  var serprice = document.getElementById('serprice');
  var servTotal = document.getElementById('servTotal');
  var allmoney = document.getElementById('allmoney');
  var   keep = allmoney.innerHTML;
  sercheck.onclick = function (){
    
    if(sercheck.checked){
          cd.style.display="";
          serinput.value=1;
           allmoney.innerHTML = parseFloat(allmoney.innerHTML)+parseFloat(serprice.innerHTML);
    }
    else{
      cd.style.display="none";
       serinput.value=0;
       allmoney.innerHTML = parseFloat(allmoney.innerHTML)-parseFloat(servTotal.value);
     }
      servTotal.value = (serinput.value)*parseInt(serprice.innerHTML);
       //allmoney.innerHTML = parseFloat(allmoney.innerHTML)+parseFloat(servTotal.value);
}
//服务于数量加减
 function empdel(){
  var sernum =serinput.value;
        sernum--;
        if(sernum<1){
          sernum = 0;
          sercheck.checked = false;
          cd.style.display="none";
        }
        serinput.value = sernum;
        servTotal.value = sernum*parseFloat(serprice.innerHTML); console.log(servTotal.value);
        allmoney.innerHTML = parseFloat(allmoney.innerHTML)-parseFloat(serprice.innerHTML);
 }
 function empladd(){
  var sernum =serinput.value;
        sernum++; 
        serinput.value =sernum;
        servTotal.value = sernum*parseFloat(serprice.innerHTML);console.log(servTotal.value);
         allmoney.innerHTML = parseFloat(allmoney.innerHTML)+parseFloat(serprice.innerHTML);
 }
</script>
<ml>