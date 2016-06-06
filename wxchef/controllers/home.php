
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*      首页+cate+菜品
*/

if (DeBug == 1) {
	//报告所有错误
    error_reporting(E_ALL);
} else if (DeBug == 0) {
	//禁用错误报告
    error_reporting(0);
} else {
	//报告运行时错误
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}

class home extends CI_Controller
{
	 
	function __construct()
	{
		parent::__construct();
		$this->load->library('IndexWxApi');
		$this->load->helper('post_helper');
		$this->load->helper('tool_helper');
		$this->load->helper('wxuser_helper');
		$this->load->library('session');
		$this->load->view('header');
	}
	//登录
	public function login(){

		$this->load->view('login');
		
	}
	//地图
	public function map(){

		$this->load->view('map');
		
	}
	//订单总评价
	public function commentTotal(){
		if($_GET){
			$id = $_GET['id'];
			// 获取订单详情
			$food = file_get_contents(POSTAPI.'API_Poorder?dis=ddxq&UserPhone='.$id);
			$data['foods'] = json_decode(json_decode($food),true);
			$data['id'] = $id;
			// 获取订单总评
			

			$this->load->view('commentTotal',$data);
		}

	}
	//订单总评价
	public function meituan(){

		$this->load->view('meituan');
	}
	//密码修改
	public function pwdchange(){
		$this->load->view('pwdchange');
	}
	//分享
	public function share(){
		$this->load->view('share/index');
	}
	//
	public function sharetosql()
	{
	  $postshare['UserPhone'] = $this->input->post('UserPhone');
	  $sharedata = json_encode($postshare);
	  $abc = curl_post(POSTAPI."API_Evaluate?dis=fx",$sharedata);
	  // var_dump($abc);
	  // var_dump(POSTAPI."API_Evaluate?dis=fx",$sharedata); exit;
      redirect('home/ucent');
	}

	//老用户登录
	public function login2(){ 
		if($_POST){
			$user = $this->input->post('UserPhone');
			$arr = array(
				'UserPhone' => $user,
				'UserPwd' => md5($this->input->post('UserPwd')),
				);
			$isok = json_encode($arr);
			if(strlen($user) != 11){
				$a = curl_post(POSTAPI.'API_User?dis=htlogin',$isok);
				
			}else{
				$a = curl_post(POSTAPI."API_User?dis=login",$isok);
			}
			switch ($a) {
				case '0':
					echo "<script>alert('没有该用户！');window.location.href='login2';</script>";
					break;
				case '1':
					if (strlen($user) != 11) {
						$this->session->set_tempdata("username",$_POST['UserPhone'],3600);
						redirect('chef/index');
					}else{
						$this->session->set_tempdata("phone",$_POST['UserPhone'],3600);
						echo "<script>window.location.href='ucent';</script>";
					}
					
					break;
				case '2':
					echo "<script>alert('密码错误！');window.location.href='login2';</script>";
					break;
			}
		}else{
		   $this->load->view('login2');
		}
	}
	//注册
	public function register(){
		$this->load->view('register');
	}
	

	//密码和手机号修改
	public function safe(){
		if($_GET){
			
			$data['userid'] = $_GET['id'];
			$data['pwd'] = $_GET['pwd'];
			$this->load->view('safe',$data);
		}
	}
	/* 修改密码 */
	public function editpwd(){
		if($_POST){
			$arr['UserId'] = $_POST['userid'];
			$pwd = $_POST['pwd'];
			$password = $_POST['userpwd'];
			$newpwd = $_POST['newpwd'];
			$pwded = $_POST['pwded'];
			
			if(md5($password) != $pwd){
				echo "<script>alert('你的原密码输入错误！');history.go(-1);</script>";
				exit;
			}
			if($newpwd != $pwded){
			    echo  "<script>alert('确认密码输入错误！');history.go(-1);</script>";
				exit;
			}
			$arr['UserPwd'] = md5($newpwd);
			$userjson = json_encode($arr);
			$pwdok = curl_post(POSTAPI.'API_User?dis=pwd',$userjson);
			if($pwdok == 1){
				echo "<script>alert('密码修改成功！');window.location.href='login';</script>";
			}else{
				echo "<script>alert('密码修改失败！');history.go(-1);</script>";

			}
			
		}
	}
	
	public function registeradd(){

		 $reigsterFrom = array('UserPwd' => md5($this->input->post('UserPwd')),'UserPhone' => $this->input->post('UserPhone'));
         $reigsterData = json_encode($reigsterFrom);

         $isok = curl_post(POSTAPI."API_User?dis=xzyh",$reigsterData);
      
         switch ($isok) { //0注册失败   1注册成功  2已有用户
         	case '0':
         		echo "<script>alert('注册失败！');  window.location.href='register';</script>";  //？注册
         		break;
         	case '1':
         		$this->session->set_userdata('phone',$this->input->post('UserPhone'),7200);
         		echo "<script>alert('注册成功！');    window.location.href='ucent';</script>";   //？中心
         		break;	
         	case '2':
         		echo "<script>alert('该号码已注册！'); window.location.href='login2';</script>";  //？登陆
         		break;	
         }
	}
	
	//首页
	public function index(){
		// 获取菜价
		$caijia = file_get_contents(POSTAPI.'API_Vegetable?dis=food');
		$data['caijia'] = json_decode(json_decode($caijia),true);
		
		//获取banner
		$banner = file_get_contents(POSTAPI.'API_Banner?number=1&dis=number');
		$data['banners'] = json_decode(json_decode($banner),true);
		$this->load->view('index',$data);
	}
	// 购物车demo
	public function demo(){

		$catejson = file_get_contents(POSTAPI.'API_Food?dis=c');
		$data['cates'] = json_decode(json_decode($catejson),true);
		$foodjson = file_get_contents(POSTAPI.'API_Food?dis=d');
		// 去掉首尾引号
		$food = ltrim(rtrim($foodjson,'"'),'"');
		// 转换json
		$a =   str_replace('\"','"',$food);
		$foods = json_decode($a,true);
		if(isset($_SESSION['shoping'])){
			if($_SESSION['shoping'] != ''){
				$shop = $_SESSION['shoping'];
				foreach($foods as $k=>$v){
					$foods[$k]['number'] = '0';
					foreach ($shop as $key => $value) {
						if($v['foodid'] == $value['foodid']){
							$foods[$k]['number'] = $value['number'];
						}
					}
					
				}
			}
		}
		
		$data['foods'] = $foods;
		$this->load->view('cailanDemo',$data);
	}
	//菜单 by wf
	public function cailan(){
		//var_Dump($_SESSION['shoping']);
		$catejson = file_get_contents(POSTAPI.'API_Food?dis=c');
		$data['cates'] = json_decode(json_decode($catejson),true);
		$foodjson = file_get_contents(POSTAPI.'API_Food?dis=d');
		// 去掉首尾引号
		$food = ltrim(rtrim($foodjson,'"'),'"');
		// 转换json
		$a =   str_replace('\"','"',$food);
		$foods = json_decode($a,true);
		if(isset($_SESSION['shoping'])){
			if($_SESSION['shoping'] != ''){
				$shop = $_SESSION['shoping'];
				foreach($foods as $k=>$v){
					$foods[$k]['number'] = '0';
					foreach ($shop as $key => $value) {
						if($v['foodid'] == $value['foodid']){
							$foods[$k]['number'] = $value['number'];
						}
					}
					
				}
			}
		}
		
		$data['foods'] = $foods;
		$this->load->view('cailan',$data);
	}
///
///  ajax 实现实时菜价缓存
///
    public function ajaxtocart()
    {	echo "<pre>";
        var_dump($this->input->post());
        echo "</pre>";
    }


	//点菜
	public function buy(){

		$this->load->view('buy');
	}
	//换一换
	public function change(){
		if($_GET){
		$data['id'] = $_GET['id'];
		// $data['shoppingid'] = $_GET['shopingid'];
		$pid = $_GET['pid'];
		$data['shopid'] = $_GET['shopid'];
		
		$cates = file_get_contents(POSTAPI."API_Food?dis=change&foodid=".$_GET['id']);
		$foods = json_decode(json_decode($cates),true);
		if($foods == " "){
			$data['foods'] = '';
		}else{
			$data['foods'] = $foods;
		}
		$this->load->view('change',$data);
		}
	}
	// 换一换处理
	public function changup(){
		$shopid = $_GET['shopid'];
		$id = $_GET['id'];
		$foodid = $_GET['foodid'];
		$shoping =$_SESSION['shoping'];
		foreach($shoping as $k=>$value){
			if($value['foodid'] == $id && $value['shopid'] == $shopid){
				$shoping[$k]['foodid'] = $foodid;
			}
		}
		$this->session->set_userdata('shoping',$shoping,0);
		redirect('home/cart');
	}
	//菜品详情
	public function food(){
		$id = $_GET['id'];
		//产品详情
		$foods = file_get_contents(POSTAPI.'API_Food?dis=xq&foodid='.$id);
		$foodjson = ltrim(rtrim($foods,'"'),'"');
      	$a =   str_replace('\"','"',$foodjson);
        $food = json_decode($a,true);
        //菜品数量
        if(isset($_SESSION['shoping'])){
        	if($_SESSION['shoping'] != ''){
        		$shoping = $_SESSION['shoping'];
        		foreach ($shoping as $key => $value) {
        			if($value['foodid'] == $id){
        				$food['number'] = $value['number'];
        			}
        		}
        	}
        }
        $data['foods'] = $food;
		// 产品图片
		$foodpic= file_get_contents(POSTAPI.'API_Food?dis=xqimg&foodid='.$id);
		$data['foodspic'] = json_decode(json_decode($foodpic),true);
		// 菜品评分
		$fen = file_get_contents(POSTAPI.'API_Food?dis=number&foodid='.$id);
		$data['fen'] = json_decode(json_decode($fen),true);
		// 菜品评价
		$commen = file_get_contents(POSTAPI.'API_Food?dis=spl&foodid='.$id);
	    $data['evaluate'] = json_decode(json_decode($commen),true);

		$this->load->view('food',$data);
	}
	//banner详情
	public function bannerinfo(){
		if($_GET){
			$id = $_GET['id'];
			$bannercon = file_get_contents(POSTAPI.'API_Banner?number='.$id.'&dis=content');
			$data['content'] = json_decode(json_decode($bannercon),true);
			$data['name'] = $_GET['name'];
			$this->load->view('bannerinfo',$data);
		}
	}
	
	//宴会服务
	public function partyServ(){

		$this->load->view('partyServ');
	}
	//忘记密码
	public function forgetPassword(){

		$this->load->view('forgetPassword');
	}
	// 忘记密码修改
	public function regadd()
	{
		if($_POST){
			$data['UserPhone'] = $_POST['phone'];
			$data['UserPwd'] = md5($_POST['password']);
			$passjson = json_encode($data);
			$passok = curl_post(POSTAPI.'API_User?dis=newPWD',$passjson);
			if($passok == 1){
				echo "<script>alert('修改密码成功');window.location.href='login2';</script>";
			}
		}
	}


	//精品生活 列表
	public function life(){
		
		$this->load->view('life');
	}
	//图文详情
	public function lifeInfo(){
		if($_GET){
			$id = $_GET['id']; 
			$life = file_get_contents(POSTAPI.'API_Boutique?dis=xc&id='.$id);
			$data['life'] = json_decode(json_decode($life),true);
			
			$this->load->view('lifeInfo',$data);
		}

	}
	//图文详情
	public function lifeInfo2(){
		 $this->load->view('lifeInfo2');
	}
	//宴会定制详情
	public function partyInfo(){
		if($_GET){
			$id = $_GET['id'];
			$foods = file_get_contents(POSTAPI.'API_Food?dis=taocanxq&foodid='.$id);
	        $foods = json_decode(json_decode($foods),true);
	        if(isset($_SESSION['shoping'])){
	        	if($_SESSION['shoping'] != ''){
	        		$shoping = $_SESSION['shoping'];
	        		foreach ($shoping as $key => $value) {
        				if($value['foodid'] == $foods[0]['foodid']){
        					//var_dump(123);
        					$foods[0]['number'] = $value['number'];
        				}
	        		}
	        	}
	        }
	        $data['foods'] = $foods;
			// 产品图片
			$foodpic= file_get_contents(POSTAPI.'API_Food?dis=xqimg&foodid='.$id);
			$data['foodspic'] = json_decode(json_decode($foodpic),true);
			// 菜品评分
			$fen = file_get_contents(POSTAPI.'API_Food?dis=number&foodid='.$id);
			$data['fen'] = json_decode(json_decode($fen),true);
			// 菜品评价
			$commen = file_get_contents(POSTAPI.'API_Food?dis=spl&foodid='.$id);
		    $data['evaluate'] = json_decode(json_decode($commen),true);
			$this->load->view('partyInfo',$data);
		}
	}
	public function backmoney(){

		$this->load->view('backmoney');
	}
	public function registgift(){
		$this->load->view('registgift');
	}
 
	//套餐详情
	public function dinner(){


		$this->load->view('dinner');
	}
	// 加入购物车
	public function addcart(){
			if($_POST){
				$foodid = $_POST['foodid'];
				$numbers = $_POST['numbers'];
				$code = $_POST['code'];

				$data = array();
				foreach($foodid as $k=>$v){
					$data[$k]['foodid'] = $foodid[$k];	
					$data[$k]['numbers'] = $numbers[$k];	
					$data[$k]['code'] = $code[$k];	
				}
				$arr = array_no_empty($data);
			if(empty($arr)){
				echo "<script>alert('你还没有可提交的菜品。');window.location.href='cailan';</script>";
			}else{
				
				$shopid = rand(1,100);
				foreach($arr as $key=>$val){
						$a['foodid']= $val['foodid'];
						$a['number']= $val['numbers'];
						$a['code']= $val['code'];
						$a['shopid']= $shopid;
						$a['time']= date('Y-m-d H:i:s');
						$c[] = $a;
				}
				
					if(isset($_SESSION['shoping'])){
						$shoping = $_SESSION['shoping'];
					}else{
						$shoping = '';
					}

					if($shoping == ''){
					 	$this->session->set_userdata('shoping',$c,0);
					}else{
						foreach($shoping as $key=>$value){
							foreach($c as $k=>$v){
								if($value['foodid'] == $v['foodid']){
									unset($shoping[$key]);
								}
							}
						}
						$f = array_merge($shoping,$c);
					 	$this->session->set_userdata('shoping',$f,0);

					 	
					}
				redirect('home/cart');
				}
			exit;
		}
	}
	// food添加购物车
	public function foodaddcart(){
		// var_Dump($_POST);
		if($_POST){

			$foodid = trim($_POST['foodid']);
			$shopid = $_POST['shopid'];
			$number = $_POST['numbers'];
			$code = $_POST['code'];
			if(empty($number)){
				echo "<script>alert('你还没有可提交的菜品。');history.go(-1);</script>";
			}else{
				if($shopid == NULL){
					$shopid = rand(1,100);
					$data['foodid'] = $foodid;
					$data['number'] = $number;
					$data['shopid'] = $shopid;
					$data['code'] = $code;
					$data['time'] = date('Y-m-d H:i:s');
					$c[] = $data;
					if(isset($_SESSION['shoping'])){
						$shoping = $_SESSION['shoping'];
					}else{
						$shoping = NULL;
					}
					if($shoping == NULL){
					 	$this->session->set_userdata('shoping',$c,0);
					}else{
						foreach($shoping as $key=>$value){
							foreach($c as $k=>$v){
								if($value['foodid'] == $v['foodid']){
									unset($shoping[$key]);
								}
							}
						}
						$f = array_merge($shoping,$c);
					 	$this->session->set_userdata('shoping',$f,0);
					}	
				}else{
					$shoping = $_SESSION['shoping'];
					foreach($shoping as $k=>$v){
						if($shopid == $v['shopid'] && $foodid == $v['foodid']){
							$shoping[$k]['number'] = $number;
						}
					}
					$this->session->set_userdata('shoping',$shoping,0);
				}
				redirect('home/cart');
			}
			
		}
	}
	// 注销
	public function zhuxiao(){
		unset(
			$_SESSION['userinfo'],
		    $_SESSION['shoping'],
		    $_SESSION['booking'],
		    $_SESSION['phone'],
		    $_SESSION['witer'],
		    $_SESSION['eleg'],
		    $_SESSION['cerearr'],
			$_SESSION['postBooking'], 
			$_SESSION['rePayData'],
			$_SESSION['ceremoney']
			
		);	
		echo "<script>alert('注销成功;');window.location.href='index';</script>";
	}
	//购物车 new
	public function cart(){
		if(isset($_SESSION['shoping'])){
			if($_SESSION['shoping'] != NULL){
				$shoping = $_SESSION['shoping'];
				foreach ($shoping as $key => $value) {
					switch ($value['code']) {
						// 点菜
						case '0':
							$data['carts']['diancai'][$key] = $value;
							break;
						// 套餐
						case '1':
							$data['carts']['taocan'][$key] = $value;
							break;
						// 净菜
						case '2':
							$data['carts']['jincai'][$key] = $value;
							break;
					}
				}
			}else{
				$data['carts'] = '';
			}
		}else{
			$data['carts'] = '';
		}

		// 服务员
		if(isset($_SESSION['witer'])){
			if($_SESSION['witer'] == ''){
				$data['witer'] = '';
			}else{
				$data['witer'] = $_SESSION['witer'];
			}
		}else{
			$data['witer'] = '';
		}
		// 伴餐
		//var_Dump($_SESSION['eleg']);
		if(isset($_SESSION['eleg'])){
			if($_SESSION['eleg'] == ''){
				$data['eleg'] = '';
			}else{
				$data['eleg'] = $_SESSION['eleg'];
			}
		}else{
			$data['eleg'] = '';
		}
		// 庆典
		if(isset($_SESSION['ceremoney'])){
			if($_SESSION['ceremoney'] == ''){
				$data['cerearr'] = '';
			}else{
				$data['cerearr'] = $_SESSION['ceremoney'];
			}
		}else{
			$data['cerearr'] = '';
		}

		$this->load->view('cart',$data);
	}
	// 删除购物车
	function delcart(){
		$id = $_GET['id'];
		$shoping = $_SESSION['shoping'];
		$booking = $_SESSION['booking'];
		foreach ($booking as $k => $v) {
			if($v['foodid'] == $id){
				unset($booking[$k]);
			}
		}
		foreach ($shoping as $key => $value) {
			if($value['foodid'] == $id){
				unset($shoping[$key]);
			}
		}

		$shoping = array_merge($shoping);
		$booking = array_merge($booking);
		$this->session->set_userdata('shoping',$shoping,0);
		$this->session->set_userdata('booking',$booking,0);
		redirect('home/cart');
	}


	// 减去菜品数量
	public function deletecart()
	{
		if($_POST){
			$foodid = $_POST['foodid'];
			$numbers = $_POST['numbers'];
			$code = $_POST['code'];
			$data = array();
			foreach($foodid as $k=>$v){
				$data[$k]['foodid'] = $foodid[$k];	
				$data[$k]['numbers'] = $numbers[$k];	
				$data[$k]['code'] = $code[$k];	
			}
			if(isset($_SESSION['shoping'])){
				$shoping = $_SESSION['shoping'];
				foreach($shoping as $key=>$value){
					foreach($data as $k=>$v){
						if($value['foodid'] == $v['foodid']){
							$shoping[$key]['number'] = $v['numbers'];
						}
					}
				}
				// 如果数量为0就删除该数组
				foreach ($shoping as $key => $val) {
					if($val['number'] == '0'){
						unset($shoping[$key]);
					}
				}
			 	$this->session->set_userdata('shoping',$shoping);
			}
			exit;
		}
	}

	 //支付订单
    public function payOrder(){

		$this->load->view('payOrder');
	}
	//支付账号
    public function payLast(){

		$this->load->view('payLast');
	}
	//付款成功
    public function paySuccess(){
		unset(
			$_SESSION['shoping'],      
			$_SESSION['booking'],      
			$_SESSION['witer'],        
			$_SESSION['postBooking'], 
			$_SESSION['rePayData'],
			$_SESSION['ceremoney'],
			$_SESSION['eleg']
		);
		$this->load->view('paySuccess');
	}
	//评价 
	public function comment(){
		if($_GET){
			$POOrderId['id'] = $_GET['id'];
			
			$this->load->view('comment',$POOrderId);
		}
	}
	
	//单个菜品评价
	public function singleComment(){
		$data['foodid'] = $_GET['id'];
		$data['foodpic'] = $_GET['foodpic'];
		$data['POOrderId'] = $_GET['POOrderId'];
		$this->load->view('singleComment',$data);
	}

   //个人中心
	public function ucent(){
		if(isset($_SESSION['phone'])){
			if($_SESSION['phone'] == NULL){
				$data['user'] = '';
			}else{
				$user = file_get_contents(POSTAPI."API_User?dis=ckxx&UserPhone=".$_SESSION['phone']);
				$data['users'] = json_decode(json_decode($user),true);
			}
		}else{
			$data['users'] = '';
		}
		$this->load->view('usercenter',$data);
	 }
	//个人设置
	public function set(){
		if(isset($_SESSION['phone'])){
			if($_SESSION != NULL){
				$userinfo = file_get_contents(POSTAPI.'API_User?dis=ckxx&UserPhone='.$_SESSION['phone']);
				$data['user'] = json_decode(json_decode($userinfo),true);
				}else{
					$data['user'] = '';
				}
				$this->load->view('set',$data);
		}else{
			echo "<script>alert('你还没有登陆!');window.location.href='login2';</script>";
		}
	}
	//更改用户资料
	public function userdatum()
	{   
	
		if($_POST){
			$data['UserId'] = $_POST['UserId'];
			$data['PersonalTaste'] = $_POST['PersonalTaste'];
			if(isset($_POST['LikeCuisine'])){
			if($_POST['LikeCuisine']){
				$data['LikeCuisine'] = implode(',',$_POST['LikeCuisine']);
			}
			}else{
				$data['LikeCuisine'] = $_POST['like'];
			}
			$data['UserName'] = $_POST['UserName'];
			
			if(!empty($_FILES['UserImage']['tmp_name'])){

				$f=&$_FILES['UserImage'];
				$dest_dir='./upload/image';//设定上传目录
				$hou = explode('.',$_FILES['UserImage']['name']);
				$dest=$dest_dir.'/'.date("ymd")."_".date('His').'.'.$hou[1];//我这里设置文件名为日期加上文件名避免重复
				$r=move_uploaded_file($f['tmp_name'],$dest);
				
				$type = pathinfo($dest, PATHINFO_EXTENSION);
				$base = file_get_contents($dest);
				$data['UserImage'] = base64_encode($base);

			}else{
				$data['UserImage'] = '';
			}
			$jsonuser = json_encode($data);
			$user = curl_post(POSTAPI.'API_User?dis=update',$jsonuser);
			if($user == 1){
				if(isset($dest)){
					@unlink ($dest);
				}
				echo "<script>alert('个人资料修改成功！');self.location=document.referrer;</script>";
			}
			
		}
	}
    //搜索
    public function search(){
    	if($_POST){
    		$q = $_POST['search'];
    		$search = file_get_contents(POSTAPI."API_Food?dis=ss&foodid=".$q);

    		$data['search'] = json_decode(json_decode($search),true);
    		$this->load->view('search',$data);
    	}else{
    		// $data['sear'] = get_cookie('search');
    		$this->load->view('search');
    	}
    	
	}
	 //搜索结果页
    public function searchPage(){

		$this->load->view('searchPage');
	}
	//订单记录 修改版
    public function orderRe(){
    	if(isset($_SESSION['phone'])){
    		if(empty($_SESSION['phone'])){
    			$data['record'] = '';
    		}else{
    			$jsonorder = file_get_contents(POSTAPI.'API_Poorder?dis=all&UserPhone='.$_SESSION['phone']);
				 //var_dump($jsonorder);
				// $food = ltrim(rtrim($jsonorder,'"'),'"');
				// 转换json
				// $a =   str_replace('\"','"',$food);
				//var_Dump($a);
    			$data['record'] = json_decode(json_decode($jsonorder),true);
       		}
    	}else{
    		$data['record'] = '';
    	}
		//var_Dump($data);
		$this->load->view('orderRecorde',$data);
	}
   //订单详情
    public function orderI(){

		$this->load->view('orderInfo');
	}
	//优惠券
    public function card(){
    	if(isset($_SESSION['phone'])){
    		$card =file_get_contents(POSTAPI."API_UserCoupon?UserPhone=".$_SESSION['phone']);
  
    		$data['cards'] = json_decode(json_decode($card),true);
    	}else{
    		$data['cards'] = '';
    	}
    	$this->load->view('card',$data);
	}
	//领券
	public function cardGet(){

		$this->load->view('cardGet');
	}

	//地址管理
	public function address2(){
		if(isset($_SESSION['phone'])){
			$address = file_get_contents(POSTAPI."API_MenberAddress?dis=all&value=".$_SESSION['phone']);
			$data['address'] = json_decode(json_decode($address),true);
		}else{
			$data['address'] = NULL;
		}
		$this->load->view('address2',$data);
	}
	//新增address
	public function addressAdd2(){
		if(!isset($_SESSION['phone'])){
			echo "<script>alert('你还没有登陆哦！');window.location.href='login';</script>";
		}else{
		    $a['UserPhone'] = $_SESSION['phone'];
		}
		if($_POST)
		{
			
			$a['Name'] = $_POST['name'];
			$a['Address'] = $_POST['cho_City'].$_POST['cho_Area'].$_POST['cho_Insurer'].$_POST['address'];
			$a['GoodsPhone'] = $_POST['GoodsPhone'];
			$a['SparePhone'] = $_POST['SparePhone'];
			if(!isset($_POST['IsDefault'])){
				$a['IsDefault'] = 0;
			}else{
				$a['IsDefault'] = $_POST['IsDefault'];
			}
			$b = json_encode($a);
			$postadd = curl_post(POSTAPI."API_MenberAddress?dis=xz",$b);
			if($postadd != ''){
				echo "<script>alert('新增地址成功！');window.location.href='address2';</script>";
			}else{
				echo "<script>alert('新增地址失败！');</script>";
			}
		}
		$this->load->view('addressAdd2');
	}
	// 删除地址
	public function deladdress()
	{
		$id = $_GET['id'];
		$isok = file_get_contents(POSTAPI."API_MenberAddress?dis=del&value=".$id);
		$a = str_replace('"', '', $isok);
		if($a = 1){
		echo "<script>alert('删除地址成功！');window.location.href='address2';</script>";
		}else{
		echo "<script>alert('删除地址失败！');window.location.href='address2';</script>";
		}
		
	}
	//编辑地址
	public function editAddress(){
		if($_GET){
			$id = $_GET['id'];
			$isok = file_get_contents(POSTAPI."API_MenberAddress?dis=dzxq&value=".$id);
			$data['address'] = json_decode(json_decode($isok),true);
		
			$this->load->view('editAddress',$data);
		}
	}
	//编辑地址处理
	public function addressedit($value='')
	{
		if($_POST){
			// var_dump($_POST);
			$arr = array(
				'Name'=>$_POST['name'],
				'Address'=> $_POST['cho_City'].$_POST['cho_Area'].$_POST['cho_Insurer'].$_POST['address'],
				'MemberAddressId'=>$_POST['id'],
				'GoodsPhone'=>$_POST['GoodsPhone'],
				'SparePhone'=>$_POST['SparePhone'],
				'UserPhone'=>$_SESSION['phone'],
				);
		
			if(empty($_POST['IsDefault'])){
				$arr['IsDefault'] = 0;
			}else{
				$arr['IsDefault'] = $_POST['IsDefault'];
			}
			
			$jsonval = json_encode($arr);
			$isok = curl_post(POSTAPI."API_MenberAddress?dis=xg",$jsonval);
			if($isok != ''){
				echo "<script>alert('编辑地址成功！');window.location.href='address2';</script>";
			}else{
				echo "<script>alert('编辑地址失败！');window.location.href='address2?id='".$_POST['id'].";</script>";
			}
			
		}
	
	}
	//宴会定制
	public function make(){

		$this->load->view('make');
	}
	//宴会定制选餐
	public function party(){
		$party = file_get_contents(POSTAPI.'API_Food?dis=taocan');
		$data['party'] = json_decode(json_decode($party),true);
		$this->load->view('party',$data);
	}
	//客服
	public function customServ(){
			$this->load->view('custom');
	}
	//会员
	public function vip(){
		if($_GET){
				$data['name'] = $_GET['name'];
				$data['balance'] = $_GET['balance'];
				$this->load->view('vip',$data);
			}else{
				echo "<script>alert('您还没有登陆哟。');window.location.href='login';</script>";
			}
	}
	//会员卡
	public function vipCard(){
		if(isset($_SESSION['phone'])){
			if($_SESSION['phone'] == ''){
				echo "<script>alert('你还没有登陆哦！');window.location.href='login';</script>";
			}
		}else{
			echo "<script>alert('你还没有登陆哦！');window.location.href='login';</script>";
		}
		$vip = file_get_contents(POSTAPI.'API_Grades');
		$data['vip'] = json_decode(json_decode($vip),true);
		$user = file_get_contents(POSTAPI."API_User?dis=ckxx&UserPhone=".$_SESSION['phone']);
		$data['users'] = json_decode(json_decode($user),true);

		$this->load->view('vipCard',$data);
	}
	//开通会员卡
	public function open(){

		$this->load->view('open');
	}
	//购买会员卡
	public function buyCard(){

		$this->load->view('buyCard');
	}
	//开通成功
	public function openSuccess(){

		$this->load->view('openSuccess');
	}
	//菜价比较
	public function priceSearch(){
		// 菜市场
		$caiprice = file_get_contents(POSTAPI.'API_Vegetable?dis=FoodMarket');
		$data['cai']= json_decode(json_decode($caiprice),true);
		// 菜市场分类
		$cate = file_get_contents(POSTAPI.'API_Vegetable?dis=MarketCategorie');
		$data['cates'] = json_decode(json_decode($cate),true);
		// var_Dump($data['cates']);
		$this->load->view('priceSearch',$data);
	}
	//根据菜市获取菜价

	//菜价
	public function price(){
		if($_GET){
			$id['foodmarketid'] = $_GET['id'];
			$id['name'] = $_GET['name'];
			$vegetableid = json_encode($id);
			$isok = curl_post(POSTAPI."API_Vegetable?dis=foodxc",$vegetableid);
			$a = json_decode(json_decode($isok),true);
			for ($i=0; $i <count($a) ; $i++) { 
				$c[$i] = $a[$i]['price'];
			}
			$max= array_search(max($c), $c);
			$min= array_search(min($c), $c);
			$data['max'] = $c[$max];
			$data['min'] = $c[$min];
			$data['price'] = $a;
			$mark = file_get_contents(POSTAPI."API_FoodMarket");
			$data['mark'] = json_decode(json_decode($mark),true);
			//var_dumP($data);
			$data['cainame'] = $_GET['name'];
			$this->load->view('price',$data);
			}
	}
	//意见反馈
	public function message(){

		$this->load->view('message');
	}
	//服务协议
	public function protocol(){

		$this->load->view('protocol');
	}

	//订单状态
	public function orderState()
	{
		$data['State'] = $_GET['state'];
		$data['POOrderId'] = $_GET['id'];
		//var_dump($data);
		$jsonorder = json_encode($data);
		$state = curl_post(POSTAPI.'API_Poorder?dis=state',$jsonorder);
		
		if($state == '"1"'){
			if($_GET['state'] == 7){
				echo "<script>alert('你的退款信息已经提交！');window.location.href='orderRe';</script>";
			}else{
				echo "<script>alert('你的订单已经取消！');window.location.href='orderRe';</script>";
			}
		}else{
			if($_GET['state'] == 7){
				echo "<script>alert('你的退款信息提交失败！')；window.location.href='orderR';</script>";
			}else{
				echo "<script>alert('你的订单取消失败！')；window.location.href='orderR';</script>";
			}
		}

	}

	// 订单历史支付
	public function payment()
	{
		if($_GET){
		//	var_dumP($_SESSION['rePayData']);
			$data['POOrderId'] = $_GET['id'];
			$data['MoneyAll'] = $_GET['money'];
			$arr[] = $data;
			$_SESSION['rePayData'] = $arr;
			//var_dumP($_SESSION['rePayData']);
			 redirect('orderWXPay/jumpLink');
		}
	}

	//删除订单
	public function delorder()
	{
		if($_GET){
			$id = $_GET['id']; 
			$del = file_get_contents(POSTAPI.'API_Poorder?dis=IsDisplay&UserPhone='.$id);
			if($del == '"1"'){
				    echo "<script>alert('删除订单记录成功！');window.location.href='orderRe';</script>";
			}else{
					echo "<script>alert('删除订单记录失败！');window.location.href='orderRe';</script>";
			}
		}
	}
	//庆典主题
	public function ceremonyType(){

		$cere = file_get_contents(POSTAPI.'API_Celebration');
		$data['cere'] = json_decode(json_decode($cere),true);
		// var_dumP($data);
		$this->load->view('ceremonyType',$data);
	}
	//庆典介绍
	public function ceremony(){
		$id = $_GET['id'];
		// 获取主提简介
		$cereinfo = file_get_contents(POSTAPI.'API_Celebration?id='.$id);
		$data['cereinfo'] = json_decode(json_decode($cereinfo),true);
		// 获取所有区域
		$arr['id'] = $id;
		$josndata = json_encode($arr);
		$details = curl_post(POSTAPI.'API_details',$josndata);
		$data['details'] = json_decode(json_decode($details),true); 
		$data['id'] = $id;
		$this->load->view('ceremony',$data);
	}
	//庆典详情选择
	public function CeremonyChose(){

		// 获取所有区域
		if($_GET){
			$id = $_GET['id'];
			$details = file_get_contents(POSTAPI.'API_details?dis=qy');
			// var_dump($details);
			$data['details'] = json_decode(json_decode($details),true); 
		 	$data['id'] = $id;
		 	$data['name'] = $_GET['name'];
		 	// var_dump($data['name']);
			$this->load->view('CeremonyChose',$data);
		}
		
	}
	// 庆典加入购物车
	public function cereOrder()
	{
		if($_POST){
				$cere['moneyall'] = $_POST['moneyall'];
				$cere['name'] = $_POST['detailsname'];
				$cere['celebrationid'] = $_POST['CelebrationId'];
				$zu  =$_POST['zu'];
				$a = array();
				// 获取所有的产品id
				foreach ($zu as $key => $value) {
					$a['id'][$key] = $_POST['cereid'.$value];
					$a['nub'][$key] = $_POST['numbers'.$value];
				}
				// 组合id和数量
				foreach ($a['id'] as $key => $value) {
					foreach ($value as $k => $v) {
						$data[$key+1][$k]['detailsId'] = $a['id'][$key][$k];
						$data[$key+1][$k]['detailsNumber'] = $a['nub'][$key][$k];
					}
				}
			
				$cere['celeentry'] = $data;
				$_SESSION['ceremoney'] = $cere;
				redirect('home/cart');

		}
		
	}
	// 庆典购物车修改
	public function editcere()
	{
		if($_GET){
			$id = $_GET['id'];
			$details = file_get_contents(POSTAPI.'API_details?dis=qy');
			// var_dump($details);
			$data['details'] = json_decode(json_decode($details),true); 
		 	$data['id'] = $id;
		 	$data['name'] = $_GET['name'];
		 	$data['cerearr'] = $_SESSION['ceremoney']['celeentry'];
		 	
			$this->load->view('CeremonyEdit',$data);
		}
	}


    //伴餐
    public function elegance(){
    	$eleg = file_get_contents(POSTAPI.'API_Dinner');
    	$data['eleg'] = json_decode(json_decode($eleg),true);
		$this->load->view('elegance',$data);
	}
	//伴餐 详情
    public function eleganceInfo(){
    	if($_GET){
    		// 获取banner
    		$banner = file_get_contents(POSTAPI.'API_Banner?number=3&dis=number');
    		$data['banner'] = json_decode(json_decode($banner),true);
			$content = $_GET['con'];
			$data['money'] = $_GET['money'];
			$data['title'] = $_GET['title'];
			$data['id'] = $_GET['id'];
			$data['cont'] = explode('，',$content);
			$this->load->view('eleganceInfo',$data);
    	}
	}
	// 伴餐加入购物车
	public function eleganceadd()
	{	
		if($_POST){
			unset($_SESSION['eleg']);
			$_SESSION['eleg']['title'] = $_POST['title'];
			$_SESSION['eleg']['money'] = $_POST['money'];
			$_SESSION['eleg']['id'] = $_POST['id'];
		}
		
	}
	// 伴餐删除
	public function elegdel(){
		if($_GET){
			$id= $_GET['id'];
			if($id == 1){
				unset($_SESSION['eleg']);
				redirect('home/cart');
			}else{
				unset($_SESSION['ceremoney']);
				redirect('home/cart');
			}
		}
	}
    //净菜 vegetable
    public function vegetable(){
    	$catejson = file_get_contents(POSTAPI.'API_Food?dis=c');
		$data['cates'] = json_decode(json_decode($catejson),true);
		$foodjson = file_get_contents(POSTAPI.'API_Food?dis=kind');
		// 去掉首尾引号
		$food = ltrim(rtrim($foodjson,'"'),'"');
		// 转换json
		$a =   str_replace('\"','"',$food);
		$foods = json_decode($a,true);
	
		if(isset($_SESSION['shoping'])){
			if($_SESSION['shoping'] != ''){
				$shop = $_SESSION['shoping'];
				foreach($foods as $k=>$v){
					$foods[$k]['number'] = '0';
					foreach ($shop as $key => $value) {
						if($v['foodid'] == $value['foodid']){
							$foods[$k]['number'] = $value['number'];
						}
					}
					
				}
			}
		}
		$data['foods'] = $foods;
	
		$this->load->view('vegetable',$data);
	}
    //服务 service
    public function service(){
    	// 获取banner
    	$banner = file_get_contents(POSTAPI.'API_Banner?number=2&dis=number');
    	$data['banner'] = json_decode(json_decode($banner),true);

    	$service = file_get_contents(POSTAPI.'API_Serviceidea');
    	$data['serv'] = json_decode(json_decode($service),true);

		$this->load->view('service',$data);
	}
	// 服务员加入购物车
	public function servadd()
	{
		if($_POST){
			$arr = $_POST;
			$_SESSION['witer'] = $arr;
			redirect('home/cart');
		}
	}



	//发现
	public function find(){
		// banner
		$banner = file_get_contents(POSTAPI.'API_Banner?number=4&dis=number');
		$data['banner'] = json_decode(json_decode($banner),true);
		// 产品推荐
		$foods = file_get_contents(POSTAPI.'API_Food?dis=tuijian');
		$data['foods'] = json_decode(json_decode($foods),true);
		// 促销信息
		$cuxiao = file_get_contents(POSTAPI.'API_FoodDiscount?start=1&end=4');
		// 去掉首尾引号
		$cu = ltrim(rtrim($cuxiao,'"'),'"');
		// 转换json
		$cuxiao =   str_replace('\"','"',$cu);
	
		$data['promotion'] = json_decode($cuxiao,true);
		// 精品生活
		$query = file_get_contents(POSTAPI.'API_Boutique?dis=jpsh&star=1&end=2');
		$data['jinpin'] = json_decode(json_decode($query),true);
		// 七嘴八舌
		$qi = file_get_contents(POSTAPI.'API_Evaluate');
		$food = ltrim(rtrim($qi,'"'),'"');
		// 转换json
		$a =   str_replace('\"','"',$food);
		$data['qi'] = json_decode($a,true);

		$this->load->view('find',$data);
	}
	//厨师管理
	public function chefManage(){

		$this->load->view('chefManage');
	}
	//服务地址
	public function serve_address(){

		$this->load->view('serve_address');
	}


}


?>