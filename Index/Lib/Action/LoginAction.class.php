<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function login(){
		//$this->show('welcome to lujianfei\'s login');
		//传入用户名和密码
    	$username = I('get.username','');
    	$password = I('get.password','');
		$sql = "select * from tb_user where user_name like '$username' and user_password like '$password'";    	
		$M = D("user");
    	$list  = $M->query($sql);
		//返回结果
		$data['data'] = '';
		if($list!=null){
			$data['status']  = 1;
			$data['info'] = 'login successful';
		}else{
			$data['status']  = 0;
			$data['info'] = 'user not exist';
		}
		$this->ajaxReturn($data);
    }
}