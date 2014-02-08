<?php
// 本类由系统自动生成，仅供测试用途
class LoginAction extends Action {
    public function login(){
		//$this->show('welcome to lujianfei\'s login');
		//传入用户名和密码
    	$username = I('post.username','');
    	$password = I('post.password','');
    	
    	$data['data'] = '';
    	$data['info'] = 'username or password is null';
    	$data['status']  = 0;
    	
    	if($username==null || $password==null){
    		$this->ajaxReturn($data);
    		return;
    	}
		$sql = "select * from tb_user where user_name like '$username' and user_password like '$password'";    	
		$M = D("user");
    	$list  = $M->query($sql);
		//返回结果
		if($list!=null){
			$data['status']  = 1;
			$data['info'] = 'login successful';
		}else{
			$data['status']  = 0;
			$data['info'] = 'user not exist';
		}
		//$this->show(""+$list);
		$type['user_type']=$list[0]['user_type'];
		$data['data'] = $type;
		$this->ajaxReturn($data);
		return;
    }
}