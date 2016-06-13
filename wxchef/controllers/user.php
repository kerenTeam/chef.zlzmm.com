<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*    y用户
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

class user extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('option_model');
		$data['site'] = $this->option_model->system('siteName');
		$data['keyword'] = $this->option_model->system('keyWord');
		$data['description'] = $this->option_model->system('keyWordDescriber');
		$this->load->view('header',$data);
	}

	public function ucent()
	{
		
		$this->load->view('usercenter');
	}



}





 ?>