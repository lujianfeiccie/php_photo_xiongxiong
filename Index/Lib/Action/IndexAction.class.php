<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
    public function index(){
		//$this->show('welcome to lujianfei\'s web');
    	redirect('/admin/login.html', 0, 'Loading...');
    }
    public function query(){
    	//取得请求参数值
    	$count = $this->_param("count");//单条页数
    	
    	$page = $this->_param("page"); //页码
    	
    	$good_typeid = $this->_param("good_typeid"); //银行
    	
    	$low_integral = $this->_param("low_integral"); //最低积分
    	
    	$high_integral = $this->_param("high_integral"); //最高积分
    	
    	$good_name = $this->_param("good_name"); //商品名称
    	
    	$t_good = "tb_good";
    	
    	if($good_typeid==null){
    		$json_data = array("data"=>"","status" => "0","info"=>"good_typeid should not be null");
    		echo json_encode($json_data);
    		return;
    	}
    	//查询语句
    	$sql = " select good_name,good_integral,good_no,good_imgurl,good_cash from $t_good where good_typeid = $good_typeid ";
    	
    	//加入积分范围查询
    	if($low_integral!=null && $high_integral!=null){
    		$sql = $sql." and good_integral between $low_integral and $high_integral ";
    	}
    	//加入了商品名称的查询
    	if($good_name!=null){
    		$sql = $sql. " and good_name like '%$good_name%' ";
    	}
    	if($count!=null){
    		if($page==null){
    			$sql = $sql." limit $count ";
    			//echo $sql;
    		}else{
    			$min = (int)($page-1)*(int)$count;//设定起始页
    			$sql = $sql." limit $min, $count";
    			//echo $sql;
    		}
    	}
    	$M = D("good_type");
    	//得到数据集
    	$t_good_list  = $M->query($sql);
    	//组装json
    	$json_data = array("data" =>$t_good_list,"status" => "1","info"=>"success");
    	//输出json
    	echo json_encode($json_data);
    }
}