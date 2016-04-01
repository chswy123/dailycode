<?php
	namespace Home\Controller;
	use Think\Controller;

class OptionController extends BaseController{

	public function option(){
		$this->display();
	}

	public function acllist(){



		$this->display();
	}

	public function acladd(){

		if(IS_POST){
			$data = $_POST;
			$model = D('Acl');
			if($model->acladd($data)){
				$this->success('添加成功',1);
				exit;
			}
			else{
				$this->error($model->getError);
			}
		}

		$this->display();
	}

	public function rolelist(){

		echo '角色列表';

		$this->display();
	}
}