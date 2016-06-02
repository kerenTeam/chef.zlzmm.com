<link rel="stylesheet" href="skin/css/globe.css">
<link rel="stylesheet" href="skin/css/zyUpload.css" type="text/css"> 
<body>
  
<header data-am-widget="header" class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
          <a href="javascript:" onclick="javascript:history.go(-1);">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title">
          我的订单
      </h1> 
</header>
<div>
	<ul class="share_order">
  <?php foreach($foods as $val):?>
	<li>
		<div class="share_left">
			<img src="<?=IP.$val['thumbnail'];?>" alt="<?=$val['foodname']?>">
		</div>
		<div class="share_right">
			<p><?=$val['foodname']?></p>
      <?php if($val['state'] == 0):?>
			<a href="<?php echo site_url('home/singleComment?id=').$val['foodid'].'&foodpic='.$val['thumbnail'].'&POOrderId='.$val['poorderid'];?>">晒单评价</a>
    <?php else:?>
        <a href="javascript:;">已评价</a>
    <?php endif;?>
		</div>
	</li>
<?php endforeach;?> 
<?php $witer = $foods[0]['manwaiter']+$foods[0]['wumenwaiter']; if($witer>0):?>
  <li><div class="share_left">服务员</div> <div class="share_right2">
  <?php if ($foods[0]['identification']): ?>
      <a href="javascript:;">已评价</a>
    <?php else: ?>
       <a href="<?php echo site_url('home/singleComment?id=').'&foodpic='.'&POOrderId='.$val['poorderid'];?>">服务评价</a>
  <?php endif ?>
 </div>
  </li>
<?php endif;?>
</ul>
</div>

  <form  id="commentform" method="post">
    
  <!-- 保存打分内容 -->
    <input type="hidden" name="PoorderId" id='oid' value="<?=$id;?>">
    <input id="taste" name="taste" value="0"  hidden type="txt">
    <input id="environment" name="environment"  hidden value="0" type="txt">
    <input id="quality" name="quality"  hidden value="0" type="txt">
    <div id="AddDP" class="am-shadow">
   	<h3>订单评分</h3>

      <ul class="clist_ul">
      <li> <label class="am-radio am-success haoping">
            <input type="radio"  name="radiocomt" value="1" data-am-ucheck> 好评
          </label>
           <label class="am-radio am-success haoping">
            <input type="radio" name="radiocomt" value="2" data-am-ucheck> 中评
          </label>
           <label class="am-radio am-success haoping">
            <input type="radio" name="radiocomt" value="3" data-am-ucheck> 差评
          </label></li>
      
        
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


  		
      
      </ul>
    </div>
    
    <div class="comment_pic am-cf">
    	<textarea name='content' id='doc'  rows="4" class="comment_pic_t" placeholder="亲，输入你的评价吧！"></textarea>
    	<div id="demo" class="demo"> </div>
    	<input type="button" class="publish" value="发表评论">
    </div>
  </form>
  <div class="infos">
  		<h3>订单详情</h3>
  		<ul>
  			<li>
  				<span class="infos_span1">订单编号：</span>
  				<span class="infos_span2"><?=$foods[0]['billno'];?></span>
  			</li>
  			<li>
  				<span class="infos_span1">服务时间：</span>
  				<span class="infos_span2"><?=$foods[0]['appointmenttime'];?></span>
  			</li>
  			<li>
  				<span class="infos_span1">服务地点：</span>
  				<span class="infos_span2"><?=$foods[0]['address'];?></span>
  			</li>
  			<li>
  				<span class="infos_span1">付款方式：</span>
  				<span class="infos_span2"><?=$foods[0]['consumptionpattern'];?></span>
  			</li>
  		</ul>
  </div>
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
    //width            :   "650px",                  宽度
    //height           :   "400px",                  宽度
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
     // if(ratfen==0||taste==0||environment)
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

<script type="text/javascript" src="skin/js/star.js"></script>	
</body>
</html>