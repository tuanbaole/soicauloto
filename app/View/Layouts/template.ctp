<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	</title>
	<?php
        echo $this->Html->css(array(
                '../template/assets/css/normalize.css',
                '../template/assets/css/bootstrap.min.css',
                '../template/assets/css/font-awesome.min.css',
                '../template/assets/css/themify-icons.css',
                '../template/assets/css/flag-icon.min.css',
                '../template/assets/css/cs-skin-elastic.css',
                '../template/assets/scss/style.css',
                '../template/assets/css/lib/vector-map/jqvmap.min.css'
            ));
		echo $this->Html->meta('icon');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
	<?php echo $this->element('left-panel'); ?>
    <div id="right-panel" class="right-panel">
       <?php echo $this->element('header-right-panel'); ?>
       <?php // echo $this->element('breadcrumbs'); ?>
        <div class="content mt-3">
            <div class="animated fadeIn">
        	<?php echo $this->element('fixjs'); ?>
            <?php echo $this->element('library-script'); ?>
            <?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
			<?php echo $this->element('sql_dump'); ?>
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
</body>
<?php echo $this->Html->css('../template/config.css'); ?>
</html>
