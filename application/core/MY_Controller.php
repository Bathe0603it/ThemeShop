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
            $this->load->helper('admin_helper');
            $urlNow = $this->uri->string();
            $segment1 = $this->uri->segment(1);
            $segment2 = $this->uri->segment(2);
            $segment3 = $this->uri->segment(3);
            $this->load->library(array('form_validation','auth','paginationextends','function_lib'));

            // Khong ton tai session logined
            if (!$this->session->has_userdata('logined') && $segment2 != 'logincontroller') {
                return redirect(admin_url('logincontroller'));
            }

            // Ton tai session Logined and url is login
            if ($this->session->has_userdata('logined') && $segment2 == 'logincontroller') {
                return redirect(admin_url('dashboardcontroller'));
            }

            // Kiem tra quyen he thong
            
            
            /** xu ly view **/
            $this->view = 'admincp/' . $this->router->fetch_class() .'/' . $this->router->fetch_method();
            $this->object   = $this->router->fetch_class();
            $this->method   = $this->router->fetch_method();
        }
         
        function loadView($url = null ,$data = null){
            $data['view']   = !empty($url)?$url:$this->view;
            $data['logined']    = $this->session->has_userdata('logined')?$this->session->userdata('logined'):'';
            $this->load->view('admincp/layout/index',$data);
        }
    }
?>