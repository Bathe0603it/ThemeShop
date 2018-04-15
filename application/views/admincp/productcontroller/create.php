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
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name product">
                            </div>
                            <div class="form-group">
                                <p><label for="content">Nội dung</label></p>
                                <textarea id="content" name="content"></textarea>
                                <script type="text/javascript">get_editor('content');</script>
                            </div>
                            <div class="form-group">
                                <a href="#">Thêm mô tả ngắn</a>
                                <section class="hidden_extend">
                                    <textarea class="summary" id="summary" name="summary">This is my textarea to be replaced with CKEditor.</textarea>
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
                                        <label>Giá gốc</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <label>
                                        <input type="checkbox" class="flat-red" checked>
                                        Giá đã bao gồm VAT
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            
        </div>
    </div>
    
</section>
<!-- /.content -->
</form>
<!-- CK Editor -->



