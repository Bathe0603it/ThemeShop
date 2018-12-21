<form method="post">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Thêm mới danh mục
                <small>Quản lý các danh mục</small>
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
        <div class="col-md-8 col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default panel-light">
                        <div class="box box-info">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="control-label strong" for="FullName">Tên danh mục</label>
                                            <div class="controls">
                                                <input class="form-control" id="name" name="name" placeholder="Nhập nhãn" type="text" value="<?php echo set_value('name'); ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="content">Mô tả</label>
                                            <textarea id="content" name="content"></textarea>
                                            <script type="text/javascript">get_editor('content');</script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Xem trước kết quả tìm kiếm (Tùy chỉnh SEO)</h3>
                            
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div>
                                <p>Xin hãy nhập Tiêu đề và Mô tả để xem trước kết quả tìm kiếm của sản phẩm này.</p>
                            </div>
                            <!-- text input -->
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <p><label for="">Thẻ tiêu đề </label><span class="text-right"><b data-bind="(object.seo_title || titlePlaceholder()).length">0</b>/70</span></p>
                                        <input type="code" bind-placeholder="titlePlaceholder()" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <p><label for="">Thẻ mô tả</label><span class="text-right">1/320</span></p>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Đường dẫn / Alias</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">http://batheweb/</span>
                                            <input type="text" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Phân loại danh mục</label>
                                <select class="form-control" name="taxonomy">
                                    <?php if (category_taxonomy()): ?>
                                        <?php foreach (category_taxonomy() as $key => $value): ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select class="form-control" name="parent">
                                    <option value="">Danh mục gốc</option>
                                    <?php if ($rcsCategory): ?>
                                        <?php foreach ($rcsCategory as $key => $value): ?>
                                            <?php
                                                $name = $value['name'];
                                                $heading = $value['heading']; 
                                                $id = $value['id'];
                                            ?>
                                            <option value="<?php echo $id; ?>"><?php echo $heading.' '.$name; ?></option>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ảnh danh mục</label>
                                <input type="file" class="form-control" id="name" placeholder="Enter name product">
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Khung giao diện & Trạng thái</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Khung giao diện</label>
                                <select class="form-control">
                                    <option>Mặc định</option>
                                    <option>Danh mục điện thoại</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <section class="clearfix">
                                    <span class="fLeft">Hiển thị &nbsp</span>
                                    <input class="tgl tgl-ios" value="publish" id="cb4" type="checkbox" name="status" />
                                    <label class="fLeft tgl-btn" for="cb4"></label>
                                </section>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</form>