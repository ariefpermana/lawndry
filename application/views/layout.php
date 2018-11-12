<?php 

if($content == 'page/home/index' || $content == 'page/home/detail' || $content == 'page/order/satuan' || $content == 'page/order/kiloan' || $content == 'page/home/more'){
	$this->load->view('component/header');
	$this->load->view($content);
	$this->load->view('component/footer');
}elseif($content == 'page/user/login' || $content == 'page/user/register'){
	$this->load->view('component/header_login');
	$this->load->view($content);
	$this->load->view('component/footer_login');
}else{
	$this->load->view('component/header_admin');
	$this->load->view($content);
	$this->load->view('component/footer_admin');
}

 ?>