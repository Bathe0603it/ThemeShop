<form method="post">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Tài khoản
                <small>Thêm mới người dùng</small>
            </h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <button class="btn btn-info">Lưu</button>
        </div>
    </div>
    
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <h4>Thông tin tài khoản</h4>
            <p class="text-muted">Tất cả thông tin liên quan đến tài khoản.</p>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="panel panel-default panel-light">
                <div class="box box-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="UserName">Tên</label>
                                    <div class="controls">
                                        <input class="form-control" name="username" placeholder="Nhập Tên" type="text" value="<?php echo set_value('username'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Email">Email</label>
                                    <div class="controls">
                                        <input class="form-control" id="email" name="email" placeholder="Nhập Email" type="text" value="<?php echo set_value('email'); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Tel">Điện thoại</label>
                                    <span class="text-muted">(tùy chọn)</span>
                                    <div class="controls">
                                        <input class="form-control" id="Tel" name="tel" placeholder="Nhập Số điện thoại" type="text" value="<?php echo set_value('tel'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="Address">Địa chỉ</label>
                                    <span class="text-muted">(tùy chọn)</span>
                                    <div class="controls">
                                        <input class="form-control" id="address" name="address" placeholder="Nhập Trang chủ" type="text" value="<?php echo set_value('address'); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="Description">Thông tin giới thiệu</label>
                                    <span class="text-muted">(tùy chọn)</span>
                                    <div class="controls">
                                        <textarea class="form-control" cols="20" id="description" name="description" placeholder="Nhập Thông tin giới thiệu" rows="5"><?php echo set_value('description'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="controls">
                                        <div class="checkbox">
                                            <label class="strong">
                                                <input id="receive" name="Receive" type="checkbox" value="<?php echo set_value('receive'); ?>">
                                                Hãy cập nhập cho tôi những thông báo quan trọng qua Email
                                            </label>
                                            <br>
                                            <p class="text-muted">Chúng tôi sẽ định kỳ gửi các tin tức quan trọng về Bizweb cho các khách hàng qua email. Chúng tôi xin đảm bảo sẽ giữ số lượng email ở mức tối thiểu.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Password">Mật khẩu</label>
                                    <div class="controls">
                                        <input class="form-control" data-val-required="Nhập vào mật khẩu của bạn" id="password" name="password" placeholder="Nhập Mật khẩu" type="password">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="ConfirmPassword">Xác nhận mật khẩu</label>
                                    <div class="controls">
                                        <input class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Nhập lại Mật khẩu" type="password">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Quyền quản trị</h4>
            <p class="text-muted">Chọn các phần mà tài khoản này có thể truy cập được.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Giới hạn quyền truy cập</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                            <i class="fa fa-wrench"></i></button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="display: block;">
                    <div class="row all-roles" bind-show="isLimitAccess">
                        <?php $get_group_system = getGroupSystem(); ?>
                        <?php $list_group_system = $data['list_group_system']; ?>
                        <?php if ($get_group_system): ?>
                            <?php foreach ($get_group_system as $key_ggs => $value_ggs): ?>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <div class="col-sm-9 col-sm-offset-3">
                                            <strong><?php echo $value_ggs; ?></strong>
                                        </div>
                                        <?php if (isset($list_group_system[$key_ggs])): ?>
                                            <?php foreach ($list_group_system[$key_ggs] as $key_lgs => $value_lgs): ?>
                                                <?php
                                                    $name   = $value_lgs['name'];
                                                    $heading = $value_lgs['heading'];
                                                    $id     = $value_lgs['id'];
                                                ?>
                                                <div class="controls col-sm-9 col-sm-offset-3">
                                                    <div class="checkbox">
                                                        <?php echo $heading; ?>&nbsp<label>
                                                        <input type="checkbox" id="role-sales-1" name="roleids[]" value="<?php echo $id ?>">
                                                        <?php echo $name; ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        <?php endif ?>
                        
                    </div>
                </div>
                <!-- ./box-body -->
                <div class="box-footer" style="display: block;">
                    
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</form>