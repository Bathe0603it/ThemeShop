<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tài khoản
        <small>Danh sách các quyền hệ thống</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <h4>Nhân viên quản trị</h4>
            <p class="text-muted">Bạn có thể cấp quyền quản lý website cửa hàng cho người khác bằng các quyền hệ thống.</p>
            <p class="text-muted margin-lg-bottom">
                <a class="btn btn-default" href="<?php echo admin_url($this->object.'/'.$this->create);?>" id="ht-user-add"><span>Thêm mới quyền</span></a>
            </p>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Danh sách quyền hệ thống</h3>
                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Danh mục</th>
                        </tr>
                        <?php if (!empty($data['parent_getall'])): ?>
                            <?php foreach ($data['parent_getall'] as $key => $value): ?>
                                <tr>
                                    <td><?php echo $value['id']; ?></td>
                                    <td><?php echo $value['heading'] ?> <a href="<?php echo admin_url($this->object.'/'.$this->edit.'?id='.$value['id']); ?>"><?php echo $value['name'] ?></a></td>
                                    <td><?php echo $value['description']; ?></td>
                                    <td><?php echo getGroupSystem($value['groupsystem']); ?></td>
                                </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $data['pagination']; ?>
                </div>
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
<!-- /.content -->