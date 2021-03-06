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
            /** Action get parameter **/
            $inputGet   = $this->input->get();
            $page   = isset($inputGet['page'])?($inputGet['page']?$inputGet['page']:1):1;
            $offset = ( $page - 1 )*LIMIT;

            /** Process **/
            $limitParam = (isset($inputGet['limit']) and $inputGet['limit'])?$inputGet['limit']:LIMIT;
            $searchParam    = (isset($inputGet['search']) and $inputGet['search'])?$inputGet['search']:null;
            $orderParam = (isset($inputGet['order']) and $inputGet['order'])?$inputGet['order']:null;
            $arrCount   = array(
                'like'  => array(
                    'name'  => $searchParam
                )
            );
            $arrQuery   = array(
                'like'  => array(
                    'name'  => $searchParam
                ),
                'limit' => array(
                    $limitParam,
                    $offset
                ),
                'order_by'  => array(
                    'id', 'asc'
                )
            );
            $countAll   = $this->roleModel->countAll();
            $countList  = $this->roleModel->getCountBy($arrCount);
            $list   = $this->roleModel->getBy($arrQuery);
            $parent_getall  = $this->recusive_lib->set_parent_to_array($list);
            $parent_getall  = $this->recusive_lib->get_parent_to_array();

            /** Pagination **/
            $pagination     = $this->paginationextend->get(array(
                'total' => $countList
            ));

            /** Pramas **/
            $data['data']   = array(
                'parent_getall' => $parent_getall,
                'pagination'    => $pagination,
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
            $data['item']   = $item = $this->roleModel->getInfo($id);

            $getAll         = $this->roleModel->getAll();   // lay danh sach cac ban ghi
            $parent_getall  = $this->recusive_lib->get_parent_to_array_have_return($getAll);

            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        public function create(){
            if (is_post()) {
                $this->postCreate();
            }
            $getAll     = $this->roleModel->getAll();   // lay danh sach cac quyen he thong
            $parent_getall  = $this->recusive_lib->get_parent_to_array_have_return($getAll);

            $data['parent_getall'] = $parent_getall;
            $this->loadView($this->view,$data);
        }
        
        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('role_create')) {
                $arr_insert = $input;
                $this->roleModel->insert($arr_insert);
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
                $this->roleModel->update($arr_update,$id);
                $this->updateLevel();
                $msg = editOk('quyền hệ thống');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }

        public function permissionCheck(){
            $input  = $this->input->post();
            // Kiem tra url hien tai da ton tai trong db
            $id     = $_GET['id'];
            $permission     = $input['permission'];
            $checkData  = $this->roleModel->getWhere(array( 'permission' => $permission , 'id<>' => $id ));
            return $checkData?true:false;   // neu tim thay 1 ban ghi cung permission va khac item id return true as "tim thay" else "khong tim thay"
        }

        /**
        *
        * 
        * @param 
        * @return 
        *
        **/
        public function updateLevel(){
            $result = $this->roleModel->getAll();
            $this->recusive_lib->set_parent_to_number($result);
            $recive = $this->recusive_lib->get_parent_to_number($result);
            foreach ($recive as $key => $value) {
                foreach ($value as $keyItem => $valueItem) {
                    $arrUpdate  = array(
                        'level' => $key
                    );
                    $this->roleModel->update($arrUpdate,$valueItem['id']);
                }
            }
            return true;
        }
        
        
    }
