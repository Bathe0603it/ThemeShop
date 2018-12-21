<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * function action login admin
     * 
     * */
    class LoginController extends MY_Controller
    {
        public function __construct(){
            parent::__construct();
        }
    
        public function index(){
            if (is_post()) {
                $this->loginPost();
            }
            $this->load->view('admincp/logincontroller/index');
        }
        
        public function loginPost(){
            $input  = $this->input->post();
            if ($this->form_validation->run('admin_login'))
            {
                $arr_input  = array(
                    $input['email'],$input['password']
                );
                if($this->auth->process_login($arr_input)){
                    redirect(admin_url('dashboardcontroller/index'));
                }
                else{
                    $this->system->flash('errors', '<div id="login_error">  <strong>LỖI</strong>: Mật khẩu mà bạn đã nhập cho người dùng <strong>Administrator</strong> chưa đúng. <a href="'.admin_url('logincontroller/lostpassword').'">Bạn quên mật khẩu?</a><br></div>');
                }
                //return 'false';
            }
            else
            {
                $this->system->flash('errors', '<div id="login_error"><strong>LỖI</strong>:'.validation_errors().'</div>');
            }
        }

        public function logout(){
            $this->session->unset_userdata('logined');
            return redirect(admin_url());
        }
    }
