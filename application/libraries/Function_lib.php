<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Function_lib extends MY_Controller{

        function __construct(){
            $this->CI = & get_instance();
        }
        
        public function get_parent_to_compornent($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            $this->menu_child .= '';
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                foreach ($menu_tmp as $item)
                {
                    $this->menu_child = $this->load->view('site/tuvi_ngay_thang_nam/table',array('item'=>$item,'heading'=>$heading));
                    $this->get_parent_to_compornent($input, $item['id'],$heading.'|--');
                }
                
            }
            return $this->menu_child;
        }

        public function get_parent_to_array($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                //$this->menu_arr[$heading]    = $item;
                foreach ($menu_tmp as $item)
                {
                    $this->menu_arr     = array(
                        'info'  => $item,
                        'heading'   => $heading,
                    );
                     
                    $this->get_parent_to_array($input, $item['id'],$heading.'--');
                }
                
            }
            return $this->menu_arr;
        }

        public function get_parent_to_number($input,$id_parent = 0,$heading = ''){
            $menu_tmp = array();
            foreach ($input as $key => $item)
            {
                if ($item['parent'] == $id_parent)
                {
                    $menu_tmp[] = $item;
                    unset($input[$key]);
                }
            }
            if ($menu_tmp)
            {
                //$this->menu_arr[$heading]    = $item;
                foreach ($menu_tmp as $item)
                {
                    $this->menu_arr     = array(
                        'info'  => $item,
                        'heading'   => $heading,
                    );
                     
                    $this->get_parent_to_array($input, $item['id'],$heading.'--');
                }
                
            }
            return $this->menu_arr;
        }
    }
?>