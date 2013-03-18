<?php
App::uses('Controller','Controller');
/**
 * User process class
 */
class UsersController extends AppController{
	/**
	 * Pre-define components which are used
	 * @var array
	 */
	var $components = array('Session');
	var $helpers = array('Form','Html','Time','BootstrapCake.Bootstrap');
	var $name = "Users";
	/**
	 *  Actions before other actions
	 * @return [type] [description]
	 */
	function beforeFilter(){
		//$this->Auth->authorize = "users";
		//$this->Auth->allow('register');
		//$this->Auth->loginAction = array('controller'=> 'users', 'action'=>'login');
	}
	public function index(){

	}
	public function register(){

	}
	/*
	 * Login
	 * @return [type] [description]
	 */
	public function login(){
	}
	/**
	 * Display the user's detail information
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function myprofile(){
		$userInfo = $this->Users->myProfile();
		$this->set('userInfo',$userInfo);
		$this->render();
		return $userInfo;
	}
	/**
	 * List the user's orders
	 * @return [type] [description]
	 */
	public function myorder(){
		$orderInfo = $this->Users->myOrders();
		$this->set('orderInfo',$orderInfo);
		$this->render();
		return $orderInfo;
	}
	public function logout(){
		$this->redirect($this->Auth->logout());
	}
	public function save(){
		if(!empty($this->data)){
			if($this->Users->save($this->data)){
				$this->Session->setFlash("个人资料保存成功啦。");
				$this->redirect(array('action' => 'myProfile'));
			}else{
				$this->Session->setFlash("不好意思，个人资料保存保存失败。");
				$this->redirect(array('action' => 'myProfile'));
			}
		}else{
			$this->Session->setFlash("对不起哦，你没填写完整的资料。");
			$this->redirect(array('action' => 'myProfile'));
		}
	}
}
?>