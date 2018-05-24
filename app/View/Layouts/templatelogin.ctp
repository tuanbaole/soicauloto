<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<?php $cakeDescription = __d('cake_dev', 'Đăng Nhập'); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->css(array(
			'../bootstrap/css/bootstrap.min.css',
			'newstyle.css',
			'login.css'
		));
		echo $this->Html->script(array(
			'../jquery/jquery.js',
			'../bootstrap/js/bootstrap.min.js',
			
		));
		echo $this->Html->meta('icon','img/sx.icon.png');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>
