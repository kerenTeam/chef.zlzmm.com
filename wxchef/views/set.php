<style>
  .am-selected{
    width:150px!important;
   
  }
  .am-selected span{
    text-align:right;
  }
</style>
<link rel="stylesheet" href="skin/css/login.css">
<body>
  <form action="<?=site_url('home/userdatum');?>" method="post" enctype="multipart/form-data" >
    <header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
         <a href="<?php echo site_url('home/ucent');?>">
          <i class="am-header-icon am-icon-chevron-left"></i>
        </a>
      </div>
      <?php if (isset($_SESSION['userinfo']['nickname'])): ?>
      <h1 class="am-header-title">
      <?=$_SESSION['userinfo']['nickname'];?>
      </h1>
      <?php else: ?>
      <h1 class="am-header-title">
      <?=$user[0]['username'];?>
      </h1>
      <?php endif ?>
     
      <div class="am-header-right am-header-nav">
      <input type="hidden" name='UserId' value="<?=$user[0]['userid'];?>"/>
        <input type="submit" class="setf" value="确定">
      </div>
    </header>
    <div class="am-list-news-bd">
      <ul class="am-list userS">

      <?php if (isset($_SESSION['userinfo']['headimgurl']) && !empty($_SESSION['userinfo']['headimgurl'])): ?>
        <li class="am-g am-list-item-dated" style="color:gray;">
          <div class="am-u-sm-4">头像</div>
         
          <div class="am-u-sm-8"> 
              <div class="wx_type_img">
                  <!-- 图片实时预览 -->
                <div id="preview"> <img style="border-radius: 50%; filter: grayscale(1);
    -webkit-filter: grayscale(1);
    -moz-filter: grayscale(1);
    -o-filter: grayscale(1);
    -ms-filter: grayscale(1);" src="<?php echo $_SESSION['userinfo']['headimgurl']; ?>"> </div>
              </div> 
          </div>

        </li>
        <li class="am-g am-list-item-dated" style="color:gray;">
          <div class="am-u-sm-4">昵称</div>
          <div class="am-u-sm-8">
            <?=$_SESSION['userinfo']['nickname'];?>
			<input type="hidden" value="<?=$_SESSION['userinfo']['nickname'];?>" name='UserName' />

          </div>
        </li>

      <?php else: ?>
         <li class="am-g am-list-item-dated">
          <div class="am-u-sm-4">头像</div>
          <?php if($user[0]['userimage'] == ''):?>
          <div class="am-u-sm-8"> 
              <div class="wx_type_img">
                <input type="file" id="imgUpload" name="UserImage" accept="image/jpeg,image/jpg,image/png,image/gif" onchange="previewImage(this)" class="upload-add">
                  <!-- 图片实时预览 -->
                <div id="preview"> <img style="border-radius: 50%;" src="skin/img/vip.png" alt="选择图片"> </div>
              </div> 
          </div>
          <?php else:?>
             <div class="am-u-sm-8"> <!-- previewImage(this) -->
             <div class="wx_type_img">
                <input type="file" id="imgUpload" name="UserImage" onchange="previewImage(this)" class="upload-add">
                  <!-- 图片实时预览 -->
                <div id="preview"> 
                <img style="border-radius: 50%;" src="<?php echo IP.$user[0]['userimage'];?>" alt="选择图片"> </div>
              </div> 
            </div>
          <?php endif;?>
        </li>
        <li class="am-g am-list-item-dated">
          <div class="am-u-sm-4">昵称</div>
          <div class="am-u-sm-8">
            <input type="text" value="<?=$user[0]['username'];?>" placeholder="未填写" name='UserName'>
          </div>
        </li>

      <?php endif ?>
        <li class="am-g am-list-item-dated">
          <div class="am-u-sm-4">口味</div>
          <div class="am-u-sm-8">
            <input type="text" value="<?=$user[0]['personaltaste']?>" placeholder="未填写" name='PersonalTaste'>
          </div>
        </li>
        <li class="am-g am-list-item-dated">
          <div class="am-u-sm-4">喜爱菜系</div>
          <div class="am-u-sm-8">
            <input type="hidden" name='like' value="<?=$user[0]['likecuisine'];?>">
            <?=$user[0]['likecuisine'];?>
            <select multiple data-am-selected class="vegtype" name='LikeCuisine[]'>
              <option value="粤菜">粤菜</option>
              <option value="川菜">川菜</option>
              <option value="鲁菜">鲁菜</option>
              <option value="湘菜">湘菜</option>
            </select>
          </div>
          <style>
          .am-selected-list li{
            line-height:2rem;
          }
          </style>
        </li>
     
      </ul>
    </div>

  </form>
  <div class="shade">
  <div> <span class="am-icon-meh-o"></span>
    <p>请输入正确的手机号码</p>
  </div>
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
<script src="skin/js/amazeui.min.js"></script>
<script src="skin/js/imgup.js"></script>
</html>