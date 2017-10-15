<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * function action login admin
     * 
     * */
    class UserController extends MY_Controller
    {
        public function __construct(){
            parent::__construct();
            $this->load->model('UserModel');
            $this->load->library('Auth');   // load auth de them suffix
        }
    
        public function index(){
            $getall = $this->UserModel->getAll();
            $data['getall'] = $getall;
            $this->loadview($this->view,$data);
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
                $arr_insert['password'] = md5($this->Auth->suffix_pass.$input['Password']);
                $this->UserModel->insert($arr_insert);
            }
            else{
                echo validation_errors('<div class="alert alert-warning">', '</div>');
                return false;
            }
            
            // neu ok
            
            // neu k ok
        }
        
        
    }
