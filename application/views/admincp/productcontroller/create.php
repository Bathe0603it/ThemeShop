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
<section class="content">
    <!-- /.row -->
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Thông tin sản phẩm</h4>
            <p class="text-muted">Cung cấp thông tin về tên, mô tả loại sản phẩm và nhà sản xuất để phân loại sản phẩm này.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light">
                <div class="panel-body">
                    <div class="form-group" id="ht-cre-product-name">
                        <label class="control-label strong" for="Name">Tên sản phẩm</label> <span class="asterisk">*</span>
                        <div class="controls">
                            <input bind="name" class="form-control" data-val="true" data-val-length="Tên sản phẩm tối đa 255 ký tự" data-val-length-max="255" data-val-required="Tên sản phẩm không được để trống" id="Name" name="Name" placeholder="Nhập tên sản phẩm" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group" id="ht-cre-product-content">
                        <label class="control-label strong" for="Content">Nội dung</label>
                        <div class="controls">
                            <textarea bind="content" class="form-control" cols="20" id="Content" name="Content" placeholder="" rows="2" type="text"></textarea>
                            <span class="help-block"><span class="field-validation-valid" data-valmsg-for="Content" data-valmsg-replace="true"></span></span>
                        </div>
                    </div>
                    <div class="form-group" define="{shownSummary: false}" bind-show="!shownSummary">
                        <a href="javascript:;" class="link" bind-event-click="shownSummary = !shownSummary">Thêm mô tả ngắn</a>
                    </div>
                    <div class="form-group hide" id="div-summary" bind-show="shownSummary">
                        <label class="control-label strong" for="Summary">Mô tả ngắn</label>
                        <div class="controls">
                            <textarea class="form-control" cols="20" data-val="true" data-val-length="Mô tả ngắn tối đa 500 kí tự" data-val-length-max="500" id="Summary" name="Summary" placeholder="" rows="2" type="text"></textarea>
                            <span class="help-block"><span class="field-validation-valid" data-valmsg-for="Summary" data-valmsg-replace="true"></span></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6" style="z-index:5;">
                            <label class="control-label strong">
                            Loại
                            <span class="note">
                            ví dụ: Xe đạp, Áo sơ mi ...
                            </span>
                            </label>
                            <div class="controls next-popover__container next-popover__container--full-width " define="{'productTypeAutocomplete': new Bizweb.SingleSelectRemoteSourceAutocomplete(this, {'type': 'product_type','length':255})}" context="productTypeAutocomplete">
                                <div>
                                    <div class="next-field__connected-wrapper btn-group btn-group-filter">
                                        <input type="text" size="30" placeholder="Nhập loại sản phẩm" name="ProductType" id="product_type" class="form-control next-input next-field--connected input-product_type" bind-event-keyup="inputChanged(event)" bind-event-keypress="selectInputValue(event)" autocomplete="off">
                                        <a class="btn btn-default" style="color: #555;border-left: 0 none;" bind-event-click="togglePopover()" id="btn-toggle-popover-product_type">
                                        <i class="fa fa-chevron-down" id="fa-toggle-product_type"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="next-popover next-popover--full-width next-popover--do-not-show-on-focus next-popover-product_type" style="margin-right: 0px; margin-left: 0px; transform-origin: 50% -5px 0px;top:90%">
                                    <div class="next-popover__tooltip"></div>
                                    <div class="next-popover__content-wrapper">
                                        <div class="next-popover__content">
                                            <div class="next-popover__pane">
                                                <ul class="js-autocomplete-suggestions next-list next-list--compact next-list--toggles">
                                                    <li>
                                                        <a bind-event-click="selectSuggestion(this)" class="next-list__item" item-value="Bàn ghế">
                                                            <div class="next-grid next-grid--no-outside-padding next-grid--compact">
                                                                <div class="next-grid__cell next-grid__cell--no-flex">
                                                                    <i class="gi pull-left gi-ok next-icon next-icon--12"></i>
                                                                </div>
                                                                <div class="next-grid__cell">
                                                                    Bàn ghế
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a bind-event-click="selectSuggestion(this)" class="next-list__item" item-value="Giường">
                                                            <div class="next-grid next-grid--no-outside-padding next-grid--compact">
                                                                <div class="next-grid__cell next-grid__cell--no-flex">
                                                                    <i class="gi pull-left gi-ok next-icon next-icon--12"></i>
                                                                </div>
                                                                <div class="next-grid__cell">
                                                                    Giường
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a bind-event-click="selectSuggestion(this)" class="next-list__item" item-value="Sofa">
                                                            <div class="next-grid next-grid--no-outside-padding next-grid--compact">
                                                                <div class="next-grid__cell next-grid__cell--no-flex">
                                                                    <i class="gi pull-left gi-ok next-icon next-icon--12"></i>
                                                                </div>
                                                                <div class="next-grid__cell">
                                                                    Sofa
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="has-error">
                                    <span class="help-block"><span class="field-validation-valid" data-valmsg-for="Content" data-valmsg-replace="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6" style="z-index:4;">
                            <label class="control-label strong">
                            Nhà cung cấp
                            <span class="note">
                            ví dụ: Sony, Apple ...
                            </span>
                            </label>
                            <div class="controls next-popover__container next-popover__container--full-width " define="{'vendorAutocomplete': new Bizweb.SingleSelectRemoteSourceAutocomplete(this, {'type': 'vendor','length':255})}" context="vendorAutocomplete">
                                <div>
                                    <div class="next-field__connected-wrapper btn-group btn-group-filter">
                                        <input type="text" size="30" placeholder="Nhập nhà cung cấp" name="Vendor" id="vendor" class="form-control next-input next-field--connected input-vendor" bind-event-keyup="inputChanged(event)" bind-event-keypress="selectInputValue(event)" autocomplete="off">
                                        <a class="btn btn-default " style="color: #555;border-left: 0 none;" bind-event-click="togglePopover()" id="btn-toggle-popover-vendor">
                                        <i class="fa fa-chevron-down" id="fa-toggle-vendor"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="has-error">
                                    <span class="help-block"><span class="field-validation-valid" data-valmsg-for="Content" data-valmsg-replace="true"></span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3 colection">
            <h4>Danh mục</h4>
            <p class="text-muted">Danh mục được sử dụng để nhóm sản phẩm với nhau.</p>
            <div define="{multipleCollections: new Bizweb.CollectionMultipleDropdown(this, {'type': 'collection','isLoaded':false,'page':1})}" context="multipleCollections">
                <a class="btn btn-default dropdown-toggle btn-filter" href="javascript:void(0)" bind-event-click="dropdown()" id="ht-cre-product-add-to-cate">
                Thêm vào danh mục
                <span class="caret"></span>
                </a>
            </div>
        </div>
        <div class="col-md-8 col-lg-9 dropdown-side-panel">
            <div class="panel panel-default panel-light">
                <div class="panel-body list-collection">
                    <div class="no-colection-found form-group">
                        <label class="control-label">
                        <i class="fa fa-mail-reply"></i> Sử dụng nút <b>Thêm vào danh mục</b> để thêm sản phẩm vào danh mục
                        </label>
                    </div>
                    <table width="100%">
                        <colgroup>
                            <col style="width:50px;">
                            <col>
                            <col style="width:50px;">
                        </colgroup>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Ảnh</h4>
            <p class="text-muted">Đăng ảnh cho sản phẩm</p>
            <p class="text-muted">Lưu ý: Size mỗi file ảnh không được vượt quá 1 MB.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light product-list-image" style="border: 1px solid transparent;">
                <div class="panel-body form-bordered">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <a bind-event-click="openFileUpload()" href="javascript:void(0)" style="padding:0 15px;" id="ht-cre-product-add-image">Thêm ảnh sản phẩm</a>
                            <span id="uploaded-images"></span>
                            <input name="mediaImages" multiple="multiple" bind-event-change="uploadMultiImages(0)" type="file" size="30" id="fileUpload" class="hide" data-url="" accept="image/*">
                            <a href="javascript:void(0);" bind-show="numOfSelectedImage > 0" bind-event-click="showDeleteMultiImagesModal()">Xóa ảnh sản phẩm</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="no-image-found tab-pane text-center active text-muted">
                            <h1 style="margin-bottom: 18px" class="thin"></h1>
                            <i class="fa fa-picture-o fa-5x"></i>
                            <h3 class="semi-bold">Thêm ảnh cho sản phẩm</h3>
                        </div>
                        <div class="images upload-image-wrapper">
                            <ol id="product-images" class="product-photo-grid clearfix ui-sortable dragable-product-images">
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Quản lý kho và tùy chọn</h4>
            <p class="text-muted">Bạn có thể cấu hình nhiều phiên bản và quản lý kho cho từng loại của sản phẩm này</p>
        </div>
        <div class="col-md-8 col-lg-9 variant-panel">
            <div class="panel panel-default panel-light">
                <div style="padding-bottom:0" class="panel-body form-bordered variants">
                    <style type="text/css">
                        .variants-option {
                        padding: 20px;
                        }
                        .variants-option .table-option td, .variants-option .table-option th, .variants-option .table-variant td, .variants-option .table-variant th {
                        padding: 8px 10px;
                        }
                        .variants-option .table-option td:first-child {
                        padding-left: 0;
                        }
                        .table-option .bootstrap-tagsinput {
                        margin-bottom: 0;
                        }
                        .option-value1 .label-info {
                        background: #29bc94;
                        }
                        span.option-value1 {
                        color: #29bc94;
                        }
                        .option-value2 .label-info {
                        background: #763eaf;
                        }
                        span.option-value2 {
                        color: #763eaf;
                        }
                        .option-value3 .label-info {
                        background: #ff9517;
                        }
                        span.option-value3 {
                        color: #ff9517;
                        }
                        .form-bordered .form-group:last-of-type {
                        border-bottom: none;
                        margin-bottom: 0;
                        padding-bottom: 0;
                        }
                        .box {
                        background-color: white;
                        border: 1px solid #d3dbe2;
                        padding: 10px;
                        position: relative;
                        margin-bottom: 20px;
                        -webkit-transition: background 0.5s;
                        transition: background 0.5s;
                        }
                        .box.warning {
                        background-color: #fcf5d9;
                        color: #9b731d;
                        border: 1px solid #f2ebcf;
                        border-right-color: #e2dcc2;
                        border-bottom-color: #e2dcc2;
                        }
                        .table-variant tbody tr td {
                        vertical-align: middle;
                        }
                    </style>
                    <div context="productVariantOptions" define="{productVariantOptions: new Bizweb.NewProductVariantOptions(this,{&quot;auto_generate&quot;:true,&quot;id&quot;:0,&quot;options&quot;:[{&quot;values&quot;:&quot;&quot;,&quot;product_id&quot;:0,&quot;name&quot;:&quot;Title&quot;,&quot;position&quot;:0,&quot;created_on&quot;:&quot;0001-01-01T00:00:00Z&quot;,&quot;modified_on&quot;:null,&quot;id&quot;:0}],&quot;variants&quot;:[],&quot;variant&quot;:{&quot;id&quot;:0,&quot;next_id&quot;:0,&quot;prev_id&quot;:0,&quot;barcode&quot;:null,&quot;sku&quot;:null,&quot;product_id&quot;:0,&quot;price&quot;:0.0,&quot;compare_at_price&quot;:null,&quot;option1&quot;:&quot;Default Title&quot;,&quot;option2&quot;:null,&quot;option3&quot;:null,&quot;title&quot;:null,&quot;taxable&quot;:false,&quot;inventory_management&quot;:null,&quot;inventory_policy&quot;:&quot;deny&quot;,&quot;inventory_quantity&quot;:1,&quot;requires_shipping&quot;:true,&quot;weight&quot;:0.0,&quot;weight_unit&quot;:&quot;kg&quot;,&quot;image_id&quot;:null,&quot;src&quot;:&quot;&quot;,&quot;position&quot;:0,&quot;created_on&quot;:&quot;0001-01-01T00:00:00Z&quot;,&quot;modified_on&quot;:null,&quot;product&quot;:null,&quot;api_permissions&quot;:null,&quot;inventory_management_list&quot;:null,&quot;is_create&quot;:false}})}">
                        <input bind="auto_generate" id="AutoGenerate" name="AutoGenerate" type="hidden" value="True">
                        <input data-val="true" data-val-number="The field Id must be a number." id="Variant_Id" name="Variant.Id" type="hidden" value="0">
                        <div class="form-group">
                            <h4>
                                <label class="control-label strong">Đặt giá</label>
                            </h4>
                            <div class="row">
                                <div class="col-sm-6" id="ht-cre-product-price">
                                    <label class="control-label">Giá</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon">₫</span>
                                            <input bind="variant.price" class="form-control" data-autonumeric="autoNumeric" id="Variant_Price" name="Variant.Price" type="text" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Giá so sánh</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <span class="input-group-addon">₫</span>
                                            <input bind="variant.compare_at_price" class="form-control" data-autonumeric="autoNumeric" id="Variant_CompareAtPrice" name="Variant.CompareAtPrice" type="text">
                                        </div>
                                    </div>
                                </div>
                                <div class="controls col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                        <input bind="variant.taxable" id="Variant_Taxable" name="Variant.Taxable" type="checkbox" value="true"><input name="Variant.Taxable" type="hidden" value="false">
                                        Giá đã bao gồm VAT
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>
                                <label class="control-label strong">Kho hàng</label>
                            </h4>
                            <div class="row">
                                <div class="col-sm-6" id="ht-cre-product-sku">
                                    <label class="control-label">Mã sản phẩm / SKU</label>
                                    <div class="controls">
                                        <input bind="variant.sku" class="form-control" id="Variant_Sku" name="Variant.Sku" type="text" value="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Mã vạch / Barcode <span class="note">(ISBN, UPC, v.v...)</span></label>
                                    <div class="controls">
                                        <input bind="variant.barcode" class="form-control" id="Variant_Barcode" name="Variant.Barcode" type="text" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row top15">
                                <div class="col-sm-6" id="ht-cre-product-manager-quantity">
                                    <label class="control-label">Quản lý kho</label>
                                    <div class="controls">
                                        <select bind="variant.inventory_management" class="form-control inventory-management" id="Variant_InventoryManagement" name="Variant.InventoryManagement">
                                            <option value="">Không quản lý kho hàng</option>
                                            <option value="bizweb">Quản lý kho hàng</option>
                                        </select>
                                    </div>
                                </div>
                                <div bind-show="variant.inventory_management" class="quantity col-sm-3 hide">
                                    <label class="control-label">Số lượng</label>
                                    <div class="controls">
                                        <input bind="variant.inventory_quantity" class="form-control" data-val="true" data-val-number="The field InventoryQuantity must be a number." id="Variant_InventoryQuantity" name="Variant.InventoryQuantity" type="number" value="1">
                                    </div>
                                </div>
                                <div class="col-sm-3"></div>
                                <div bind-show="variant.inventory_management" class="controls col-sm-12 inventory-policy hide">
                                    <div class="checkbox">
                                        <label>
                                        <input bind-event-change="changeInventoryPolicy(this)" type="checkbox" value="deny">
                                        Cho phép tiếp tục đặt hàng khi hết hàng
                                        <input bind="variant.inventory_policy" id="Variant_InventoryPolicy" name="Variant.InventoryPolicy" type="hidden" value="deny">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>
                                <label class="control-label strong">Vận chuyển</label>
                            </h4>
                            <div class="row">
                                <div class="col-sm-6" id="ht-cre-product-weight">
                                    <label class="control-label">Cân nặng</label>
                                    <div class="controls">
                                        <div class="input-group">
                                            <input bind="variant.weight" class="form-control" data-val="true" data-val-number="The field Khối lượng must be a number." data-val-range="Khối lượng không được là số âm" data-val-range-max="1.79769313486232E+308" data-val-range-min="0" id="Variant_Weight" name="Variant.Weight" type="text" value="0">
                                            <div class="input-group-btn">
                                                <input bind="variant.weight_unit" id="Variant_WeightUnit" name="Variant.WeightUnit" type="hidden" value="kg">
                                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><span class="weight-unit">kg</span><span style="margin-left:5px;" class="caret"></span></button>
                                                <ul class="dropdown-menu weight-unit-select">
                                                    <li><a href="javascript:void(0)">lb</a></li>
                                                    <li><a href="javascript:void(0)">oz</a></li>
                                                    <li><a href="javascript:void(0)">kg</a></li>
                                                    <li><a href="javascript:void(0)">g</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6"></div>
                                <div class="controls col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                        <input bind="variant.requires_shipping" checked="checked" id="Variant_RequiresShipping" name="Variant.RequiresShipping" type="checkbox" value="true"><input name="Variant.RequiresShipping" type="hidden" value="false">
                                        Sản phẩm này yêu cầu vận chuyển
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <h4>
                                <label class="control-label">Tùy chọn</label>
                            </h4>
                            <div style="margin-bottom:20px;" class="row">
                                <label style=" margin-bottom 0;padding-top 13px;" class="control-label col-sm-9">Sản phẩm này có nhiều tùy chọn như kích thước, màu sắc?</label>
                                <div class="col-sm-3 text-right">
                                    <button bind-show="auto_generate" bind-event-click="toggleAutoGenerate()" class="btn btn-primary text-right show-option " type="button" id="ht-cre-product-variant">Thêm tùy chọn</button>
                                    <button bind-show="!auto_generate" bind-event-click="toggleAutoGenerate()" class="btn btn-default text-right cancel-option hide" type="button">Hủy</button>
                                </div>
                            </div>
                            <div bind-show="!auto_generate" class="row variants-option hide" style=" background:#f5f6f7; margin-left -20px;
                                margin-right -20px;">
                                <table class="table-option" width="100%">
                                    <colgroup>
                                        <col style="width:25%">
                                        <col style="width:65%">
                                        <col style="width:10%;">
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th style="">Tên thuộc tính</th>
                                            <th style="padding-left:10px;">Giá trị</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr bind-show="options.length <3" class="add-option">
                                            <td colspan="3">
                                                <a class="btn btn-default" bind-event-click="addNewOption()" href="javascript:void(0)">Thêm option</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div bind-show="$('.table-variant .is-create:checked').length > 100" class="box warning st sb ">
                                    <strong>Cảnh báo:</strong> Sản phẩm có tối đa 100 phiên bản.
                                </div>
                                <div bind-show="variants.length >0" style="margin-top:25px;" class="list-variant hide">
                                    <label class="control-label">
                                    Thay đổi những tùy chọn, bỏ tích để không tạo
                                    </label>
                                    <table width="100%" class="table-variant table">
                                        <colgroup>
                                            <col style="padding-left: 7px; padding-right: 7px; width: 12px;">
                                            <col>
                                            <col style="width:100px;">
                                            <col style="min-width:100px;">
                                            <col style="min-width:100px;">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>
                                                </th>
                                                <th>
                                                    Tùy chọn
                                                </th>
                                                <th>
                                                    Giá
                                                </th>
                                                <th>
                                                    Mã sản phẩm
                                                </th>
                                                <th>
                                                    Mã barcode
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        addLoadEvent(function () {
                            $(".inventory-management").on("change", function () {
                                var value = $(".inventory-management").val();
                                if (value == "") {
                                    $(".quantity,.inventory-policy").addClass("hide");
                                }
                                else {
                                    $(".quantity,.inventory-policy").removeClass("hide");
                                }
                            });
                        
                            $('.weight-unit-select li').click(function (e) {
                                e.preventDefault();
                                var selected = $(this).text();
                                $(".weight-unit").html(selected);
                                $("[name$='WeightUnit']").val(selected);
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Tags</h4>
            <p class="text-muted">Tag có thể được dùng để phân loại các sản phẩm.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light" id="ht-cre-product-tags">
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label strong" for="Tags">Tags</label>
                        <div class="controls">
                            <input id="Tags" name="Tags" placeholder="Nhập tag" type="text" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Bạn có thể chọn những tag đã được sử dụng</label>
                        <div class="controls">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Tối ưu SEO</h4>
            <p class="text-muted">Thiết lập tiêu đề trang, thẻ mô tả, đường dẫn. Những thông tin này xác định cách bài viết xuất hiện trên công cụ tìm kiếm.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light">
                <div class="panel-body">
                    <div class="form-group" id="editSeo" define="{editSeo: new Bizweb.EditSeo(this,{&quot;object_reference&quot;:&quot;editProduct&quot;,&quot;object_name&quot;:&quot;sản phẩm&quot;})}" context="editSeo">
                        <div class="row">
                            <div class="col-sm-9 col-lg-10">
                                <h4 style="margin-bottom:0px;">
                                    <label class="control-label strong">Xem trước kết quả tìm kiếm</label>
                                </h4>
                            </div>
                            <div class="col-sm-3 col-lg-2 seo-config">
                                <a href="javascript:void(0)" bind-show="!isSeoVisible()" bind-event-click="showSeo()" style="font-size: 0.99em;" id="ht-cre-product-seo">Tùy chỉnh SEO</a>
                            </div>
                        </div>
                        <div class="search-engine-preview">
                            <div class="google-preview" bind-show="shouldShowPreview()">
                                <span class="google-title" bind="googleTitle()"></span>
                                <div class="google-url">
                                    https://no1aoe.bizwebvietnam.net/<span bind="googlePath()"></span>
                                </div>
                                <div class="google-description" bind="googleDescription()"></div>
                            </div>
                            <p bind-show="!shouldShowPreview()" bind="missingText()"></p>
                        </div>
                    </div>
                    <div class="seo-section" style="display: none;">
                        <div class="form-group">
                            <div>
                                <label class="control-label strong" for="MetaTitle">Thẻ tiêu đề</label>
                                <span class="pull-right">Số ký tự đã dùng: <b bind="meta_title.length || Math.min(name.length, 70)"></b>/70</span>
                            </div>
                            <div class="controls">
                                <input bind="meta_title" bind-placeholder="name.substr(0, 70)" class="form-control seo-placeholder" data-val="true" data-val-length="Thẻ tiêu đề tối đa 255 kí tự" data-val-length-max="255" editable-placeholder="true" id="MetaTitle" name="MetaTitle" type="text" value="">
                                <div class="has-error">
                                    <span class="help-block"><span class="field-validation-valid" data-valmsg-for="MetaTitle" data-valmsg-replace="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="control-label strong" for="MetaDescription">Thẻ mô tả</label>
                                <span class="pull-right">Số ký tự đã dùng: <b bind="meta_description.length || Math.min($($('#Content').val()).text().trim().length, 160)"></b>/160</span>
                            </div>
                            <div class="controls">
                                <textarea bind="meta_description" bind-placeholder="$($('#Content').val()).text().trim().substr(0, 160)" class="form-control seo-placeholder" cols="20" data-val="true" data-val-length="Thẻ mô tả tối đa 255 kí tự" data-val-length-max="255" editable-placeholder="true" id="MetaDescription" name="MetaDescription" placeholder="Nhập một mô tả để nâng cao xếp hạng trên công cụ tìm kiếm như Google." rows="2"></textarea>
                                <div class="has-error">
                                    <span class="help-block"><span class="field-validation-valid" data-valmsg-for="MetaDescription" data-valmsg-replace="true"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label strong" for="Alias">Đường dẫn / Alias</label> <span class="asterisk">*</span>
                            <div class="controls">
                                <div class="input-group">
                                    <span class="input-group-addon">http://no1aoe.bizwebvietnam.net/</span>
                                    <input bind="alias" bind-placeholder="Bizweb.Inflection.generateAlias(name)" class="form-control seo-placeholder" data-val="true" data-val-length="Đường dẫn / Alias tối đa 150 ký tự" data-val-length-max="150" editable-placeholder="true" id="Alias" name="Alias" placeholder="" type="text" value="">
                                </div>
                                <span class="help-block"><span class="field-validation-valid" data-valmsg-for="Alias" data-valmsg-replace="true"></span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <h4>Trạng thái</h4>
            <p class="text-muted">Cho phép thiết lập thời gian sản phẩm được hiển thị.</p>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="panel panel-default panel-light">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="controls">
                            <div class="radio">
                                <label>
                                <input onclick="setPublishDateNow()" name="active" type="radio" value="true" checked="checked">
                                Hiển thị
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                <input onclick="hidePublishDate()" name="active" type="radio" value="false">
                                Ẩn
                                </label>
                            </div>
                            <label onclick="setPublishDate()" class="show-publish-time control-label" href="javascript:void(0)" style="text-decoration:underline;cursor:pointer;" id="ht-cre-product-calender">Đặt lịch hiển thị</label>
                        </div>
                        <label style="display:none;" class="control-label strong publish-date">Thời gian hiển thị</label>
                        <div style="display:none;" class="controls publish-date">
                            <div class="input-group date pull-left col-sm-2">
                                <input class="form-control" data-rel="datepicker" id="Date" name="Date" placeholder="Chọn ngày" style="padding-right:2px;" type="text" value="">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                            <label style="margin-top:7px;" class="control-label pull-left">
                            &nbsp;thời gian&nbsp;
                            </label>
                            <div class="input-group date pull-left col-sm-2">
                                <div class="input-group">
                                    <input class="form-control" data-minute-step="10" data-rel="timepicker" data-show-meridian="true" data-template="dropdown" id="Time" name="Time" placeholder="Chọn giờ" style="padding-right:2px" type="text" value="">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                            <label onclick="hidePublishDate()" class="hide-publish-time control-label" href="javascript:void(0)" style="text-decoration:underline;cursor:pointer;margin-left:10px;margin-top:7px;">Hủy</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
</form>