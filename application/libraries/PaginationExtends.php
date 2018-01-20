<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class PaginationExtends extends CI_Pagination{
        public $limit    = 25;
        public $total    = null;
        public $base_url    = null;

        function __construct(){
            $this->CI = & get_instance();
        }

        function get($limit = null, $total = null, $base_url = null){
            $this->limit    = $limit?$limit:$this->limit;
            $this->total    = $total?$total:$this->total;
            $this->base_url    = $base_url?$base_url:$this->uri->uri_string();
            // Action pagination
            $page   = isset($_GET['page'])?$_GET['page']:1;
            $page   = !empty($page)?$page:1;
            $offset = ( $page - 1 )*$this->limit;

            /** cau hinh phan trang -2 **/
            // $this->load->library('pagination');
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