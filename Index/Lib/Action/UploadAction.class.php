<?php
// 本类由系统自动生成，仅供测试用途
class UploadAction extends Action {
    public function upload(){
		//$this->show('welcome to lujianfei\'s login');
		//传入用户名和密码
    	import("ORG.Net.UploadFile");
        $upload = new UploadFile();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
	    $upload->savePath  =      './upload/'; // 设置附件上传目录
	    // 上传文件 
	    $info   =   $upload->upload();
	    if(!$info) {// 上传错误提示错误信息
	    	$data['status']  = 0;
	        $data['info'] = $upload->getErrorMsg();
	    }else{// 上传成功
	    	$data['status']  = 1;
	    	$data['info'] = 'upload successful';
	    }
		$data['data'] = '';
	//	$this->ajaxReturn($data);
		return;
    }
}