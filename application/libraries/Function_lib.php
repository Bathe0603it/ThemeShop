<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Function_lib extends MY_Controller{
        private $CI   = null;

        function __construct(){
            $this->CI = & get_instance();
        }
        
        function getCategorysRecusive(){
            $this->CI->load->model('categoryModel');
            $catList    = $this->CI->categoryModel->getBy(
                array(
                    'order_by' => array('sort', 'asc'),
                )
            );
            $this->recusive_lib->set_parent_to_array($catList);
            return $this->recusive_lib->get_parent_to_array();
        }
    }
?>