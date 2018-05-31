<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * Manager Product Admincp
     * 
     * */
    class ProductController extends MY_Controller
    {
        private $model = 'productModel';

        public function __construct(){                       
            parent::__construct();
            $this->load->model(array(
                $this->model,
                'categoryModel'
            ));
        }
    
        public function index(){
            // 1. Xu ly du lieu xuong tu url
            $inputGet   = $this->input->get();
            $page   = isset($inputGet['page'])?($inputGet['page']?$inputGet['page']:0):0;
            $offset = ( $page - 1 )*$this->productModel->limit;

            // 2. Xu ly function hien tai
            $total  = $this->productModel->countAll();
            $productList    = $this->productModel->getBy(
                array(
                    'limit' => $offset,
                )
            );

            // 2.1. Xu ly phan trang
            $paramsPagination    = array(
                'total'     => $total,
                'base_url'  => $this->uri->uri_string()
            );
            $pagination     = $this->paginationextend->get($paramsPagination);

            // 3. Xu ly data to view
            $data['data']   = array(
                'productList'   => $productList,
                'pagination'    => $pagination,
            );
            $this->loadView($this->view,$data);
        }
        
        public function create(){
            // 1. Xu ly du lieu tu url
            
            // 2. Xu ly function now
            if (is_post()) {
                $this->postCreate();
            }

            // 3. Xu ly data to view
            $this->loadView($this->view);
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
            $data['item']   = $item = $this->productModel->getInfo($id);

            // 4. Xu ly data to view
            $this->loadView($this->view,$data);
        }

        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('product_create')) {
                $arr_insert = $input;
                $this->productModel->insert($arr_insert);

                // Thong bao
                $msg = insertOk('Sản Phẩm');
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
            if ($this->form_validation->run('product_edit')) {
                $arr_update = $input;
                $this->productModel->update($arr_update,$id);
                
                $msg = editOk('Sản Phẩm');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }
        
        
    }
