<?php
    if(!function_exists('get_action_name')){
        function get_action_name($input = null){
            echo 'hello';
        }
    }
    
    /**
    *
    * get template of fronted
    * @param string
    * @return string url
    *
    **/
    if(!function_exists('public_url')){
        function public_url($input = null){
            return base_url('templates/site/');
        }
    }

    /**
     *  Config limit default
     *
     *  @access public
     *  @return int
     */
    if (!function_exists('limit')) {
        function limit(){
            return LIMIT;
        }
    }

    /**
     *  Config url image category default
     *
     *  @param array array list info item
     *  @param bool value get thumbnail image
     *  @access public
     *  @return string
     */
    if (!function_exists('get_link_image_category')) {
        function get_link_image_category($paramItem, $thumb = false, $sizethumb = false){
            if (!$paramItem['image']) {
                if ($thumb) {
                    return get_no_image();
                }
                return get_no_image_max_size();
            }
            if ($thumb) {
                if ($sizethumb) {
                    return is_file('uploads/categorys/thumb/50x50/'.$paramItem['image'])?base_url('uploads/categorys/thumb/50x50/'.$paramItem['image']):get_no_image();
                }
                return is_file('uploads/categorys/thumb/'.$paramItem['image'])?base_url('uploads/categorys/thumb/'.$paramItem['image']):get_no_image();
            }
            return is_file('uploads/categorys/'.$paramItem['image'])?base_url('uploads/categorys/'.$paramItem['image']):get_no_image_max_size();;
        }
    }

    /**
     *  Config url image category default
     *
     *  @param array array list info item
     *  @access public
     *  @return string
     */
    if (!function_exists('get_link_image_thumb_category')) {
        function get_link_image_thumb_category($paramItem){
            return get_link_image_category($paramItem, true);
        }
    }

    /**
     *  Config url image category default
     *
     *  @param array array list info item
     *  @access public
     *  @return string
     */
    if (!function_exists('get_link_image_thumb_min_size_category')) {
        function get_link_image_thumb_min_size_category($paramItem){
            return get_link_image_category($paramItem, true, true);
        }
    }

    if(!function_exists('get_no_image')){
        function get_no_image($input = null){
            return base_url('public/globals/images/noimage.jpg');
        }
    }

    if(!function_exists('get_no_image_max_size')){
        function get_no_image_max_size($input = null){
            return base_url('public/globals/images/noimage-max.jpg');
        }
    }

    if (!function_exists('check_is_file')) {
        function check_is_file($filePath){
            return is_file($filePath)?true:false;
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

    if(!function_exists('category_layout')){
        function category_layout($input = null){
            $arr = array(
                'default'   => 'Layout mặc định',
                'single'    => 'Layout trang đơn',
                'list'      => 'Layout danh sách',
                'image'     => 'Layout ảnh',
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

    if(!function_exists('get_status')){
        function get_status($input = null){
            $arr = array(
                'publish'   => 'Đã đăng',
                // 'pending'   => 'Chờ xét duyệt',
                'draft'     => 'Bản nháp',
                'trash'     => 'Trong thùng rác',
                'destroy'   => 'Phá hủy(xóa hoàn toàn)',
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
    
?>