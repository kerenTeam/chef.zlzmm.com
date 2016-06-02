<body class="bred">
  <script src="skin/js/echarts.simple.min.js"></script>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
   <?=$cainame;?>
    </h1>
    
  </header>
 
 <div class="am-text-center am-margin-vertical-lg">
    三月份&nbsp;&nbsp;&nbsp;
    <select data-am-selected="{maxHeight: 100}" name='mark'>
    <?php foreach($mark as $val):?>
      <option value="<?=$val['foodmarketid'];?>"><?=$val['name'];?></option>
  <?php endforeach;?>
     
    </select>
 </div>

 <div class="am-text-center am-u-sm-6">最高菜价：<i class="am-icon-cny"></i><?=$max;?></div>
 <div class="am-text-center am-u-sm-6">最低菜价：<i class="am-icon-cny"></i><?=$min;?></div>
 <script src="skin/js/Chart.js"></script>

<canvas id="myChart" height="300"></canvas>

<script>
    //曲线图
    var data = {
        labels: ["15", "16", "17", "18", "19", "20", "21"],
        datasets: [
            {//后面的曲线
                fillColor: "rgba(220,220,220,0.1)",//背景填充色，最后一个是透明度
                strokeColor: "rgba(220,220,220,1)",//曲线颜色
                pointColor: "rgba(220,220,220,1)",//点中心颜色
                pointStrokeColor: "#fff",//点边框颜色
                data: [3.6, 5.0, 4.9, 5.1, 5.1, 5.5, 4.0]//图表数据
            } 
        ]
    }
    var options = {//图表参数

        //Boolean - If we show the scale above the chart data
        scaleOverlay : false,

        //是否使用自定义格式
        scaleOverride : false,

        //** 当scaleOverride为true时必须要写下面三个值并且只有为true时下面三个值可用，默认都为NULL **
        //图表纵轴行数
        scaleSteps : 10,
        //图表纵轴单位长度
        scaleStepWidth : 1,
        //图表纵轴最小值
        scaleStartValue : 0,

        //坐标轴颜色
        scaleLineColor : "rgba(255,255,255,0.1)",

        //坐标轴宽度
        scaleLineWidth : 1,

        //是否显示纵轴数值标记
        scaleShowLabels : true,

        //Interpolated JS string - can access value
        scaleLabel : "<%=value%>",

        //坐标轴字体
        scaleFontFamily : "'微软雅黑'",

        //坐标轴文字大小，单位为像素
        scaleFontSize : 14,

        //坐标轴字体的粗细,可能的值为normal、bold、bolder、lighter或100-900
        scaleFontStyle : "normal",

        //坐标轴文字颜色
        scaleFontColor : "white",

        //是否显示网格线
        scaleShowGridLines : false,

        //网格线颜色
        scaleGridLineColor : "rgba(0,0,0,0)",

        //网格线宽度
        scaleGridLineWidth : 0,

        //连接线是否为曲线
        bezierCurve : true,

        //是否在线上显示点
        pointDot : true,

        //点半径，单位像素
        pointDotRadius : 3,

        //点外的环半径，单位像素
        pointDotStrokeWidth : 1,

        //Boolean - Whether to show a stroke for datasets
        datasetStroke : true,

        //线宽，单位像素
        datasetStrokeWidth : 2,

        //是否填充颜色
        datasetFill : true,

        //是否显示动画
        animation : true,

        //动画分多少步完成
        animationSteps : 60,

        //动画过度效果，具体值看Chart.js第494行
        animationEasing : "easeOutQuart",

        //动画进行中
        //onAnimationProgress: function(){},

        //动画结束后
        onAnimationComplete : null//function(){}
    };
    //Get the context of the canvas element we want to select
    var ctx = document.getElementById("myChart").getContext("2d");
    new Chart(ctx).Line(data,options);
</script>
 <p class="am-text-center am-text-lg">今日价格：<i class="am-icon-cny"></i><?=$price[0]['price'];?></p>
</body>
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/amazeui.min.js"></script>
<style>
 .am-selected-list li{
    color:black;
 }
canvas{
    margin: 80px auto 30px auto;
    display: block;
}
@media only screen and (max-width: 414px) {
    canvas{
      width:370px!important;  
    }
}
@media only screen and (max-width: 375px) {
    canvas{
      width:340px!important;  
    }
}
@media only screen and (max-width: 320px) {
      canvas{
      width:300px!important;  
    } 
}
</style> 
</html>