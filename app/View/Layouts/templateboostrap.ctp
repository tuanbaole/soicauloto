<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo __("Thống Kê Sổ Xố"); ?>
	</title>
	<?php
		echo $this->Html->css(array(
			'../bootstrap/css/bootstrap.min.css',
			'newstyle.css'
		));
		echo $this->Html->script(array(
			'../jquery/jquery.js',
			'../bootstrap/js/bootstrap.min.js',
			'templateBoostrap.js'
			
		));
		echo $this->Html->meta('icon','img/sx.icon.png');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php $url_no_pass = $this->request->params["controller"]."/".$this->request->params["action"]; ?>
	<nav class="navbar navbar-default" id="menu-header-style">
		<div class="row">
			<div class="col-md-8 col-md-push-2">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>                        
			      </button>
			      <?php 
			      		$activeClass = ($url_no_pass=="bosos/timkiemboso")? "color-white" : "";
			      		$activeClassString = $activeClass." navbar-brand js_loading_page";
			        	echo $this->Html->link(__('Trang Chủ'),
			        	array("controller" => "bosos","action" => "timkiemboso"),
			        	array('class' => $activeClassString)); ?>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      	<ul class="nav navbar-nav">
			      		<li class="js_loading_page <?php echo ($url_no_pass=="dacbiets/soicaulo")? "color-white" : "" ?>">
				        	<?php echo $this->Html->link(__('Soi Cầu'),
				        		array("controller" => "dacbiets","action" => "soicaulo"),
				        		array("escape" => false)); ?>
				        </li>
				        <li class="<?php echo ($url_no_pass=="dacbiets/thongke")? "color-white" : "" ?>">
				        	<?php echo $this->Html->link(__('Dữ Liệu'),
				        		array("controller" => "dacbiets","action" => "thongke"),
				        		array(
				        			"class" => ($url_no_pass=="dacbiets/thongke")? "color-white js_loading_page" : "js_loading_page"
				        		)
				        		); ?>
				        </li>
				        <li class="js_loading_page <?php echo ($url_no_pass=="dacbiets/tien_hanh_cap_nhat_ketqua")? "color-white" : "" ?>">
				        	<?php echo $this->Html->link(__('Lấy Kết Quả'),
				        		array("controller" => "dacbiets","action" => "tien_hanh_cap_nhat_ketqua"),
				        		array("escape" => false)); ?>
				        </li>
			      	</ul>
			       	<ul class="nav navbar-nav navbar-right">
			       		<li class="dropdown">
				       		<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				       			<span class="glyphicon glyphicon-cog"></span>
				       			<?php echo __("Tài Khoản"); ?>
	        				<span class="caret"></span></a>
	        				<ul class="dropdown-menu">
	        					<li class="js_loading_page <?php echo ($url_no_pass=="dacbiets/tien_hanh_cap_nhat_dulieu")? "color-white" : "" ?>">
						        	<?php echo $this->Html->link('<span class="glyphicon glyphicon-folder-open"></span>&nbsp;'.__('Lấy Số Liệu'),
							        	array("controller" => "dacbiets","action" => "tien_hanh_cap_nhat_dulieu"),
							        	array("escape" => false)
						        	); ?>
						        </li>
						        <li class="js_loading_page <?php echo ($url_no_pass=="dacbiets/tien_hanh_cap_nhat_boso")? "color-white" : "" ?>">
						        	<?php echo $this->Html->link('<span class="glyphicon glyphicon-download"></span>&nbsp;'.__('Lấy Bộ Số'),array("controller" => "dacbiets","action" => "tien_hanh_cap_nhat_boso"),array("escape" => false)); ?>
						        </li>
						        <hr class="border-bottom">	
							    <li>
									<?php echo $this->Html->link('<span class="glyphicon glyphicon-lock"></span>&nbsp;'.__('Đổi Mật Khẩu'),
										array("controller" => "users","action" => "changepassword"),
										array("escape" => false)); ?>
							    </li>
							    <li>
							      	<?php echo $this->Html->link('<span class="glyphicon glyphicon-log-out"></span>&nbsp;'.__('Thoát'),
							      		array("controller" => "users","action" => "logout"),
							        	array("escape" => false)
							        	); ?>
							    </li>
							</ul>
					    </li>
				    </ul>
			    </div>
			  </div>
			</div>
		</div>
	</nav>
	<div class="container">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<?php echo $this->element('sql_dump'); ?>
	</div>
	<footer class="footer">
      <div class="container">
        <span class="text-muted" align="center"><?php echo __("Chúc các bạn gặp nhiều thành công.") ?></span>
      </div>
    </footer>
	<div class="bg_load"></div>
	<div class="wrapper">
	    <div class="inner">
	        <span></span>
	        <span></span>
	        <span>X</span>
	        <span>s</span>
	        <span>m</span>
	        <span>b</span>
	        <span></span>
	    </div>
	</div>
</body>
</html>
