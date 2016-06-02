<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*      登陆 + 注册
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

class login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('option_model');
		$this->load->model('user_model');
		$data['site'] = $this->option_model->system('siteName');
		$data['keyword'] = $this->option_model->system('keyWord');
		$data['description'] = $this->option_model->system('keyWordDescriber');
		// // var_dump($data);
		$this->load->view('header',$data);
		$this->load->helper('post_helper');
	}
	//引导页
    public function quota(){

		$this->load->view('quota');
	}
    //登录页
    public function login(){

		$this->load->view('login');
	}
	//登录页next
    public function login2(){

		$this->load->view('login2');
	}
	//注册页
    public function register(){

		$this->load->view('register');
	}
	// 绑定手机
	public function regadd(){
         // $reigsterFrom = array('UserPhone' => $_POST['UserPhone'],'UserPwd' => $_POST['UserPwd']);
         // $reigsterData = "[".json_encode($reigsterFrom)."]";
         // $isok = curl_post("http://211.149.195.183:88/API/API_Poorder/Post?dis=User&value=".$reigsterData,'');
         // switch ($isok) { //0注册失败   1注册成功  2已有用户
         // 	case '0':
         // 		echo "<script>alert('注册失败！');window.location.href='register';</script>"; exit;
         // 		break;
         // 	case '2':
         // 		echo "<script>alert('该号码已注册！');window.location.href='register';</script>"; exit;
         // 		break;	
         // 	default:
         // 		echo "<script>alert('注册成功！');window.location.href='/home/';</script>"; exit;
         // 		break;
         // }
       
	}



}


?>