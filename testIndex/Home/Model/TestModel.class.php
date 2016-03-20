<?php
	namespace Home\Model;
	use Think\Model;

class TestModel extends Model{


	/*
	*	去除全部数据
	*/
	public function findall(){
		$res = $this -> select();
		return $res;
	}





	/*
	*	循环插入测试数据
	*/
	public function insertdata(){

		for($i=1;$i<=100;$i++){
			$sex = ($i%2)==0?'1':'0';
			// var_dump($sex);exit;
			$data = array(
				'user_name' => 'wocao'.$i,
				'sex' => "$sex",
				'age' => $i,
				'habbit' => 'code',
				'adress' => 'earth'
			);
			$res = $this->add($data);
		}

		return true;

	}













}