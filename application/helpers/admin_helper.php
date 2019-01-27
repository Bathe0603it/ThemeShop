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

    if(!function_exists('redirectIndex')){
        function redirectIndex($input = null){
            return redirect(base_url('admincp/').getObject().'/index');
        }
    }

    if(!function_exists('get_link_to_edit')){
        function get_link_to_edit($input = null){
            return redirect(base_url('admincp/').getObject().'/edit?id='.$input['id']);
        }
    }


?>