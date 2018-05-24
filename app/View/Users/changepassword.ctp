<div class="card card-container">
<p id="profile-name" class="profile-name-card"><?php echo __("Đổi Mật Khẩu"); ?></p>
<?php echo $this->Form->create('User',array("class"=>"form-signin","required" => true)); ?>
<span id="reauth-email" class="reauth-email"></span>
<?php	
	echo $this->Form->input('password', 
		array(
			'type'=>'password', 
			'class'=>'form-control',
			"required" => true,
			"autofocus" => true,
			"placeholder" => __("Mật Khẩu Cũ"),
			"id" => "inputEmail",
			"label" => false,
		)
	);

	echo $this->Form->input('new_password', 
		array(
			'type'=>'password', 
			"id" => "inputPassword",
			'class'=>'form-control',
			"required" => true,
			"placeholder" => "Mật Khẩu Mới",
			"label" => false
		)
	);

	echo $this->Form->input('confirm_password', 
		array(
			'type'=>'password', 
			"id" => "inputPassword",
			'class'=>'form-control',
			"required" => true,
			"placeholder" => "Xác Mật Khẩu",
			"label" => false
		)
	);    
?>
<?php if (isset($error)): ?>
	<div class="error" align="center"><?php echo $error; ?></div>
<?php endif ?>
<button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"><?php echo __('Thay Đổi'); ?></button>
<?php $this->Form->end(__('Đăng Nhập'),array("class" => "btn btn-lg btn-primary btn-block btn-signin")); ?>
<?php echo $this->Html->link(__('Quay Lại'),array("controller" => "users","action" => "login"),array("class" => "button-style btn btn-lg btn-primary btn-block btn-signin")); ?>
</div><!-- /card-container -->