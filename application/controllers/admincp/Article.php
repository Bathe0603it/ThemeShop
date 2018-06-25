<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * Manager Category Admincp
     * 
     * */
    class MenuController extends MY_Controller
    {
        private $model = 'menuModel';

        public function __construct(){                       
            parent::__construct();

            $this->load->model(array(
                $this->model,
                'menuModel'
            ));
        }
    
        public function index(){
            /** 1. Xu ly du lieu xuong tu url **/
            $inputGet   = $this->input->get();
            $page   = isset( $inputGet['page'] ) ? ( $inputGet['page'] ? $inputGet['page'] : 1 ) : 1;
            $offset = ( $page - 1 ) * $this->menuModel->limit;

            /** 2. Xu ly function hien tai **/
            $total  = $this->menuModel->countAll();
            $menuList    = $this->menuModel->getBy(
                array(
                    'limit' => $offset,
                )
            );

            // 2.1. Xu ly phan trang
            $paramsPagination    = array(
                'total'     => $total,
                'base_url'  => $this->uri->uri_string()
            );
            $pagination     = $this->paginationextend->get( $paramsPagination );

            /** 3. Xu ly data to view **/
            $data['data']   = array(
                'menu_list'   => $menuList,
                'pagination'    => $pagination,
            );
            $this->loadView($this->view, $data);
        }
        
        public function create(){
            /** 1. Xu ly du lieu tu url **/
            
            /** 2. Xu ly function now **/
            if (is_post()) {
                $this->postCreate();
            }

            // 3. Xu ly data to view
            $data = array(
                'reg_nav_menu' => $this->system->registerNavMenu(),
            );
            $this->loadView($this->view, $data);
        }

        public function edit(){
            // 1. Xu ly du lieu tu url
            if (!$id = $this->input->get('id')) {
                $this->system->flash('msg_error', 'Chưa chọn bản ghi sửa đổi');
                return rediectIndex();
            }

            // 2. Xu ly function now
            if (is_post()) {
                $this->postEdit($id);
            }

            // 3. Thong tin ban ghi hien tai
            $item = $this->menuModel->getInfo($id);

            // 4. Xu ly data to view
            $data = array(
                'reg_nav_menu' => $this->system->registerNavMenu(),
                'item' => $item
            );
            $this->loadView($this->view, $data);
        }

        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('cat_create')) {
                $arr_insert = $input;
                // Add into categorys
                $idCat = $this->menuModel->insert($arr_insert);
                // Add into category_taxonomy
                $idCatRel = $this->categoryRelationshipModel->insert( array(
                    'category_id' => $idCat,
                    'category_taxonomy_id' => $arr_insert['taxonomy'],
                ) );
                
                // Thong bao
                $msg = insertOk('Danh Mục');
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
            if ($this->form_validation->run('cat_edit')) {
                $arr_update = $input;
                $this->menuModel->update($arr_update,$id);
                
                $msg = editOk('Danh mục');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }
        
        
    }
