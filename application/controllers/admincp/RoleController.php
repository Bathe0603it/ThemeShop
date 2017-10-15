<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * function action login admin
     * 
     * */
    class RoleController extends MY_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('RoleModel');
        }
    
        public function index(){
            $getall = $this->RoleModel->getAll();
            $data['getall'] = $getall;
            $this->loadView($this->view,$data);
        }
        
        public function edit(){
            
        }
        
        public function create(){
            if (is_post()) {
                $this->postCreate();
            }
            $this->loadView($this->view);
        }
        
        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('user_create')) {
                $arr_insert = $input;
                // quy doi password luu kieu md5
                $arr_insert['password'] = md5($this->auth->suffix_pass.$input['password']);
                $this->usermodel->insert($arr_insert);
            }
            else{
                
            }
            
            // neu ok
            
            // neu k ok
        }
        
        
    }
