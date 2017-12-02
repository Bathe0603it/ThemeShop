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
            $this->load->model(array('userModel','roleModel'));
            $this->load->library('Auth');   // load auth de them suffix
        }
    
        public function index(){
            $getall = $this->userModel->getAll();
            $data['getall'] = $getall;
            $this->loadview($this->view,$data);
        }
        
        public function edit(){
            
        }
        
        public function create(){
            if (is_post()) {
                $this->postCreate();
            }
            $result = $this->userModel->getAll();
            $group_system   = getGroupSystem();
            foreach ($group_system as $key => $value) {
                // lay danh sach nhom cung danh muc
                $arr_gr = array(
                    'groupsystem'   => $key,
                );
                $temp  = $this->roleModel->getByWhere($arr_gr);
                $list_group_system[$key]    = $this->function_lib->set_parent_to_array($temp);
                $list_group_system[$key]    = $this->function_lib->get_parent_to_array();
            }

            // gui du lieu qua view
            $data['data']   = array(
                'list_group_system' => $list_group_system,
            );
            $this->loadView($this->view,$data);
        }
        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('user_create')) {
                $arr_insert = $input;
                // quy doi roleId
                $arr_insert['permission']   = isset($input['RoleIds'])?json_encode($input['RoleIds']):'';
                unset($arr_insert['RoleIds']);
                unset($arr_insert['ConfirmPassword']);
                // quy doi password luu kieu md5
                $arr_insert['password'] = md5($this->auth->suffix_pass.$input['Password']);
                $this->userModel->insert($arr_insert);
                $msg = editOk('quản trị viên');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
                return false;
            }
            
            // neu ok
            
            // neu k ok
        }
        
        
    }
