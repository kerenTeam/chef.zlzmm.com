<link rel="stylesheet" type="text/css"  href="skin/css/style.css">
<script src="skin/js/jquery.min.js"></script>
<script src="skin/js/custom.js"></script>
<script src="skin/js/ender.min.js"></script>
<script src="skin/js/selectnav.js"></script>
<script src="skin/js/twitter.js"></script>
<script src="skin/js/effects.js"></script>
<link href="skin/css/default_skin.css" type="text/css" rel="stylesheet" />
<link href="skin/css/skeleton.css" type="text/css" rel="stylesheet" />
<link href="skin/css/imagebox.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="skin/js/jquery.sky.carousel-1.0.min.js"></script>
<script type="text/javascript">



  $(function() {
     var width = $(window).width(); 
          var height = $(window).height();
         $(".sky-carousel").attr("height",height+'px');
         if(width>320 && width<=375){
           $('.sky-carousel').carousel({
            itemWidth: 300,
            itemHeight: 351,
            distance: -10,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 0.8,
            unselectedItemZoomFactor: 0.6,
            unselectedItemAlpha: 0.8,
            motionStartDistance: 160,
            topMargin: 10,
            gradientStartPoint: 0.1, 
            gradientOverlaySize: 190,
            selectByClick: false
          });
         }
          if(width>375 && width<=414){
           $('.sky-carousel').carousel({
            itemWidth: 350,
            itemHeight: 351,
            distance: -10,
            selectedItemDistance: 50,
            selectedItemZoomFactor: 0.8,
            unselectedItemZoomFactor: 0.6,
            unselectedItemAlpha: 0.8,
            motionStartDistance: 160,
            topMargin: 10,
            gradientStartPoint: 0.1, 
            gradientOverlaySize: 190,
            selectByClick: false
          });
         }
         if(width>414){
           $('.sky-carousel').carousel({
            itemWidth: 400,
            itemHeight: 351,
            distance: -10,
            selectedItemDistance: 100,
            selectedItemZoomFactor: 0.8,
            unselectedItemZoomFactor: 0.6,
            unselectedItemAlpha: 0.8,
            motionStartDistance: 160,
            topMargin: 10,
            gradientStartPoint: 0.1, 
            gradientOverlaySize: 190,
            selectByClick: false
          });
         }
    $('.sky-carousel').carousel({
      itemWidth: 250,
      itemHeight: 351,
      distance: -10,
      selectedItemDistance: 50,
      selectedItemZoomFactor: 0.8,
      unselectedItemZoomFactor: 0.6,
      unselectedItemAlpha: 0.8,
      motionStartDistance: 160,
      topMargin: 10,
      gradientStartPoint: 0.1, 
      gradientOverlaySize: 190,
      selectByClick: false
    });
  });
</script>
<style type="text/css">
 
  @media only screen and (min-width: 960px) {#portfolio-wrapper img {min-height: 147px;}} 
  @media only screen and (min-width: 768px) and (max-width: 959px) {#portfolio-wrapper img {min-height: 115px;}}

</style>
<body class="bwhite">
  <header data-am-widget="header" class="am-header am-header-default topform">
    <div class="am-header-left am-header-nav">
       <a href="<?php echo site_url('home/index');?>">
        <i class="am-header-icon am-icon-chevron-left"></i>
      </a>
    </div>
    <h1 class="am-header-title">
    宴会定制
    </h1>
    
  </header>

  <!-- 960 Container -->
  <div class="container"> 
    <!-- Slider -->
    <div class="sixteen columns">
      <div class="project">
        <div class="sky-carousel">
          <div class="sky-carousel-wrapper">
            <ul class="sky-carousel-container">
            <?php foreach($party as $val):?>
              <li>  <a href="<?php echo site_url('home/partyInfo?id=').$val['foodid'];?>">
                <img src="<?=IP.$val['packagelogo'];?>" alt="" /> </a> 
                <div class="sc-content">
                  <h2> <a href="<?php echo site_url('home/partyInfo')?>"><?=$val['foodname'];?></a></h2>
                </div>
              </li>
             <?php endforeach;?>
            </ul>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- End 960 Container --> 

</body>

</html>