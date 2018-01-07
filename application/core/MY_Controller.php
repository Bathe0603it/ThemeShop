<?php
    class MY_Controller extends CI_Controller{
        public $view = null;
        public $object      = null;
        public $method      = null;
        public $edit        = 'edit';
        public $create      = 'create';
        function __construct(){
            parent::__construct();
            /** xu ly dang nhap **/
            $this->load->helper(array('admin_helper','db_helper'));
            $urlNow = $this->uri->uri_string();
            $segment1 = $this->uri->segment(1);
            $segment2 = $this->uri->segment(2);
            $segment3 = $this->uri->segment(3);
            $this->load->library(array('form_validation','auth','paginationextends','function_lib'));

            // not exits session logined
            if (!$this->session->has_userdata('logined') && $segment2 != 'logincontroller') {
                return redirect(admin_url('logincontroller'));
            }

            // exits session Logined and url is login
            if ($this->session->has_userdata('logined') && $segment2 == 'logincontroller') {
                return redirect(admin_url('dashboardcontroller/index'));
            }

            // exits session Logined and url is login
            if ($this->session->has_userdata('logined') && $segment2 != 'logincontroller') {
                // Check Permission System
                if (!$this->auth->checkPermission($urlNow)) {
                    $msg    = 'Không thể truy xuất <b>đường dẫn</b>';
                    $this->system->flash('msg_warning',$msg);
                    return redirect(admin_url('dashboardcontroller/index'));
                }
            }

            
            
            /** xu ly view **/
            $this->view = 'admincp/' . $this->router->fetch_class() .'/' . $this->router->fetch_method();
            $this->object   = $this->router->fetch_class();
            $this->method   = $this->router->fetch_method();
        }
         
        function loadView($url = null ,$data = null){
            $data['view']   = !empty($url)?$url:$this->view;
            $data['logined']    = $this->auth->info()?$this->auth->info():'';
            $arrPermission  = $this->auth->getPermission();
<<<<<<< HEAD
            $data['recursivePermission']    = $recursivePermission = $this->function_lib->getListRecursive($arrPermission);
            $data['logined']    = $this->auth->info()?$this->auth->info():'';

            // get permission of administrator
            $arrPermission  = $this->auth->getPermission();
            $data['permissions'] = $this->function_lib->getListRecursive($arrPermission);
=======
>>>>>>> parent of 1d78b94... home
            $this->load->view('admincp/layout/index',$data);
        }
    }
?>