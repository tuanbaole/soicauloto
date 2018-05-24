<?php echo $this->Html->script('../template/assets/js/vendor/jquery-2.1.4.min.js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
<?php 
echo $this->Html->script(array(
    '../template/assets/js/plugins.js',
    '../template/assets/js/main.js',
    '../template/assets/js/lib/chart-js/Chart.bundle.js',
    '../template/assets/js/dashboard.js',
    '../template/assets/js/widgets.js',
    '../template/assets/js/lib/vector-map/jquery.vmap.js',
    '../template/assets/js/lib/vector-map/jquery.vmap.min.js',
    '../template/assets/js/lib/vector-map/jquery.vmap.sampledata.js',
    '../template/assets/js/lib/vector-map/country/jquery.vmap.world.js'
));
?>