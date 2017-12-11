<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * function action login admin
     * 
     * */
    class ProductController extends MY_Controller
    {
        private $model = 'ProductModel';

        public function __construct(){                                                                                                              
            parent::__construct();
            $this->load->model($this->model);
        }
    
        public function index(){
            $arr_set = array(
                'select'    => 'id,name',
                ''
            );
            $getAll = $this->ProductModel->getBy();
            
            $data['data']   = array(
                'getAll'    => $getAll,
            );
            $this->loadView($this->view,$data);
        }
        
        public function edit(){
            // Kiem tra co ton tai id truyen vao k
            if (!$id = $this->input->get('id')) {
                $this->system->flash('msg_error','Chưa chọn bản ghi sửa đổi');
                return rediectIndex();
            }
            if (is_post()) { 
                // here input
                $this->postEdit($id);
            }
            // Thong tin ban ghi hien tai
            $data['item']   = $item = $this->ProductModel->getInfo($id);

            $getAll         = $this->ProductModel->getAll();   // lay danh sach cac ban ghi
            $parent_getall  = $this->function_lib->get_parent_to_array($getAll);
            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        public function create(){
            if (is_post()) {
                $this->postCreate();
            }
            $getAll     = $this->ProductModel->getAll();   // lay danh sach cac quyen he thong
            $parent_getall  = $this->function_lib->get_parent_to_array($getAll);
            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('role_create')) {
                $arr_insert = $input;
                $this->ProductModel->insert($arr_insert);
                $this->updateLevel();
                $msg = insertOk('quyền hệ thống');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }

        private function postEdit($id){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('role_edit')) {
                $arr_update = $input;
                $this->ProductModel->update($arr_update,$id);
                $this->updateLevel();
                $msg = editOk('quyền hệ thống');
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
            $checkData  = $this->ProductModel->getWhere(array( 'permission' => $permission , 'id<>' => $id ));
            return !$checkData?true:false;
        }

        /**
        *
        * 
        * @param 
        * @return 
        *
        **/
        public function updateLevel(){
            $result = $this->ProductModel->getAll();
            $recive = $this->function_lib->set_parent_to_number($result);
            $recive = $this->function_lib->get_parent_to_number($result);
            foreach ($recive as $key => $value) {
                foreach ($value as $keyItem => $valueItem) {
                    $arrUpdate  = array(
                        'level' => $key
                    );
                    $this->ProductModel->update($arrUpdate,$valueItem['id']);
                }
            }
            return true;
        }
        
        
    }