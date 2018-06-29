<!-- Plugin tags -->
<link rel="stylesheet" href="<?php echo admin_public_url(); ?>plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.css">
<script src="<?php echo admin_public_url(); ?>plugins/bootstrap-tagsinput-latest/dist/bootstrap-tagsinput.min.js"></script>

<form method="post">
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Sản phẩm
                <small>Thêm mới sản phẩm</small>
            </h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary" type="button" name="button" form="create_new_product">Lưu</button>
            <button class="btn btn-warning" type="button" name="button">Hủy</button>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">General Elements</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Thông tin sản phẩm</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name product">
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung</label>
                                <textarea id="content" name="content"></textarea>
                                <script type="text/javascript">get_editor('content');</script>
                            </div>
                            <div class="form-group">
                                <a href="#">Thêm mô tả ngắn</a>
                                <section class="hidden_extend">
                                    <textarea class="summary" id="summary" name="summary"></textarea>
                                </section>
                                <script type="text/javascript">get_editor('summary');</script>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 col-xs-12">
                                        <p class="text-left"><label for="name">Ảnh sản phẩm</label></p>
                                    </div>
                                    <div class="col-md-6 col-xs-12">
                                        <p class="text-right"><a href="#">Thêm ảnh sản phẩm</a></p>
                                    </div>
                                </div>
                                
                                <input type="file" class="form-control" id="name" placeholder="Enter name product">
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Giá sản phẩm</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- text input -->
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Giá</label>
                                        <input type="code" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Giảm giá</label>
                                        <input type="text" name="phantram" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <section class="clearfix">
                                            <span class="fLeft">Giá đã bao gồm VAT &nbsp</span>
                                            <input class="tgl tgl-ios" value="1" id="cb2" type="checkbox"/>
                                            <label class="fLeft tgl-btn" for="cb2"></label>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Kho hàng</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <!-- text input -->
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Mã sản phẩm / SKU</label>
                                        <input type="code" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Mã vạch / Barcode (ISBN, UPC, v.v...)</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Quản lý kho</label>
                                        <select class="form-control">
                                            <option value="">Không quản lý kho hàng</option>
                                            <option value="">Quản lý kho hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Số lượng</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <section class="clearfix">
                                        <span class="fLeft">Cho phép tiếp tục đặt hàng khi hết hàng &nbsp</span>
                                        <input class="tgl tgl-ios" value="1" id="cb3" type="checkbox"/>
                                        <label class="fLeft tgl-btn" for="cb3"></label>
                                    </section>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
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
                            <h3 class="box-title">Trạng thái</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <section class="clearfix">
                                    <span class="fLeft">Hiển thị &nbsp</span>
                                    <input class="tgl tgl-ios" value="1" id="cb4" type="checkbox"/>
                                    <label class="fLeft tgl-btn" for="cb4"></label>
                                </section>
                            </div>
                            <div class="form-group">
                                <label for="">Thời gian hiển thị</label>
                                <input type="text" class="form-control" placeholder="Username">
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
                            <h3 class="box-title">Danh mục & Tags</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select class="form-control">
                                    <option>Danh mục sách</option>
                                    <option>Danh mục điện thoại</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tags</label>
                                <input type="text" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput" />

                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="text-right">
                <button class="btn btn-primary" type="button" name="button" form="create_new_product">Lưu</button>
            </div>
            
        </div>
    </div>
</section>
<!-- /.content -->
</form>
<!-- CK Editor -->



