<?php
    class MY_Controller extends CI_Controller{
        public $view = null;
        public $object      = null;
        public $method      = null;
        public $edit        = 'edit';
        public $create      = 'create';
        public $limit       = 25;
        public $url         = null;
        public $prefix      = 'admincp';
        public $urlNow      = null;

        public function __construct(){
            parent::__construct();
            $this->urlNow = $this->uri->uri_string();
            $segment1 = $this->uri->segment(1);

            // Check admincp in url
            if (preg_match('/'.$this->prefix.'/', $this->urlNow) and $segment1 = $this->prefix) {
                $this->adminLoginProcess();
            }
            
        }

        public function adminLoginProcess(){
            // Value default
            $segment1 = $this->uri->segment(1);
            $segment2 = $this->uri->segment(2);
            $segment3 = $this->uri->segment(3);

            /** xu ly dang nhap **/
            $this->load->helper(array(
                'admin_helper',
                'db_helper'
            ));
            
            $this->load->library(array(
                'form_validation',
                'auth',
                'paginationextend',
                'function_lib',
                'recusive_lib'
            ));

            // not exits session logined
            if (!$this->session->has_userdata('logined') and $segment2 != 'logincontroller') {
                return redirect(admin_url('logincontroller'));
            }

            // exits session Logined and url is login
            if ($this->session->has_userdata('logined') and $segment2 == 'logincontroller' and $segment3 != 'logout') {
                return redirect(admin_login_url());
            }

            // exits session Logined and url is not login
            if ($this->session->has_userdata('logined') && $segment2 != 'logincontroller') {
                // Check Permission System
                if (!$this->auth->checkPermission($this->urlNow)) {
                    $msg    = 'Không thể truy xuất <b>đường dẫn</b>';
                    $this->system->flash('msg_warning',$msg);
                    return redirect(admin_url('dashboardcontroller/index'));
                }
            }
            
            /** xu ly view **/
            $this->object   = $this->router->fetch_class();
            $this->method   = $this->router->fetch_method();
            $this->view = 'admincp/' . $this->object .'/' . $this->method;
        }
         
        public function loadView($url = null, $data = null){
            // Url view
            $view   = !empty($url)?$url:$this->view;

            // Info login
            $logined    = $this->auth->getInfo()?$this->auth->getInfo():'';
            
            // get permission of administrator
            $arrPermissions = $this->auth->getPermissionDisplay();
            $permissions    = $this->recusive_lib->getListRecursive($arrPermissions);

            // Id parent main Navigation
            $activeMain   = $this->checkMainNavigation($arrPermissions);

            // View
            $data['view']       = $view;
            $data['logined']    = $logined;
            $data['arrPermissions'] = $arrPermissions;
            $data['permissions']    = $permissions;
            $data['activeMain'] = $activeMain;
            $this->load->view('admincp/layout/index',$data);
        }

        /**
         *  check id parent url
         *
         *  @param array array permissions
         *  @access private
         *  @return int
         */     
        private function checkMainNavigation($arrPermissions){
            $urlNow = $this->uri->uri_string();
            $parent = 0;
            // Check parent
            foreach ($arrPermissions as $key => $value) {
                if ($urlNow == $value['permission']) {
                    $parent = $value['parent']?$value['parent']:$value['id'];
                }
            }
            return $parent;
        }
    }
?>