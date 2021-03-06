<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    /**
     * 
     * Manager Category Admincp
     * 
     * */
    class CategoryController extends MY_Controller
    {
        private $model = 'categoryModel';
        private $pathImage  = 'categorys';

        public function __construct(){                       
            parent::__construct();

            $this->load->model(array(
                $this->model
            ));

            $this->load->library(array(
                'category_lib',
                'upload_lib'
            ));
        }
    
        public function index(){
            /** 1. Xu ly du lieu xuong tu url **/
            $inputGet   = $this->input->get();
            $page   = isset( $inputGet['page'] ) ? ( $inputGet['page'] ? $inputGet['page'] : 1 ) : 1;
            $offset = ( $page - 1 ) * LIMIT;

            /** 2. Xu ly function hien tai **/
            $total  = $this->categoryModel->countAll();
            $catsList    = $this->categoryModel->getBy(
                array(
                    'limit'     => $offset
                )
            );
            $catsList = $this->recusive_lib->set_parent_to_array($catsList);
            $catsList = $this->recusive_lib->get_parent_to_array();
            
            // 2.1. Xu ly phan trang
            $paramsPagination    = array(
                'total'     => $total,
                'base_url'  => $this->uri->uri_string()
            );
            $pagination     = $this->paginationextend->get( $paramsPagination );

            /** 3. Xu ly data to view **/
            $data   = array(
                'catsList'   => $catsList,
                'pagination'    => $pagination,
            );
            $this->loadView($this->view, $data);
        }
        
        public function create(){
            /** 1. Xu ly du lieu tu url **/
            
            /** 2. Xu ly function now **/
            if (is_post()) {
                $this->postCreate()?redirectIndex():'';
            }
            
            $recListCat = $this->category_lib->categoryRecusive();

            // 3. Xu ly data to view
            $data = array(
                'rcsCategory' => $recListCat,
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
                $this->postEdit($id)?redirectIndex():'';
            }
            $recListCat = $this->category_lib->categoryRecusive();

            // 3. Thong tin ban ghi hien tai
            $item = $this->categoryModel->getInfo($id);

            // 4. Xu ly data to view
            $data = array(
                'rcsCategory' => $recListCat,
                'item' => $item
            );
            $this->loadView($this->view, $data);
        }

        private function postCreate(){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('cat_create')) {
                $arr_insert = $input;

                // Customer slug
                $slug   = $input['slug']?$input['slug']:slug($input['name']);
                if ($this->categoryModel->getWhere(array('slug' => $slug))) {
                    // Get next id
                    $nextId = $this->categoryModel->getNextId();
                    $slug   = $slug.'-'.$nextId;
                }
                $arr_insert['slug'] = $slug;
                
                // Upload image
                if (isset($_FILES['image']) and $_FILES['image']['name']) {
                    if ($this->upload_lib->doUpload(array('name' => 'image', 'path' => $this->pathImage))) {
                        $infoImage              = $this->upload_lib->info;
                        $arr_insert['image']    = $infoImage['file_name'];
                    }
                    else{
                        $this->system->flash('msg_warning',$this->upload_lib->errors);
                    }
                }

                // Add into categorys
                $idCat = $this->categoryModel->insert($arr_insert);

                // Thong bao
                $msg = insertOk('Danh Mục');
                $this->system->flash('msg_success',$msg);
                return true;
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
                return false;
            }
        }

        private function postEdit($id){
            // xu ly formvalidate
            $input  = $this->input->post();
            if ($this->form_validation->run('cat_edit')) {
                $arr_update = $input;

                // Check image upload
                if (isset($_FILES['image']) and $_FILES['image']['name']) {
                    if ($this->upload_lib->doUpload(array('name' => 'image', 'path' => $this->pathImage))) {
                        $infoImage              = $this->upload_lib->info;
                        $arr_update['image']    = $infoImage['file_name'];
                    }
                    else{
                        $this->system->flash('msg_warning',$this->upload_lib->errors);
                    }
                }
                
                $this->categoryModel->update($arr_update,$id);

                // Add into category_taxonomy
                // $idCatRel = $this->categoryRelationshipModel->updateWhere( 
                //     array(
                //         'category_taxonomy_id' => $arr_insert['taxonomy']
                //     ), // update
                //     array(
                //         'category_id' => $id
                //     ) // where
                // );
                
                $msg = editOk('Danh mục');
                $this->system->flash('msg_success',$msg);
            }
            else{
                $msg = validation_errors();
                $this->system->flash('msg_warning',$msg);
            }
        }

        public function slugCheck(){
            $input  = $this->input->post();
            // Kiem tra url hien tai da ton tai trong db
            $id     = $_GET['id'];
            $slug   = $input['slug'];
            $checkData  = $this->categoryModel->getWhere(array( 'slug' => $slug , 'id<>' => $id ));
            return $checkData?true:false;   // neu tim thay 1 ban ghi cung permission va khac item id return true as "tim thay" else "khong tim thay"
        }
    }
