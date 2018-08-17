<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Danh mục
        <small>Danh sách các danh mục</small>
    </h1>
</section>
<!-- Main content -->
<section class="content">
    <!-- /.row -->
    <div class="panel panel-default has-bulk-actions">
        <div class="filters" context="filterandsavedsearch" define="{filterandsavedsearch: new Bizweb.ProductFilterAndSavedSearch(this,{&quot;type_filter&quot;:&quot;products&quot;})}">
            <ul class="filter-tab-list" id="filter-tab-list">
                <li class="filter-tab-item" data-tab-index="1">
                    <a href="/admin/products" class="filter-tab filter-tab-active">Tất cả sản phẩm</a>
                </li>
                <li class="dropdown-container" id="hidden-search" style="display:none">
                    <a class="dropdown-toggle btn-hidden-search filter-tab" data-toggle="dropdown">
                    Xem thêm
                    <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu arrow-style dropdown-hidden-search pull-right padding-sm" id="dropdown-hidden-search"></ul>
                </li>
            </ul>
            <div class="filter-container">
                <div class="btn-group btn-group-filter next-field__connected-wrapper">
                    <div class="next-field--connected--no-flex">
                        <a class="btn btn-default dropdown-toggle btn-filter" id="ht-product-filter">
                        Điều kiện lọc
                        <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu arrow-style dropdown-filter">
                            <div class="arrow"></div>
                            <div class="filters">
                                <label class="filter-title">Hiển thị sản phẩm theo:</label>
                                <div class="filter-content">
                                    <select class="form-control form-selectboxit" bind="filterKey" bind-event-change="resetFilter()" id="filter-conditions">
                                        <option value="">Chọn điều kiện lọc...</option>
                                        <option value="visibility">Hiển thị</option>
                                        <option value="productType">Loại sản phẩm</option>
                                        <option value="vendor">Nhà cung cấp</option>
                                        <option value="tag">Đã được tag với</option>
                                        <option value="collectionId">Danh mục sản phẩm</option>
                                    </select>
                                    <div class="inline filter-choose hide" bind-show="filterKey == 'visibility'">
                                        <select class="form-control form-selectboxit filter-select" bind="option">
                                            <option value="">Chọn điều kiện lọc...</option>
                                            <option value="visibility">Hiển thị</option>
                                            <option value="hidden">Ẩn</option>
                                        </select>
                                        <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc" bind-event-click="submitFilter(this)">
                                    </div>
                                    <div class="inline filter-choose hide" bind-show="filterKey == 'productType'">
                                        <select class="form-control form-selectboxit filter-select" bind="option">
                                            <option value="">Chọn điều kiện lọc...</option>
                                            <option value="Bàn ghế">Bàn ghế</option>
                                            <option value="Giường">Giường</option>
                                            <option value="Sofa">Sofa</option>
                                        </select>
                                        <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc" bind-event-click="submitFilter(this)">
                                    </div>
                                    <div class="inline filter-choose hide" bind-show="filterKey == 'vendor'">
                                        <select class="form-control form-selectboxit filter-select" bind="option">
                                            <option value="">Chọn điều kiện lọc...</option>
                                        </select>
                                        <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc" bind-event-click="submitFilter(this)">
                                    </div>
                                    <div class="inline filter-choose hide" bind-show="filterKey == 'tag'">
                                        <form method="get" action="/admin/products" bind-event-submit="submitFilter(this)" novalidate="novalidate">
                                            <input type="text" class="form-control inline filter-input" bind="value" bind-class="{error: isValid}">
                                            <input type="submit" class="btn btn-default add-filter filtering-complete" value="Lọc" bind-event-click="submitFilter(this)">
                                        </form>
                                    </div>
                                    <div class="inline filter-choose hide" bind-show="filterKey == 'collectionId'">
                                        <div class="inline result-dropdown padding-right" style="position: relative;">
                                            <input type="hidden" name="" class="form-control form-control smaller choosed-single-id" placeholder="Nhập Id">
                                            <a class="btn btn-default dropdown-toggle btn-choose-product" href="javascript:void(0)" bind-event-click="dropdown()">
                                            <span class="choosed-single" style="margin-top: -4px;">
                                            Chọn danh mục
                                            </span>
                                            <span class="caret" style="margin-top: -1px;"></span>
                                            </a>
                                        </div>
                                        <input type="button" class="btn btn-default add-filter filtering-complete" value="Lọc" bind-event-click="submitFilter(this)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="next-form next-form--full-width">
                        <form action="/admin/products" bind-event-submit="submitQuery()" method="get" novalidate="novalidate">                                    <input type="text" class="form-control form-large search-input" id="ht-product-search" placeholder="Nhập từ khóa tìm kiếm ...(Tên sản phẩm, Tên variant, SKU, Tag)" bind="query" bind-event-input="submitQuery()" value=""></form>
                    </div>
                    <div class="segmented next-field--connected--no-flex saved-search-actions-next" id="saved-search-actions-next">
                    </div>
                </div>
            </div>
        </div>
        <div class="products">
            <div define="{bulkActions: new Bizweb.ProductBulkActions(this,{&quot;type&quot;:&quot;sản phẩm&quot;})}" context="bulkActions">
                <div class="panel-body bulk-action-context">
                    <div class="table-responsive">
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
                        <div class="t-grid-pager-boder">
                            <div class="t-pager t-reset">
                                <div class="col-xs-5 no-padding">
                                    <div class="t-status-text dataTables_info">Hiển thị kết quả từ 1 - 20 trên tổng 20 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script class="modal_source" define="{deleteItemsModal: new Bizweb.Modal(this)}" type="text/html">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button"></button>
                                <h4 class="modal-title">Bạn chắc chắn muốn xóa các sản phẩm này?</h4>
                            </div>
                            <div class="modal-body product-option-edit">
                                <p>Thao tác này sẽ xóa các sản phẩm bạn đã chọn. Thao tác này không thể khôi phục.</p>
                            </div>
                            <div class="modal-footer">
                                <div class="form-actions row">
                                    <div class="col-sm-5 pull-right text-right">
                                        <button class="btn btn-default btn-back close-modal" type="button">Hủy</button>
                                        <button class="btn btn-danger btn-delete-bulk-action" type="button" bind-event-click="deleteItems()">Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </script>
                <script class="modal_source" define="{sendFormAdsToDMS: new Bizweb.Modal(this)}" type="text/html">
                    <div class="modal-dialog" id="formRequestAdvice">
                        <div class="modal-content">
                            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                            <div class="modal-header">
                                <h4 class="modal-title">Bạn đang có nhu cầu quảng cáo <span bind="typeFormAds"></span> cho sản phẩm</h4>
                                <p>Chúng tôi sẽ liên hệ với bạn trong vòng 24h để tư vấn giải pháp quảng cáo hiệu quả</p>
                            </div>
                            <div class="modal-body">
                                <h4>Thông tin liên hệ tư vấn</h4>
                                <p>Hãy cho chúng tôi thông tin liên hệ chính xác để tư vấn được cho bạn nhanh nhất, bạn có thể sửa thông tin bên dưới nếu chưa đúng.</p>
                                <form>
                                    <table>
                                        <tr bind-show="isFacebook">
                                            <td>Sản phẩm bạn kinh doanh</td>
                                            <td>
                                                <select id="inputCategoryId">
                                                    <option selected="selected" value="0">Lĩnh vực kinh doanh</option>
                                                    <option value="32">Máy tính Công nghệ Kỹ thuật số</option>
                                                    <option value="33">Điện thoại</option>
                                                    <option value="34">Điện tử - Âm thanh - Kỹ thuật số</option>
                                                    <option value="35">Điện máy</option>
                                                    <option value="36">Máy văn phòng</option>
                                                    <option value="37">Máy công nghiệp</option>
                                                    <option value="38">Thời trang Trang sức</option>
                                                    <option value="39">Sản phẩm trẻ em</option>
                                                    <option value="40">Mỹ phẩm Dược phẩm Nước hoa</option>
                                                    <option value="41">Dược phẩm - Làm đẹp - Spa</option>
                                                    <option value="42">Nhà hàng Quán ăn</option>
                                                    <option value="43">Thực phẩm Đồ uống</option>
                                                    <option value="44">Thủ công Mỹ nghệ</option>
                                                    <option value="45">Sách - Truyện - Văn phòng phẩm</option>
                                                    <option value="46">Hoa, Quà tặng</option>
                                                    <option value="47">Nội thất Văn phòng</option>
                                                    <option value="48">Vật liệu xây dựng</option>
                                                    <option value="49">Đồ gia dụng, sinh hoạt</option>
                                                    <option value="50">Giáo dục Đào tạo</option>
                                                    <option value="51">Dịch vụ Du lịch Khách sạn</option>
                                                    <option value="52">Dụng cụ thể thao</option>
                                                    <option value="53">Vật nuôi, thú cưng</option>
                                                    <option value="54">Ô tô, xe máy</option>
                                                    <option value="55">Bất động sản</option>
                                                    <option value="56">Khác</option>
                                                    <option value="57">Thực phẩm</option>
                                                    <option value="58">Đồ uống</option>
                                                    <option value="59">Vật liệu Xây dựng</option>
                                                    <option value="60">Sách/DVD/CD</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Họ tên</td>
                                            <td><input type="text" placeholder="Nhập họ tên của bạn" bind="infoCus.name" id="inputCustomerFullName"/></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><input type="text" placeholder="Nhập email của bạn" bind="infoCus.email" id="inputCustomerEmail"/></td>
                                        </tr>
                                        <tr>
                                            <td>Điện thoại</td>
                                            <td><input type="text" placeholder="Nhập điện thoại của bạn" bind="infoCus.phone" id="inputCustomerPhone"/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><button class="btn btn-add" type="button" bind-event-click="submitFormRequestAdvice()">Yêu cầu tư vấn</button></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </script>
            </div>
            <div define="{products_match_current_search: 20}"></div>
        </div>
    </div>
</section>
<!-- /.content -->