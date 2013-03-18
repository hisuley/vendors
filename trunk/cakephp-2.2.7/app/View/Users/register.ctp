<h1>注册用户</h1>
<?php
echo $this->Form->create('user',array('action'=>'/users/save','method'=>'POST'));
echo $this->Form->input('username',array('label'=>"用户名"));
echo $this->Form->input('password',array('label'=>"密码"));
echo $this->Form->end("注册");
?>