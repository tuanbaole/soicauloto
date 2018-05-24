<div class="card card-container">
<?php echo $this->Html->image('logo/avatar_2x.png', array('alt' => 'Login','id' => 'profile-img','class' => 'profile-img-card')); ?>
<p id="profile-name" class="profile-name-card"></p>
<?php echo $this->Form->create('User',array("class"=>"form-signin")); ?>
<span id="reauth-email" class="reauth-email"></span>
<?php	
	echo $this->Form->input('username', 
		array(
			'type'=>'text', 
			'class'=>'form-control',
			"required" => true,
			"autofocus" => true,
			"placeholder" => __("Tài Khoản"),
			"id" => "inputEmail",
			"label" => false
		)
	);

	echo $this->Form->input('password', 
		array(
			'type'=>'password', 
			"id" => "inputPassword",
			'class'=>'form-control',
			"placeholder" => "Mật Khẩu",
			"label" => false
		)
	);    
?>
<?php if (isset($error)): ?>
	<span class="error"><?php echo $error; ?></span>
<?php endif ?>
<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo __('Đăng Nhập'); ?></button>
<?php $this->Form->end(__('Đăng Nhập'),array("class" => "btn btn-lg btn-primary btn-block btn-signin")); ?>
<?php echo $this->Html->link(__('Quên Mật Khẩu'),array("controller" => "users","action" => "forget_password"),array("class" => "button-style btn btn-lg btn-primary btn-block btn-signin")); ?>
<?php echo $this->Html->link(__('Gia Hạn'),array("controller" => "giahans","action" => "giahan"),array("class" => "button-style btn btn-lg btn-primary btn-block btn-signin")); ?>
</div><!-- /card-container -->