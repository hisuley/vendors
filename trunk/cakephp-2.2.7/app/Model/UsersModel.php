<?php
class UsersModel extends AppModel{
	var $name = 'Users';
	var $validate = array(
		'username' => array(
			'rule'=>'notEmpty',
			'required' => true,
			'message' => '用户名不能为空！'
			),
		'password' => array(
			'rule' => array('minLength', '8'),
			'message' => "密码长度最短8个字符";
			)
		);
	/**
	 * Get user detail information by id
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function find($id){
		if(!empty($id)){
			$sql = "SELECT * FROM users WHERE id=".trim($id);
			$queryUserInfo = $GLOBALS['db']->getRow($sql);
			return $queryUserInfo;
		}else{
			return false;
		}
	}
	/**
	 * Get my profile
	 * TODO: add priviledge verified process
	 * @return [type] [description]
	 */
	public function myProfile(){
		$id = $this->Users->getMyId();
		$myProfile = $this->Users->find($id);
		if($myProfile){
			$this->set('myProfile',$myProfile);
			return $myProfile;
		}else{
			return false;
		}
	}
	/**
	 * Get my orders
	 * TODO: add priviledge verified process
	 * @return [type] [description]
	 */
	public function myOrders(){
		if(false !== $this->Users->getMyId()){
			$sql = "SELECT * FROM orders WHERE uid=".trim($id);
			$queryMyOrdersInfo = $GLOBALS['db']->getRow($sql);
			return $queryMyOrdersInfo;
		}else{
			return false;
		}
	}
	public function getMyId(){
		if($this->Session->read('User.id')){
			return $this->Session->read('User.id');
		}else{

		}
	}
	public function save(){

	}
}
?>