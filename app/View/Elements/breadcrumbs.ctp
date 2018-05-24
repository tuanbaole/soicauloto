<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="animated fadeIn">
    <div class="row">
         <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                            <?php echo $this->Html->link('<i class="fa fa-link"></i>'.__('Thêm mới'), array('action' => 'add'),array('class' => 'btn btn-link btn-sm','escape'=>false)); ?>
                            </th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($congviecs as $congviec): ?>
                            <tr>
                                <td>
                                    <h4>
                                        <i class="fa fa-user"></i>&nbsp;<?php echo h($congviec['Congviec']['ten_khach_hang']); ?>&nbsp;
                                        <i class="fa fa-phone"></i>&nbsp;<?php echo h($congviec['Congviec']['so_dien_thoai']); ?>
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <div class="row">
                                    <div class="col-md-8 col-sm-8 col-6">
                                        <small>
                                            <?php echo __('Ngày Đến') ?> : <br/><?php echo h($congviec['Congviec']['ngay_den']); ?><br/>
                                            <?php echo __('Ngày Trả') ?> : <br/><?php echo h($congviec['Congviec']['ngay_tra']); ?>
                                        </small>
                                        <div>
                                            <?php echo __('Địa chỉ') ?> : <br/>
                                            <?php echo h($congviec['Congviec']['dia_chi']); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-6 text-right">    
                                        <div>
                                            <h6>
                                                <label><?php echo __('Giá Tiền') ?> : </label>
                                                <?php echo number_format(h($congviec['Congviec']['gia_tien']),0); ?>
                                                <small style="vertical-align: top;" class="unit-price-small">đ</small>
                                            </h6>
                                        </div>
                                        <div>
                                            <h6>
                                                <label><?php echo __('Đã Trả') ?> :</label>
                                                <?php echo number_format(h($congviec['Congviec']['da_tra']),0); ?>
                                                <small style="vertical-align: top;" class="unit-price-small">đ</small>
                                            </h6>
                                        </div>
                                        <div>
                                            <h6>
                                                <label><?php echo __('Còn Nợ') ?> : </label>
                                                <?php echo number_format(h($congviec['Congviec']['con_no']),0); ?>
                                            <small style="vertical-align: top;" class="unit-price-small">đ</small>
                                            </h6>
                                        </div>
                                        <div class="user-area dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                               <span class="btn btn-warning"><i class="fa fa-gear"></i>&nbsp;<?php echo __('Tùy Chọn'); ?></span>
                                            </a>
                                            <div class="user-menu dropdown-menu">
                                                <?php echo $this->Html->link('<i class="fa fa-eye"></i>&nbsp;'.__('Xem'), array('action' => 'view', $congviec['Congviec']['id']),array('class' => 'nav-link','escape' => false)); ?>
                                                <?php echo $this->Html->link('<i class="fa fa-edit"></i>&nbsp;'.__('Sửa'), array('action' => 'edit', $congviec['Congviec']['id']),array('class' => 'nav-link','escape' => false)); ?>
                                                <?php echo $this->Form->postLink('<i class="fa fa-trash-o"></i>&nbsp;'.__('Xóa'), array('action' => 'delete', $congviec['Congviec']['id']), array('class' => 'nav-link','escape' => false), __('Are you sure you want to delete # %s?', $congviec['Congviec']['id'])); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                      </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- .animated -->