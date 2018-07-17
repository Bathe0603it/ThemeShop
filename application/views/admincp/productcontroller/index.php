<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <h1>
                Sản phẩm
                <small>Danh sách các sản phẩm</small>
            </h1>
        </div>
        <div class="col-md-4 col-xs-12">
            <button class="btn btn-primary" type="button" name="button" form="create_new_product">Thêm mới sản phẩm</button>
        </div>
    </div>
    
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Tất cả sản phẩm</h3>
        </div>
        <div class="box-body">
            <section class="filterHead">
                <div class="row">
                    <div class="col-md-4">
                        <p><label>Tên</label></p>
                        <input type="" name="">
                    </div>
                    <div class="col-md-2">
                        <p><label>Trạng thái</label></p>
                        <select>
                            <option>Hiển thị</option>
                            <option>Không hiển thị</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p><label>Giá</label></p>
                        <select name="forprice" class="myinput filterForprice inputBoxFilterCenter">
                            <option value="">Lọc giá</option>
                            <option value="0to1">Dưới 1 triệu</option>
                            <option value="1to2">Từ 1 - 2 triệu</option>
                            <option value="2to3">Từ 2 - 3 triệu</option>
                            <option value="3to5">Từ 3 - 5 triệu</option>
                            <option value="5to8">Từ 5 - 8 triệu</option>
                            <option value="8to10">Từ 8 - 10 triệu</option>
                            <option value="10to15">Từ 10 - 15 triệu</option>
                            <option value="15to20">Từ 15 - 20 triệu</option>
                            <option value="20tomax">Trên 20 triệu</option>
                            <option value="price_asc">Tăng dần</option>
                            <option value="price_desc">Giảm dần</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <p><label>Danh mục</label></p>
                        <select>
                            <option>Hiển thị</option>
                            <option>Không hiển thị</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-warning btn_btnfilter_now">Lọc ngay</button>
                    </div>
                </div>
            </section>
            <section class="contentPage">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover vert-align" id="all-products">
                            <colgroup>
                                <col>
                                <col style="width:50px;">
                                <col style="max-width:120px;">
                                <col style="width:250px;">
                                <col style="width:150px;">
                                <col style="width:150px;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="select select-all not-select">
                                        <span><input type="checkbox" class="js-no-dirty all-bulk-action checkbox-bulkactions-mobile" bind-event-change="addOrRemoveAllBulkActionItems(this)"></span>
                                        <div class="bulk-actions hide bulk-actions-mobile" all-items="20" items-page="50" total-records="20">
                                            <ul>
                                                <li>
                                                    <span class="selection-count bulk-action-items-count selection-count-mobile" selected-bulk-action-items="0">
                                                    Đã chọn <span class="display-bulk-action-items-count"></span><br class="enter-text-select"> sản phẩm
                                                    </span>
                                                </li>
                                                <li>
                                                    <a class="btn btn-default btn-sm btn-edit-product-mobile" bind-event-click="Bizweb.BulkEditor.goToBulkEditor( &quot;Product&quot;, { defaultEditColumns: &quot;variants.sku,variants.price,variants.compare_at_price&quot;, defaultShowColumns: &quot;&quot;, returnTo: &quot;\/admin\/products&quot;, useSearch: true &amp;&amp; allSelected(), ids: selectedItems.join(',') })" track-click="{category: 'Bulk editor', action: 'Bulk actions: Edit products'}">
                                                    Sửa <span class="hidden-xs">sản phẩm</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <span class="dropdown">
                                                        <a class="btn btn-default btn-sm dropdown-toggle btn-dropdown-mobile" data-toggle="dropdown">
                                                        Chọn thao tác
                                                        <span class="caret"></span>
                                                        </a>
                                                        <ul class="dropdown-menu arrow-style dropdown-menu-product-mobile" role="menu">
                                                            <li><a class="perform-publish" href="javascript:;" bind-event-click="publishItems()" define="{urlBulkActionPublish:'/admin/products/bulkpublish'}">Hiện</a></li>
                                                            <li><a class="perform-unpublish" href="javascript:;" bind-event-click="unPublishItems()" define="{urlBulkActionUnPublish:'/admin/products/bulkunpublish'}">Ẩn</a></li>
                                                            <li><a define="{urlBulkActionDelete:'/admin/products/bulkdelete'}" class="perform-delete" href="javascript:void(0);" bind-event-click="showDeleteItemsModal()">Xóa sản phẩm</a></li>
                                                            <li class="divider"></li>
                                                            <li><a class="perform-add-tags" href="javascript:void(0)" define="{urlBulkActionAddTag:'/admin/products/bulkaddtags'}" bind-event-click="addTags()">Thêm tags</a></li>
                                                            <li><a class="perform-remove-tags" href="" define="{urlBulkActionRemoveTag:'/admin/products/bulkremovetags'}" bind-event-click="removeTags()">Xóa tags</a></li>
                                                            <li class="divider"></li>
                                                            <li><a class="perform-add-to-collections" href="javascript:void(0)" define="{urlBulkActionAddCollections:'/admin/products/bulkaddcollections'}" bind-event-click="addCollections()">Thêm sản phẩm vào danh mục</a></li>
                                                            <li><a class="perform-remove-from-collections" href="" define="{urlBulkActionRemoveCollections:'/admin/products/bulkremovecollections'}" bind-event-click="removeCollections()">Xóa sản phẩm khỏi danh mục</a></li>
                                                            <li class="apps-link">
                                                                <div class="app-icon-list">
                                                                    <a href="javascript:void(0)" bind-event-click="showModelSendAdsToDms('google')"><img src="/themes/portal/admin/images/google-icon.png">Quảng cáo sản phẩm trên Google</a>
                                                                </div>
                                                            </li>
                                                            <li class="apps-link">
                                                                <div class="app-icon-list">
                                                                    <a href="javascript:void(0)" bind-event-click="showModelSendAdsToDms('facebook')"><img src="/themes/portal/admin/images/facebook-icon.png">Quảng cáo sản phẩm trên Facebook</a>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </span>
                                                </li>
                                            </ul>
                                            <span class="bulk-select-all">
                                                <p class="bulk-action-all-selector">
                                                    <span class="bulk-action-all hidden-xs"></span>
                                                    <a class="multipage-selected-all hide" href="javascript:void(0);" bind-event-click="addBulkActionAll()">Chọn tất cả sản phẩm</a>
                                                    <a class="clear-multipage-selection hide" href="javascript:void(0);" bind-event-click="removeBulkActionAll()">Bỏ chọn</a>
                                                </p>
                                            </span>
                                        </div>
                                    </th>
                                    <th></th>
                                    <th>Sản phẩm</th>
                                    <th>Kho hàng</th>
                                    <th>Loại</th>
                                    <th>Nhà cung cấp</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727253" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727253,this)" id="bulk-action-9727253" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/13357413-1.jpg?v=1516641368000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727253" data-nested-link-target="true">Bàn cafe tròn gỗ đẹp</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Bàn ghế</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727252" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727252,this)" id="bulk-action-9727252" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/06012281-1.jpg?v=1516641367000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727252" data-nested-link-target="true">Bàn cafe tròn gỗ Veneer</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Bàn ghế</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727251" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727251,this)" id="bulk-action-9727251" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/491312624-1.jpg?v=1516641366000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727251" data-nested-link-target="true">Bàn cafe kính</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Bàn ghế</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727250" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727250,this)" id="bulk-action-9727250" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/005790546-1.jpg?v=1516641366000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727250" data-nested-link-target="true">Sopha văng</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727249" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727249,this)" id="bulk-action-9727249" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/274699640-0116199-1.jpg?v=1516641365000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727249" data-nested-link-target="true">Ghế sopha đơn êm ái</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727248" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727248,this)" id="bulk-action-9727248" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/475805733-1.jpg?v=1516641364000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727248" data-nested-link-target="true">Sofa đơn SFD18</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727247" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727247,this)" id="bulk-action-9727247" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/092852461-1.jpg?v=1516641362000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727247" data-nested-link-target="true">Sopha đơn đẹp giá rẻ</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727246" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727246,this)" id="bulk-action-9727246" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/523761429-1.jpg?v=1516641362000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727246" data-nested-link-target="true">Sopha đôi da</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727245" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727245,this)" id="bulk-action-9727245" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/573273230-1.jpg?v=1516641361000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727245" data-nested-link-target="true">Sopha đôi sang trọng</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727244" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727244,this)" id="bulk-action-9727244" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/521037667-1.jpg?v=1516641360000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727244" data-nested-link-target="true">Sopha cổ điển</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727243" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727243,this)" id="bulk-action-9727243" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/070830539-0605528-1.jpg?v=1516641359000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727243" data-nested-link-target="true">Sopha dài hiện đại</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727242" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727242,this)" id="bulk-action-9727242" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/104430436-1.jpg?v=1516641358000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727242" data-nested-link-target="true">Bộ sofa phòng khách 2 tông màu</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727241" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727241,this)" id="bulk-action-9727241" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/145708735-1.jpg?v=1516641357000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727241" data-nested-link-target="true">Bộ sofa phòng khách màu ghi</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727240" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727240,this)" id="bulk-action-9727240" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/045519338-1.jpg?v=1516641356000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727240" data-nested-link-target="true">Sopha giường Hàn Quốc</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727239" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727239,this)" id="bulk-action-9727239" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/542480473-1.jpg?v=1516641355000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727239" data-nested-link-target="true">Sopha giường đẹp hiện đại</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727238" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727238,this)" id="bulk-action-9727238" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/514573471-1.jpg?v=1516641355000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727238" data-nested-link-target="true">Sopha giường cổ điển</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727237" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727237,this)" id="bulk-action-9727237" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/232905242-0130223-1.jpg?v=1516641354000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727237" data-nested-link-target="true">Sopha cafe</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727236" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727236,this)" id="bulk-action-9727236" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/274699640-1.jpg?v=1516641353000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727236" data-nested-link-target="true">Ghế sopha kem</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Sofa</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727235" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727235,this)" id="bulk-action-9727235" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/501633843-1.jpg?v=1516641352000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727235" data-nested-link-target="true">Giường Ceylon</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Giường</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                                <tr class="ui-nested-link-container" data-define="{nestedLinkContainer: new Bizweb.NestedLinkContainer(this)}">
                                    <td class="select">
                                        <input type="checkbox" value="9727234" name="product_ids" bind-event-change="addOrRemoveBulkActionItem(9727234,this)" id="bulk-action-9727234" class="bulk-action-item">
                                    </td>
                                    <td>
                                        <img class="product-thumb" src="//bizweb.dktcdn.net/thumb/thumb/100/292/349/products/544831177-1.jpg?v=1516641350000">
                                    </td>
                                    <td class="title">
                                        <a href="/admin/products/9727234" data-nested-link-target="true">Giường ngủ sang cổ điển</a>
                                    </td>
                                    <td>
                                        <p><span class="note strong" data-original-title="Không quản lý kho hàng" data-placement="top" data-toggle="tooltip"><strong>---</strong></span></p>
                                    </td>
                                    <td>
                                        <p>Giường</p>
                                    </td>
                                    <td>
                                        <p></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
        <!-- /.box-body -->
    </div>
</section>
<!-- /.content -->