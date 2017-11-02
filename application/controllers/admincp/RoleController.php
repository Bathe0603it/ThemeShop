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
            if ($this->form_validation->run('role_create')) {
                $arr_insert = $input;
                $this->usermodel->insert($arr_insert);
            }
            else{
                $msg = validation_errors();
                $this->session->set_flashdata('msg',$msg);
            }
        }
        
        
    }
