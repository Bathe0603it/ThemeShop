<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Function_lib extends MY_Controller{
        private $parent_number   = null;
        private $arr_list        = null;
        private $listRecursive   = null;
        private $id_level_0     = null;
        private $id_level_1     = null;
        private $id_level_2     = null;

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
                    $this->menu_arr[$item['id']]    = $item;
                    $this->menu_arr[$item['id']]['heading'] = $heading;
                     
                    $this->get_parent_to_array($input, $item['id'],$heading.'--');
                }
                
            }
            return $this->menu_arr;
        }

        public function get_parent_to_number($input,$id_parent = 0,$heading = 0){
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
                $this->menu_arr[$heading]   = $menu_tmp;
                foreach ($menu_tmp as $key => $item) {
                    $this->get_parent_to_number($input, $item['id'],$heading++);
                }
                
                //$this->menu_arr[$heading]    = $item;
                /*foreach ($menu_tmp as $item)
                {
                    $this->menu_arr     = array(
                        'info'  => $item,
                        'heading'   => $heading,
                    );
                }*/
                
            }
            return $this->menu_arr;
        }

        /**
        *
        * Hàm get dữ liệu mảng theo đệ quy
        * @param $data = array
        * @return array
        *
        **/
        public function getListRecursive($data){
            $recursiveData  = $this->get_parent_to_array($data);
            foreach ($recursiveData as $key => $value) {
                if($value['level'] == 0){
                    $this->listRecursive[$value['id']]['info']    = $value;
                    $this->id_level_0 = $value['id'];
                }
                if($value['level'] == 1){
                    $this->listRecursive[$this->id_level_0][$value['id']]['info']    = $value;
                    $this->id_level_1 = $value['id'];
                }
                if($value['level'] == 2){
                    $this->listRecursive[$this->id_level_0][$this->id_level_1][$value['id']]['info']    = $value;
                }
                /*if($value['level'] == 2){
                    $this->link_position['not_parent'][$value['parent']][$value['id']]['info']    = $value;
                }*/
            }
            return $this->listRecursive;
        }
    }
?>