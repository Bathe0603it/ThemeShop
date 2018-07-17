<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Category_lib{
        private $CI   = null;

        function __construct(){
            $this->CI = & get_instance();
        }
        
        function categoryRecusive(){
            $this->CI->load->model('categoryModel');
            $catList    = $this->CI->categoryModel->getBy(
                array(
                    'order_by' => array('sort', 'asc'),
                )
            );
            $this->CI->recusive_lib->set_parent_to_array($catList);
            return $this->CI->recusive_lib->get_parent_to_array();
        }
    }
?>