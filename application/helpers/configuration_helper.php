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
        function get_link_image_category($paramItem, $thumb = false){
            if ($thumb) {
                return base_url('uploads/categorys/_thumb/'.$paramItem['image']);
            }
            return base_url('uploads/categorys/'.$paramItem['image']);
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
    
?>