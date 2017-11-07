<form method="post">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Tài khoản
                <small>Thêm mới quyền hệ thống</small>
            </h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <button class="btn btn-info">Lưu</button>
        </div>
    </div>
    
</section>
<!-- Main content -->
<?php dd($getall); ?>
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
                                        <input class="form-control" data-val="true" data-val-length="Nhãn hệ thống không dài quá 50 ký tự" data-val-length-max="255" id="Name" name="Name" placeholder="Nhập nhãn" type="text" value="<?php echo set_value('Name'); ?>">
                                        <div class="has-error">
                                            <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="FullName" data-valmsg-replace="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Permission">Permission</label>
                                    <div class="controls">
                                        <input class="form-control" data-val="true" data-val-required="Nhập vào đường dẫn quyền hệ thống" name="Permission" placeholder="Nhập Permission" type="text" value="<?php echo set_value('Permission'); ?>">
                                        <div class="has-error">
                                            <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="Permission" data-valmsg-replace="true"></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label strong" for="Description">Mô tả quyền hệ thống</label>
                                    <div class="controls">
                                        <input class="form-control" data-val="true" id="Description" name="Description" placeholder="Nhập mô tả quyền hệ thống" type="text" value="<?php echo set_value('Description'); ?>">
                                        <div class="has-error">
                                            <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="Description" data-valmsg-replace="true"></span></span>
                                        </div>
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
                                        <select class="form-control" name="Parent" placeholder="Chọn danh mục quyền">
                                            <option <?php set_select($i=1,'Parent'); ?>></option>
                                        </select>
                                        <div class="has-error">
                                            <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="Parent" data-valmsg-replace="true"></span></span>
                                        </div>
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
                                        <select class="form-control" name="GroupSystem" placeholder="Chọn nhóm quyền hệ thống">
                                            <?php foreach (getGroupSystem() as $key => $value): ?>
                                                <option value="<?php echo $key; ?>" <?php set_select($key,'GroupSystem'); ?>><?php echo $value; ?></option>
                                            <?php endforeach ?>
                                            
                                        </select>
                                        <div class="has-error">
                                            <span class="help-block"><span class="field-validation-valid help-block" data-valmsg-for="GroupSystem" data-valmsg-replace="true"></span></span>
                                        </div>
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