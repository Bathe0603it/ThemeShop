<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class PaginationExtend extends CI_Pagination{
        public $limit    = LIMIT;
        public $total    = 0;
        public $base_url = null;
        public $record   = 100;
        public $num_links   = 2;

        function __construct(){
            $this->CI = & get_instance();
        }

        function get($params = null){
            if (isset($params['theme'])) {
                switch ($params['theme']) {
                    case 'theme1':{
                        return $this->get_theme1($params);
                        break;
                    }
                    case 'theme2':{
                        return $this->get_theme2($params);
                        break;
                    }
                    case 'theme3':{
                        return $this->get_theme3($params);
                        break;
                    }
                    
                    default:
                        return $this->get_theme1($params);
                        break;
                }
            }
            return $this->get_theme1($params);
        }

        /**
        *
        * Function create PAGINATION
        * @param string     ---
        * @return bool|null    ---
        *
        **/
        function get_theme1($params = null){
            $this->limit    = isset($params['limit'])?$params['limit']:$this->limit;
            $this->total    = isset($params['total'])?$params['total']:$this->total;
            $this->base_url    = isset($params['base_url'])?$params['base_url']:$this->CI->uri->uri_string();
            $this->record    = isset($params['record'])?$params['record']:$this->record;
            $this->num_links    = isset($params['num_links'])?$params['num_links']:$this->num_links;

            // Action pagination
            $page   = isset($_GET['page'])?$_GET['page']:1;
            $page   = !empty($page)?$page:1;
            $offset = ( $page - 1 )*$this->limit;

            /** cau hinh phan trang -1 **/
            $slugPage   = $this->base_url;
            
            $queryString    = str_replace('page='.$page, '', $_SERVER['QUERY_STRING']);
            if ($queryString) {
                $config["base_url"] = $slugPage.'?'.$queryString;
            }
            else{
                $config['base_url'] = base_url($slugPage.'');
            }
            $config['total_rows'] = $this->total; // xác định tổng số record  
            $config['per_page'] = $this->record; // xác định số record ở mỗi trang  
            // $config['uri_segment'] = $giatri_get; // xác định segment chứa page number
            $config['num_links'] = $this->num_links;   // số link hiển thị trong phân trang đứng trước trang được chọn
            $config['use_page_numbers'] = TRUE; // page = 10, 20, 30
            $config['page_query_string'] = TRUE;
            $config['query_string_segment'] = 'page';
            /** end -1 **/

            /** Config style **/
            // html va css
            // vien bo ngoai cung cua phan trang
            $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
            $config['full_tag_close'] = '</ul>';
            // vien bo ngoai first va last
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            // noi dung trong first va last
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            // vien bo ngoai next
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            // vien bo ngoai prev
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            // vien bo ngoai so duoc chon
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            // vien bo ngoai tung so 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['display_pages'] = true;

            $config['total_rows'] = $this->total;
            $config['per_page'] = $this->limit;
            $this->initialize($config);
            return $this->create_links();
            
        }

        function get_theme2($params = null){
            $this->limit    = isset($params['limit'])?$params['limit']:$this->limit;
            $this->total    = isset($params['total'])?$params['total']:$this->total;
            $this->base_url    = isset($params['base_url'])?$params['base_url']:$this->uri->uri_string();

            // Action pagination
            $page   = isset($_GET['page'])?$_GET['page']:1;
            $page   = !empty($page)?$page:1;
            $offset = ( $page - 1 )*$this->limit;

            /** cau hinh phan trang -2 **/
            $slugPage   = $this->base_url;
            
            $queryString    = str_replace('page='.$page, '', $_SERVER['QUERY_STRING']);
            if ($queryString) {
                $config["base_url"] = $slugPage.'?'.$queryString;
            }
            else{
                $config['base_url'] = base_url($slugPage.'');
            }
            $config['total_rows'] = $this->total;
            $config['per_page'] = $this->limit;
            $this->initialize($config);
            return $this->create_links();
            /** end -2 **/
        }

        function get_theme3($params = null){
            $this->limit    = isset($params['limit'])?$params['limit']:$this->limit;
            $this->total    = isset($params['total'])?$params['total']:$this->total;
            $this->base_url    = isset($params['base_url'])?$params['base_url']:$this->uri->uri_string();

            // Action pagination
            $page   = isset($_GET['page'])?$_GET['page']:1;
            $page   = !empty($page)?$page:1;
            $offset = ( $page - 1 )*$this->limit;

            /** cau hinh phan trang -2 **/
            $slugPage   = $this->base_url;
            
            $queryString    = str_replace('page='.$page, '', $_SERVER['QUERY_STRING']);
            if ($queryString) {
                $config["base_url"] = $slugPage.'?'.$queryString;
            }
            else{
                $config['base_url'] = base_url($slugPage.'');
            }
            $config['total_rows'] = $this->total;
            $config['per_page'] = $this->limit;
            $this->initialize($config);
            return $this->create_links();
            /** end -2 **/
        }

        /**
         *  get pagination not action
         *
         *  @param string url: url now
         *  @param int total: total all record
         *  @param int total: total all record
         *  @access public
         *  @return array
         */
        function pagination_page($url =null,$total = null,$record = null,$giatri_get = null,$hienthi = true){
            $this->CI->load->library('pagination');  
            // cấu hình phân trang  
            $config['base_url'] = base_url().''.$url; // xác định trang phân trang
            $config['total_rows'] = $total; // xác định tổng số record  
            $config['per_page'] = $record; // xác định số record ở mỗi trang  
            $config['uri_segment'] = $giatri_get; // xác định segment chứa page number
            $config['num_links'] = 1;   // số link hiển thị trong phân trang đứng trước trang được chọn
            // html va css
            // vien bo ngoai cung cua phan trang
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            // vien bo ngoai first va last
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            // noi dung trong first va last
            $config['first_link'] = '<span class="glyphicon glyphicon-step-backward custom-paginations" ></span>';
            $config['last_link'] = '<span class="glyphicon glyphicon-step-forward custom-paginations" ></span>';
            // vien bo ngoai next
            $config['next_link'] = '<span class="glyphicon glyphicon-chevron-right custom-paginations" ></span>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            // vien bo ngoai prev
            $config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left custom-paginations" ></span>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            // vien bo ngoai so duoc chon
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            // vien bo ngoai tung so 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['display_pages'] = $hienthi;
            
            $this->CI->pagination->initialize($config);
            $pagination_pages = $this->CI->pagination->create_links();
            $index = ($this->CI->uri->segment($giatri_get)=='')?0:$this->CI->uri->segment($giatri_get);
            $data = array('pagination_pages' =>$pagination_pages,'get_index' => $index);
            return $data;
        }
    }
?>