<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Function_lib extends MY_Controller{
        private $parent_number   = null;
        private $arr_list        = null;
        private $listRecursive   = null;
        private $id_level_0     = null;
        private $id_level_1     = null;
        private $id_level_2     = null;
        public $menu_arr       = null;

        function __construct(){
            $this->CI = & get_instance();
            $this->menu_arr       = null;
        }
        
        public function set_parent_to_compornent($input,$id_parent = 0,$heading = ''){
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
                    $this->set_parent_to_compornent($input, $item['id'],$heading.'|--');
                }
                
            }
        }

        public function get_parent_to_compornent(){
            $result_temp    = $this->menu_arr;
            $this->menu_arr = null;
            return $result_temp;
        }

        public function set_parent_to_array($input,$id_parent = 0,$heading = ''){
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
                     
                    $this->set_parent_to_array($input, $item['id'],$heading.'--');
                }
                
            }
        }

        public function get_parent_to_array(){
            $result_temp    = $this->menu_arr;
            $this->menu_arr = null;
            return $result_temp;
        }

        public function get_parent_to_array_heading($input,$id_parent = 0,$heading = ''){
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
                     
                    $this->get_parent_to_array_heading($input, $item['id'],$heading.'--');
                }
            }
            return $this->menu_arr;
        }

        public function set_parent_to_number($input,$id_parent = 0,$heading = 0){
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
                    $this->set_parent_to_number($input, $item['id'],$heading++);
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
        }

        public function get_parent_to_number(){
            $result_temp    = $this->menu_arr;
            $this->menu_arr = null;
            return $result_temp;
        }

        public function setAbc($input,$id_parent = 0,$heading = ''){
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
                    $this->arr_list[$item['id']]    = $item;
                    $this->arr_list[$item['id']]['heading']    = $heading;
                     
                    $this->setAbc($input, $item['id'],$heading.'|--');
                }
            }
            return $this->arr_list;
        }

        /**
        *
        * Hàm get dữ liệu mảng theo đệ quy
        * @param $data = array
        * @return array
        *
        **/
        /*public function getListRecursiveBin($data){
            $recursiveData  = $this->set_parent_to_array($data);
            $recursiveData  = $this->get_parent_to_array();
            foreach ($recursiveData as $key => $value) {
                if($value['level'] == 0){
                    $listRecursive[$value['id']]['info']    = $value;
                    $this->id_level_0 = $value['id'];
                }
                if($value['level'] == 1){
                    $listRecursive[$this->id_level_0][$value['id']]['info']    = $value;
                    $this->id_level_1 = $value['id'];
                }
                if($value['level'] == 2){
                    $listRecursive[$this->id_level_0][$this->id_level_1][$value['id']]['info']    = $value;
                }
            }
            return $listRecursive;
        }*/

        /**
        *
        * Hàm get dữ liệu mảng theo đệ quy
        * @param $data = array
        * @return array
        *
        **/
        public function getListRecursive(&$elements, $parentId = 0){
            $branch = array();
            foreach ($elements as $key => $element) {
                if ($element['parent'] == $parentId) {

                    $element['children'] = $this->getListRecursive($elements, $element['id']);

                    $branch[] = $element;                 
                }
            }
            return $branch;
        }
    }
?>