<?php
	namespace Home\Controller;
	use Think\Controller;

	class LoginController extends Controller{

		/*
		*	登录功能
		*/

		public function login(){

			// echo 123;
			if(IS_POST){
				// echo '<pre>';
				// print_r($_POST);exit;
				$name = $_POST['user_name'];
				$pwd = $_POST['user_password'];
				$model = D('Admin');
				if($model->login($name,$pwd)){
					$this->redirect('/Home/Index/index');
					exit;
				}

				$this -> error($model->getError());
				
			}

			$this->display();
		}


		/*
		*	登出功能
		*/

		public function logout(){
			session(null);
			$this->redirect('Home/Login/login');
		}



















	}