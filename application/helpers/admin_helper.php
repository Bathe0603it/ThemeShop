<?php
    if(!function_exists('admin_url')){
        function admin_url($input = null){
            return base_url('admincp/'.$input);
        }
    }
    
    if(!function_exists('admin_public_url')){
        function admin_public_url($input = null){
            return base_url('public/admincp/'.$input);
        }
    }

    if(!function_exists('admin_template_url')){
        function admin_template_url($input = null){
            return base_url('public/admincp/template/'.$input);
        }
    }
    
    if(!function_exists('admin_login_url')){
        function admin_login_url(){
            return base_url('admincp/logincontroller');
        }
    }

    if(!function_exists('insertOk')){
        function insertOk($input = null){
            return 'Thêm mới '.$input.' thành công !';
        }
    }

    if(!function_exists('editOk')){
        function editOk($input = null){
            return 'Cập nhập '.$input.' thành công !';
        }
    }

    if(!function_exists('get_status')){
        function get_status($input = null){
            $arr = array(
                'publish'   => 'Đã đăng',
                // 'pending'   => 'Chờ xét duyệt',
                'draft'     => 'Bản nháp',
                'trash'     => 'Trong thùng rác',
                'destroy'   => 'Phá hủy(xóa hoàn toàn)',
            );
        }
    }

    if(!function_exists('getGroupSystem')){
        function getGroupSystem($input = null){
            $arr = array(
                'Cửa hàng của bạn',
                'Nội dung',
                'Cấu hình',
            );
            if (!empty($input) || $input == 0) {
                if (array_key_exists($input, $arr)) {
                    return $arr[$input];
                }
            }
            return $arr;
        }
    }

    if(!function_exists('category_taxonomy')){
        function category_taxonomy($input = null){
            $arr = array(
                'category-post'     => 'Loại danh mục QL Nội dung',
                'category-product'  => 'Loại danh mục Ql Sản phẩm',
                'page'              => 'Là loại trang đơn',
            );
            if ($input) {
                if (array_key_exists($input, $arr)) {
                    return $arr[$input];
                }
                return false;
            }
            return $arr;
        }
    }

    if(!function_exists('rediectIndex')){
        function rediectIndex($input = null){
            return redirect(base_url('admincp/').getObject().'/index');
        }
    }


?>