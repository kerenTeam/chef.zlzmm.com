<body>
  <script type="text/javascript" src="skin/js/star.js"></script>
  <link rel="stylesheet" href="skin/css/zyUpload.css" type="text/css">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="<?php echo site_url('home/ucent');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    评价
    </h1>
  </header>
  <!-- 评价内容填写 -->
  <form action="<?=site_url('home/comsuc')?>" id="commentform" method="post">
    
  <!-- 保存打分内容 -->

    <input id="rating" name="serving" value="0" hidden type="txt">
    <input id="taste" name="taste" value="0"  hidden type="txt">
    <input id="environment" name="environment"  hidden value="0" type="txt">
    <div id="AddDP" class="am-shadow">
    <label class="am-radio am-success">
      <input type="radio" name="radiocomt" value="1" data-am-ucheck> 好评
    </label>
     <label class="am-radio am-success">
      <input type="radio" name="radiocomt" value="2" data-am-ucheck> 中评
    </label>
     <label class="am-radio am-success">
      <input type="radio" name="radiocomt" value="3" data-am-ucheck> 差评
    </label>
      <ul class="clist">
        
        <li>厨师<span class="Select">
        <a onMouseOver="javascript:setProfix('taste_');showStars(1,'taste');"
          onMouseOut="javascript:setProfix('taste_');clearStars('taste');"
          href="javascript:setProfix('taste_');setStars(1,'taste');">
        <img id="taste_1" title="差(1)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('taste_');showStars(2,'taste');"
          onMouseOut="javascript:setProfix('taste_');clearStars('taste');"
          href="javascript:setProfix('taste_');setStars(2,'taste');">
        <img id="taste_2" title="一般(2)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('taste_');showStars(3,'taste');"
          onMouseOut="javascript:setProfix('taste_');clearStars('taste');"
          href="javascript:setProfix('taste_');setStars(3,'taste');">
        <img id="taste_3" title="好(3)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('taste_');showStars(4,'taste');"
          onMouseOut="javascript:setProfix('taste_');clearStars('taste');"
          href="javascript:setProfix('taste_');setStars(4,'taste');">
        <img id="taste_4" title="很好(4)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('taste_');showStars(5,'taste');"
          onMouseOut="javascript:setProfix('taste_');clearStars('taste');"
          href="javascript:setProfix('taste_');setStars(5,'taste');">
        <img id="taste_5" title="非常好(5)" src="skin/img/icon_star_1.gif"></a> </span></li>
        
        
        
        
        <li>服务<span class="Select">
        <a onMouseOver="javascript:setProfix('environment_');showStars(1,'environment');"
          onMouseOut="javascript:setProfix('environment_');clearStars('environment');"
          href="javascript:setProfix('environment_');setStars(1,'environment');">
        <img id="environment_1" title="差(1)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('environment_');showStars(2,'environment');"
          onMouseOut="javascript:setProfix('environment_');clearStars('environment');"
          href="javascript:setProfix('environment_');setStars(2,'environment');">
        <img id="environment_2" title="一般(2)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('environment_');showStars(3,'environment');"
          onMouseOut="javascript:setProfix('environment_');clearStars('environment');"
          href="javascript:setProfix('environment_');setStars(3,'environment');">
        <img id="environment_3" title="好(3)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('environment_');showStars(4,'environment');"
          onMouseOut="javascript:setProfix('environment_');clearStars('environment');"
          href="javascript:setProfix('environment_');setStars(4,'environment');">
        <img id="environment_4" title="很好(4)" src="skin/img/icon_star_1.gif"></a>
        
        <a onMouseOver="javascript:setProfix('environment_');showStars(5,'environment');"
          onMouseOut="javascript:setProfix('environment_');clearStars('environment');"
          href="javascript:setProfix('environment_');setStars(5,'environment');">
        <img id="environment_5" title="非常好(5)" src="skin/img/icon_star_1.gif"></a> </span></li>
  
      </ul>
    </div>
    <!-- 图片上传 --> 
     <!--  <div class="commimg am-cf">
        
        <div class="am-fl prwimage">
        <span class="am-icon-camera am-icon-sm am-fl"></span><img src="skin/img/user.jpg" alt=""><img src="skin/img/user.jpg" alt=""><img src="skin/img/user.jpg" alt=""><img src="skin/img/user.jpg" alt=""></div>
      </div> -->

    <div id="demo" class="demo">
     <!--  <input type="hidden" class="hiddenImg" name="" value=""> -->
    </div>


     <textarea name='content' class="am-u-sm-12 am-shadow cmt" rows="5" id="doc" placeholder="你的意见对我们至关重要"></textarea>
    <!-- footer -->
    <div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default amft" id="">
      <div class="am-u-sm-8 a">
      </div>
      <div class="am-u-sm-4 b">
        <input type="hidden" id="oid" value="<?=$id?>" name='POOrderId' />
        <button type="button" class="am-btn am-btn-success publish">发表</button>
        
      </div>
    </div>
  </form>
</body>
<script src="skin/js/jquery.min.js"></script>

<script src="skin/js/amazeui.min.js"></script>
<!-- 引用核心层插件 -->
<script src="skin/js/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script src="skin/js/zyUpload.js"></script>
<!-- 引用初始化JS -->
<script>
   /* www.jq22.com */
$(function(){
  // 初始化插件
  $("#demo").zyUpload({
    width            :   "650px",                 // 宽度
    height           :   "400px",                 // 宽度
    itemWidth        :   "120px",                 // 文件项的宽度
    itemHeight       :   "100px",                 // 文件项的高度
    url              :   "<?=site_url('pricesearch/commimg');?>",  // 上传文件的路径
    multiple         :   true,                    // 是否可以多个文件上传
    dragDrop         :   true,                    // 是否可以拖动上传文件
    del              :   true,                    // 是否可以删除文件
    finishDel        :   false,           // 是否在上传文件完成后删除预览
    /* 外部获得的回调接口 */
    onSelect: function(files, allFiles){                    // 选择文件的回调方法
      //console.info("当前选择了以下文件：");
      console.info(files);
      //console.info("之前没上传的文件：");
      console.info(allFiles);
    },
    onDelete: function(file, surplusFiles){                     // 删除一个文件的回调方法
     // console.info("当前删除了此文件：");
      console.info(file);
      //console.info("当前剩余的文件：");
      console.info(surplusFiles);
    },
    onSuccess: function(file){                    // 文件上传成功的回调方法
     console.info("此文件上传成功：");
      console.info(file);

    },
    onFailure: function(file){                    // 文件上传失败的回调方法
    //  console.info("此文件上传失败：");
      console.info(file);
    },
    onComplete: function(responseInfo){           // 上传完成的回调方法
     // console.info("文件上传完成");
      console.info(responseInfo);
    }
  });

   $('.publish').click(function(){
     var ratfen = $('input[name="radiocomt"]:checked').val();
     var taste=$('#taste').val();
     var environment=$('#environment').val();
     var imgrouts = document.getElementsByClassName('hiddenImg');
    var routes = [];
     for(var i=0;i<imgrouts.length;i++){
        routes[i] = imgrouts[i].value;
     }
     var comment = $('#doc').val();
     var oid = $('#oid').val();
     $.ajax({
      type: "POST",
      url:'<?=site_url("pricesearch/comsuc")?>',
      data:'ratfen='+ratfen+'&taste='+taste+'&environment='+environment+'&routes='+routes+'&comment='+comment+'&oid='+oid,
      success: function(data) {
        alert(data);
       window.location.href='<?php echo site_url("home/share");?>';
      }
     });
  
});
});


</script>
<!-- <script src="skin/js/jq22.js"></script> -->
</html>