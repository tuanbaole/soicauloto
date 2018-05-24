<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <?php echo $this->Html->link(__('Static'), array('action' => 'index'),array('class' => 'navbar-brand')); ?>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-dashboard"></i>'.__('Trang Chủ'), array('action' => 'index'),array('escape' => false)); ?>
                </li>
                <h3 class="menu-title"><?php echo __('Tùy Chọn'); ?></h3><!-- /.menu-title -->
                <li class="active">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-bar-chart"></i>'.__('Quản Lý Doanh Thu'), array('action' => 'index'),array('escape' => false)); ?>
                </li>
                <li class="active">
                    <?php echo $this->Html->link('<i class="menu-icon fa fa-line-chart"></i>'.__('Thông Kê Hàng Tháng'), array('action' => 'index'),array('escape' => false)); ?>
                </li>
                <li class="active">
                    <?php echo $this->Html->link('<i class="menu-icon fa-calendar"></i>'.__('Đăng Kí Sử Dụng'), array('action' => 'index'),array('escape' => false)); ?>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i><?php echo __('Hỗ Trợ') ?></a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html"><?php echo __('Hướng Dẫn Sử Dụng') ?></a></li>
                        <li><i class="fa fa-id-badge"></i><a href="ui-badges.html"><?php echo __('Ý Kiến Đánh Giá') ?></a></li>
                        <li><i class="fa fa-phone"></i><a href="ui-tabs.html"><?php echo __('Thông Tin Liên Hệ') ?></a></li>
                    </ul>
                </li>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
