<?php
defined('BASEPATH') OR exit('No direct script access allowed');


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


class orderWXPay extends CI_Controller{
	function __construct()
	{
        parent::__construct();
        // * 引入config配置项
        // $this->config->load('wechat');
        // $options = $this->config->item('wechat');
        // $options['logcallback'] = 'logdebug';
        // * 引入自定义lib
        $this->load->library('WxPayApi');
        $this->load->library('JsApiPay'); 
        $this->load->helper('post_helper');
        $this->load->view('header'); 
	}
   

//订单
    public function order(){
    	if ($_POST){
            if(!isset($_SESSION['phone'])){
                echo "<script>alert('你还没有绑定手机号！');window.location.href='".site_url('home/binding')."';</script>";
            }else{   
                if($_SESSION['phone'] == NULL){
                    echo "<script>alert('你还没有绑定手机号！');window.location.href='".site_url('home/binding')."';</script>";
                }else{

                    if ($this->input->post('servmoneydata')) {
                       $_SESSION['servmoneydata'] = $this->input->post('servmoneydata');
                    }else{
                       $_SESSION['servmoneydata'] = 0;
                    } 
                  
                    $_SESSION['witer']['boy']=$_POST['boy'];
                    $_SESSION['witer']['girl']=$_POST['girl'];
                    if($this->input->post('foodid')){

                    $_SESSION['postBooking'] = array_combine($this->input->post('foodid'),$this->input->post('numbers')); 
                    }
            	    if(isset($_SESSION['phone'])){
                		// 获取积分
                        if($this->input->post('foodid')){
                            $data['jifen'] =json_decode(file_get_contents(POSTAPI."API_User?dis=jf&UserPhone=".$_SESSION['phone']));
                        }
                		
                		//获取用户默认地址、
                		$address = file_get_contents(POSTAPI."API_MenberAddress?dis=all&value=".$_SESSION['phone']);
                		$data['address'] = json_decode(json_decode($address),true);
            	    }

                    $data['servmoneydata'] = $_SESSION['servmoneydata'];
                    $data['booking'] = $_SESSION['booking'];
                	$data['writes'] = $_SESSION['witer'];
                	$data['postBooking'] = $_SESSION['postBooking'];
                    $data['eleginfo'] = $_SESSION['eleg'];
                    if(isset($_SESSION['ceremoney'])){
                        $data['ceremony'] = $_SESSION['ceremoney'];
                      }else{
                        $data['ceremony'] = '';
                      }
             	    $this->load->view('order/order',$data);
                }
            }
        }
    }
  


//支付订单
    public function payOrder()
    {
        if($_POST){
			//var_dump($_POST);
            $foodid = $this->input->post('foodid');
            $numbers = $this->input->post('numbers');
            if($foodid){
                $foodOrder = array_combine($foodid,$numbers);
                $foodJson = array();
                foreach ($foodOrder as $fid => $fnums)
                { $foodJson[] = "{'FoodId':"."'".$fid."'".","."'FoodNumber':"."'".$fnums."'"."}"; }
            }else{
                $foodJson = '[]';
            }
            // 伴餐
            if($this->input->post('eleg')){
                $foodJsondata['DinnerId'] = $this->input->post('eleg');
            }else{
                $foodJsondata['DinnerId'] = '';
            }
            // 服务男
            if($this->input->post('boy')){
                $foodJsondata['manWaiter'] = $this->input->post('boy');
            }else{
                $foodJsondata['manWaiter'] = 0;
            }
            // 服务员女
            if($this->input->post('girl')){
                $foodJsondata['wumenWaiter'] = $this->input->post('girl');
            }else{
                $foodJsondata['wumenWaiter'] = 0;
            }
            // 所有菜品、
            $foodJsondata['poorderentry'] = $foodJson;
            echo "<pre>";
            // 庆典id
            if($this->input->post('cereid')){
                $foodJsondata['CeleId'] = $this->input->post('cereid');
            }else{
                $foodJsondata['CeleId'] = '';
            }
            // 庆典详情
            if(isset($_SESSION['ceremoney'])){
                 $cele = $_SESSION['ceremoney']['celeentry'];
                 $celearr = array();
                 foreach($cele as $k=>$v){
                    foreach($v as $key=>$val){
                        $celearr[] = $val;
                    }
                 }
                 $arr = array_no_cere($celearr);
                 $c = array();
                 foreach($arr as $k=>$v){
                    $c[] = $v;
                 }
                 $foodJsondata['celeentry'] = $c;
            }else{
                 $foodJsondata['celeentry'] = '[]';
            }
            // 手机
            $foodJsondata['UserPhone'] = $this->input->post('UserPhone');
            // 应付金额
            $foodJsondata['MoneyAll'] = $this->input->post('yfje');
            // 是否使用积分
            if($this->input->post('jifen')){
                 $foodJsondata['Integral'] = '1';
            }else{
                $foodJsondata['Integral'] = 0;
            }
            // 优惠卷
            if( $this->input->post('couponid')){
                $foodJsondata['UserCouponId'] = $this->input->post('couponid');
            }else{
                $foodJsondata['UserCouponId'] = '';
            }
            // 用餐时间
            if( $this->input->post('time')){
                $foodJsondata['AppointmentTime'] = $this->input->post('riqi').' '. $this->input->post('time');
            }else{
                $foodJsondata['AppointmentTime'] = 0;
            }
            // 地址
            $foodJsondata['MenberAddressId'] = $this->input->post('memberaddressid');
            // 支付方式
            $foodJsondata['PaymentMethod'] = '';
            $OrderAllData = str_replace('"{"','{"',str_replace('"}"','"}',str_replace('}"]','}]',str_replace('["{','[{',str_replace("'",'"',json_encode($foodJsondata))))));
            //得到金额
            $isOrderOk=curl_post(POSTAPI.'API_Poorder?dis=dd',$OrderAllData);
            $_SESSION['rePayData'] = json_decode(str_replace(']"',']',str_replace('"[','[',str_replace('\"','"',$isOrderOk))),TRUE);
			
			
            $this->load->view('order/payOrder');
        }
    }
//跳转兼容
    public function jumpLink()
    {
    	$this->load->view('order/payOrder');
    }	
	// 返回购物车
    function gocart(){
        redirect('home/cart');
    } 
	// 返回首页
	function gohome(){
        redirect('home/index');
    }
    // 
    public function unshopdata()
    {
        unset(
        $_SESSION['shoping'],      
        $_SESSION['booking'],      
        $_SESSION['witer'],        
        $_SESSION['postBooking'], 
        $_SESSION['rePayData'],
        $_SESSION['ceremoney'],
        $_SESSION['eleg']
        );
      
        echo "清除完成";
    }
    //  清除redelpaydata
    public function delpaydata()
    {
        if($_POST){
            unset(
                $_SESSION['rePayData']

            );
        }
    }

//订单支付完成,数据提交向后台	
    public function postOrderData()
    {	//如果是会员卡支付
        if ($_GET['MenberMoney'] == 1) {
        $postOrderData['MenberMoney'] = 1;
         $postOrderData['PaymentMoney'] = 0;
        }else{
        $postOrderData['MenberMoney'] = 0;  
        $postOrderData['PaymentMoney'] = str_replace(".0000","",$_SESSION['rePayData'][0]['MoneyAll']);
        }
        // //如果是线下支付
        // if ($_GET['PaymentMethod'] == 2) {
        // $postOrderData['PaymentMethod'] = 2;
        // }else{
        // $postOrderData['PaymentMethod'] = 1;  
        // }
        // //如果是支付宝支付
        // if ($_GET['PaymentMethod'] == 3) {
        // $postOrderData['PaymentMethod'] = 3;
        // }else{
        // $postOrderData['PaymentMethod'] = 1;
        // }
        // //如果是apple Pay支付
        // if ($_GET['PaymentMethod'] == 4) {
        // $postOrderData['PaymentMethod'] = 4;
        // }else{
        // $postOrderData['PaymentMethod'] = 1;
        // }
		
        $postOrderData['POOrderId'] = $_SESSION['rePayData'][0]['POOrderId'];
        $postOrderData['PaymentMethod'] = 1;   
        $postOrderData['UserPhone'] = $_SESSION['phone'];
        $reMsg = curl_post(POSTAPI."API_Poorder?dis=money",json_encode($postOrderData));
       
        // var_dump(POSTAPI."API_Poorder?dis=money",json_encode($postOrderData)); 
        // var_dump($reMsg);
        // exit;
        // if ($reMsg = '""3""') {
        //     echo "<script>alert('支付异常，请联系028-1234567！')</script>";
        //  }else{
        //      echo "<script>alert('支付失败，请联系028-1234567！')</script>";
        //  } 
		
        unset(
			$_SESSION['shoping'], 
			$_SESSION['booking'],
			$_SESSION['witer'],
			$_SESSION['postBooking'], 
			$_SESSION['rePayData'], 
			$_SESSION['ceremoney'],
			$_SESSION['eleg']
        );
		
     	redirect('home/orderRe');
    }
//购买｜充值会员卡  页面
    public function payCardPage()
    {   
        if ($_SESSION['phone'] == null) {
        echo "<script>alert('为保证安全，请重新登录！');window.location.href='".site_url('home/login')."';</script>"; exit;
        }
        $PayVipCard['UserPhone'] = $_SESSION['phone'];
        $PayVipCard['PaymentMethod'] = '0';
        $_SESSION['PayVipCard'] = $_GET['Money'];
        $PayVipCard['Money'] = $_SESSION['PayVipCard'];
        $_SESSION['PayVipCardData'] =json_encode($PayVipCard);
        $_COOKIE['PayVipCardData'] = json_encode($PayVipCard);
        $this->load->view('order/payCardPage');

    }  
//购买或充值会员卡
    public function PayVipCard()
    { 
        // var_dump($_SESSION['PayVipCard']);
        // echo "<hr/>";
        // var_dump($_COOKIE['PayVipCard']);
        //         echo "<hr/>";
        $reMsg = curl_post(POSTAPI."API_Recharge",$_SESSION['PayVipCardData']);
        //         echo "<hr/>";
        // var_dump(POSTAPI."API_Recharge",$_SESSION['PayVipCardData']);
        //         echo "<hr/>";
        // var_dump($reMsg);  
        // if ($reMsg != 1) {
        //     var_dump($reMsg); 
        //    echo '订单异常，请重新充值或购买！';  exit;
        // echo "<script>alert('订单异常，请重新充值或购买！');window.location.href='".site_url('home/vipCard')."';</script>";exit;
        // }
        $_SESSION['PayVipCardData'] ="";
        $_SESSION['PayVipCard']     = "";
        if(isset($_SESSION['phone'])){
            if($_SESSION['phone'] == NULL){
                $data['user'] = '';
            }else{
                $user = file_get_contents(POSTAPI."API_User?dis=ckxx&UserPhone=".$_SESSION['phone']);
                $userdata['users'] = json_decode(json_decode($user),true);
                $data['name']    = $userdata['users'][0]['name'];
                $data['balance'] = $userdata['users'][0]['balance'];
            }
        }
        $this->load->view('vip',$data);
    } 
}
 ?>
