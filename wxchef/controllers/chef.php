<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
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


class chef extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper('post_helper');
        $this->load->library('session');
        $this->load->view('header');
    }
    //厨师管理订单页面
    public function index()
    {   

        $chef = file_get_contents(POSTAPI.'API_User?Account='.$_SESSION['username']);
        $data['gh'] = substr(strstr($chef,'+'),1,4);
        $ch = substr($chef,0,-6);
        $data['chef'] = json_decode(json_decode($ch.'"'),true);
        $this->load->view('chef/chefManage',$data);
    }
    //厨师订单历史 
    public function chefOrderHistory()
    {     
        //获取厨师订单历史
        $cheforder = file_get_contents(POSTAPI.'API_Poorder?dis=cookhos&UserPhone='.$_SESSION['username']);
        // 去掉首尾引号
        $order = ltrim(rtrim($cheforder,'"'),'"');
        // 去掉 反斜杠
        $a =   str_replace('\"','"',$order);
        $data['chefOrder'] = json_decode($a,true);
        $this->load->view('chef/chefOrderHistory',$data);
    }
    //厨师订单详情  
    public function chefOrder()
    {
        if($_GET){
            $id = $_GET['id'];
            $poorder = file_get_contents(POSTAPI.'API_Poorder?dis=xq&UserPhone='.$id);
            $data['poorder'] = json_decode(json_decode($poorder),true);
            $this->load->view('chef/chefOrder',$data);
        }

    }

    // 厨师确认订单
    public function chefConfirm()
    {
        if($_GET){
            $data['POOrderId'] = $_GET['poorderid']; 
            $data['State'] = $_GET['state'];
            $poojson = json_encode($data);  
            $poorderok = curl_post(POSTAPI.'API_Poorder?dis=state',$poojson);
            if($poorderok == '"1"'){
                redirect('chef/index');
            }
        }
    }
}


?>