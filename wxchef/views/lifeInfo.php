
<body> 
<style>
  img{
    width:90%!important;
    margin:auto;
  }
  p{
    background-color:rgb(241, 241, 241)!important;
    padding:5px 15px!important;
  }
  p+div{
    background:rgb(241, 241, 241)!important;
    text-align:center;
  }
  .gocl{
        display: block;
    text-align: center;
    width: 80%;
    margin: auto;
    height: 40px;
    line-height: 40px;
    border-radius: 3px;
    background-color:#F85554;
    color:white;
    transition:all 0.1s ease-out;
    -webkit-transition:all 0.1s ease-out;
    -moz-transition:all 0.1s ease-out;
    -ms-transition:all 0.1s ease-out;
    -o-transition:all 0.1s ease-out;
    margin-top:15px;
    margin-bottom:15px;
  }
  .gocl:hover{
   background-color:#CA5150;
   color:white;
  }
</style>
  <header data-am-widget="header" data-am-sticky class="am-header am-header-default topform">
      <div class="am-header-left am-header-nav">
          <a href="javascript:" onclick="javascript:history.go(-1);">

                <i class="am-header-icon am-icon-chevron-left"></i>
          </a>
      </div>

      <h1 class="am-header-title">
          <?=$life[0]['name'];?>
      </h1>
 
  </header>
<?php  echo str_replace('&nbsp;', ' ',htmlspecialchars_decode($life[0]['boucontent'])) ;?>


<a href="<?php echo site_url('home/cailan')?>" class="gocl">去点菜</a>
</body>
</html>