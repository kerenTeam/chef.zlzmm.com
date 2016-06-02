<link rel="stylesheet" type="text/css" href="skin/css/order.css">
<style type="text/css">
  .per{padding: 20px; border-bottom: 1px dotted #d3d3d3;}
  .title{font-weight:bold; color:#39f;}
  .nodata{display:none; height:32px; line-height:32px; text-align:center; color:#999; font-size:14px;}
  .nodata img{width:25px;}
  h2.tip{margin:20px;font-size: 18px}
</style>
<body>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
      <a href="javascript:" onclick="javascript:history.go(-1);">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    精品生活
    </h1>
    
  </header>
  <div class="am-g life"> 
  
  </div>

<!-- 图文加载 -->
   <div class="container am-shadow">
      <div class="am-g life">
            <div class="demo">
                <div id="lists"> 

                </div> 
                <div class="nodata"></div>
            </div>  
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
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<script type="text/javascript">
var i=1;
$(function(){
   //加载
     var totalpage = 6; //总页数，防止超过总页数继续滚动
                var winH = $(window).height(); //页面可视区域高度 

                $(window).scroll(function() {
                    if (i < totalpage) { // 当滚动的页数小于总页数的时候，继续加载
                        var pageH = $(document.body).height();
                        var scrollT = $(window).scrollTop(); //滚动条top 
                        var aa = (pageH - winH - scrollT) / winH;
                        if (aa < 0.01) {
                           getJson(i)
                        }
                    } else { //否则显示无数据
                        showEmpty();
                    }
                });
                getJson(0); //加载第一页


  });

            function getJson(page) {
                $(".nodata").show().html("<img src='http://www.sucaihuo.com/Public/images/loading.gif'/>");
                $.getJSON("<?=site_url('pricesearch/quality');?>", {page: i}, function(json) {
                  console.log(json);
                    if (json) {
                        var str = "";
                        $.each(json, function(index, array) {
                          
                            var str = "<figure> <a href='<?php echo site_url('home/lifeInfo?id=');?>";
                            var str = str + array['boutiqueid']+"'><img src='<?php echo IP;?>" + array['backgoungimg'] + "'><figcaption>" + array['name'] + "<br><span class='am-text-sm'>"+ array['abstract'] + "</span></figcaption></a></figure>";
                            $("#lists").append(str);
                        });
                       setTimeout(function(){ $(".nodata").hide();},50000);
                    } else {
                       showEmpty();
                    }
                });
                i++;
}
            function showEmpty() {
               setTimeout(function(){  $(".nodata").show().html("别滚动了，已经到底了。。。");},10000);
            }

</script>

</body>
</html>