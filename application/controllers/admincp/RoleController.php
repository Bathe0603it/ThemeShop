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
            $this->load->model('roleModel');
        }
    
        public function index(){
            $getAll = $this->roleModel->getAll();
            $parent_getall  = $this->function_lib->get_parent_to_array($getAll);
            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        public function edit(){
            // Kiem tra co ton tai id truyen vao k
            if (!$id = $this->input->get('id')) {
                $this->system->flash('msg_error','Chưa chọn bản ghi sửa đổi');
                return rediectIndex();
            }
            if (is_post()) { 
                $this->postEdit($id);
            }
            // Thong tin ban ghi hien tai
            $data['item']   = $item = $this->roleModel->getInfo($id);

            $getAll         = $this->roleModel->getAll();   // lay danh sach cac ban ghi
            $parent_getall  = $this->function_lib->get_parent_to_array($getAll);
            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        public function create(){
            if (is_post()) {
                $this->postCreate();
            }
            $getAll     = $this->roleModel->getAll();   // lay danh sach cac quyen he thong
            $parent_getall  = $this->function_lib->get_parent_to_array($getAll);
            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('role_create')) {
                $arr_insert = $input;
                $this->roleModel->insert($arr_insert);
                $msg = insertOk('quyền hệ thống');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }

        private function postEdit(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('role_edit')) {
                $arr_insert = $input;
                $this->roleModel->insert($arr_insert);
                $msg = insertOk('quyền hệ thống');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }

        public function permissionCheck($param){
            $input  = $this->input->post();
            // Kiem tra url hien tai da ton tai trong db
            $id     = $_GET['id'];
            $permission     = $input['Permission'];
            $checkData  = $this->roleModel->getWhere(array( 'permission' => $permission , 'id<>' => $id ));
            return $checkData?true:false;
        }
        
        
    }
