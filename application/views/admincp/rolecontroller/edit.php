<form method="post">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Tài khoản
                <small>Chỉnh sửa quyền hệ thống</small>
            </h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <button class="btn bg-maroon btn-flat margin">Lưu</button>
        </div>
    </div>
    
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="row">
        <div class="col-md-3 col-xs-12">
            <h4>Thông tin hệ thống</h4>
            <p class="text-muted">Tất cả thông tin liên quan đến hệ thống.</p>
        </div>
        <div class="col-md-9 col-xs-12">
            <div class="panel panel-default panel-light">
                <div class="box box-info">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="FullName">Nhãn</label>
                                    <div class="controls">
                                        <input class="form-control" id="name" name="name" placeholder="Nhập nhãn" type="text" value="<?php echo $item['name']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Permission">Permission</label>
                                    <div class="controls">
                                        <input class="form-control" data-val="true" data-val-required="Nhập vào đường dẫn quyền hệ thống" name="permission" placeholder="Nhập Permission" type="text" value="<?php echo $item['permission']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Description">Mô tả quyền hệ thống</label>
                                    <div class="controls">
                                        <input class="form-control" data-val="true" id="description" name="description" placeholder="Nhập mô tả quyền hệ thống" type="text" value="<?php echo $item['description']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="Parent">Danh mục quyền</label>
                                    <span class="text-muted">(tùy chọn)</span>
                                    <div class="controls">
                                        <select class="form-control" name="parent" placeholder="Chọn danh mục quyền">
                                            <option value="0">Danh mục chính</option>
                                            <?php if ($parent_getall): ?>
                                                <?php foreach ($parent_getall as $key => $value): ?>
                                                    <option value="<?php echo $value['id'] ?>" <?php echo $item['parent']==$value['id']?'selected=""':''; ?>> <?php echo $value['heading'].' '.$value['name'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="control-label strong" for="GroupSystem">Nhóm quyền hệ thống</label>
                                    <span class="text-muted">(tùy chọn)</span>
                                    <div class="controls">
                                        <select class="form-control" name="groupsystem" placeholder="Chọn nhóm quyền hệ thống">
                                            <?php foreach (getGroupSystem() as $key => $value): ?>
                                                <option value="<?php echo $key; ?>" <?php echo $item['groupsystem']==$key?'selected=""':''; ?>><?php echo $value; ?></option>
                                            <?php endforeach ?>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</form>