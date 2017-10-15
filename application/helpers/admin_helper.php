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
    
    if(!function_exists('admin_template_url')){
        function admin_template_url($input = null){
            return base_url('public/admincp/template/'.$input);
        }
    }

    if(!function_exists('get_status')){
        function get_status($input = null){
            $arr = array(
                'publish'   => 'Đã đăng',
                'pending'   => 'Chờ xét duyệt',
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
?>