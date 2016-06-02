<body>
  <style>
  .am-selected {
  background-color: #F85554;
  }
  .am-selected button {
  color: white;
  }
  </style>
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    菜市场
    </h1>
  </header>
  <script src="skin/js/jquery.min.js"></script>
<script>
$(function(){
      var cai =  $("#caishi").val();
      var time =  $("#adate").val();
      var cate =  $("#cates").val();
      if(!time){
        var time = show();
      }
      $.ajax({
        type:'POST',
        url:"<?=site_url('pricesearch/caiprice')?>",
        data: "name="+cai+"&time="+time+'&cates='+cate,
        success: function (data) {
            $('#group_one').html(data);
           }

      });
})
  function show(){
   var mydate = new Date();
   var str = "" + mydate.getFullYear() + "-";
   str += (mydate.getMonth()+1) + "-";
   str += mydate.getDate();
   return str;
  }
function getoption(){
      var cai =  $("#caishi").val();
      var cate =  $("#cates").val();
      var time =  $("#adate").val();
      $.ajax({
        type:'POST',
        url:"<?=site_url('pricesearch/caiprice')?>",
        data: "name="+cai+"&time="+time+'&cates='+cate,
        success: function (data) {
            $('#group_one').html(data);
           }

      });
    } 
</script>
  <form action="" method="" class="pform">
    <br>
    
    <div class="am-u-sm-4 sbnt">
      <select data-am-selected="{maxHeight: 100}" name='caishi' id='caishi' onchange="getoption();">
      <?php foreach($cai as $val):?>
        <option value="<?=$val['foodmarket'];?>"><?=$val['foodmarket'];?></option>
      <?php endforeach;?>
      </select>
    </div>
    <div class="am-u-sm-4 sbnt">
      <select id='cates' data-am-selected="{maxHeight: 100}" name='cate' onchange="getoption();">
      <?php foreach($cates as $v):?>
        <option value="<?=$v['marketcategorie'];?>"><?=$v['marketcategorie'];?></option>\
      <?php endforeach;?>
       
      </select>
    </div>
    <div class="am-u-sm-4 sbnt">
      <select id="adate" class="date" data-am-selected="{maxHeight: 100}" name='date' onchange="getoption();">
      
      </select>
    </div>
    <br>
  </form>
  <table class="am-table am-shadow pta">
    <thead>
      <tr>
        <th>菜名</th>
        <th>重量</th>
        <th>价格</th>
      </tr>
    </thead>
    <tbody id='group_one'>
      <!-- <tr>
        <td><a href="<?php echo site_url('home/price')?>">西兰花</a></td>
        <td>1kg</td>
        <td>5.5</td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url('home/price')?>">小青菜</a></td>
        <td>1kg</td>
        <td>8</td>
      </tr>
      <tr>
        <td><a href="<?php echo site_url('home/price')?>">瘦肉</a></td>
        <td>1kg</td>
        <td>30</td>
      </tr>
       -->
    </tbody>
  </table>
</body>
<script src="skin/js/amazeui.min.js"></script>
<script>
 $(function(){
     var adate = $('#adate');
     var html;//定义selec追加的html元素
     var now = new Date();
 
  for(var i=0;i<7;i++){
      var date = new Date(now.getTime() - i * 24 * 3600 * 1000);//循环得出每天的日期
      var month = date.getMonth() + 1;
      var day = date.getDate();
      var year = date.getFullYear(); 
      html+= '<option value="'+year+'-'+month+'-'+day+'">'+year+'-'+month+'-'+day+'</option>';
     adate.html(html);
  }
 })
</script>

</html>