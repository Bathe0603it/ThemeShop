<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Upload_lib {
        private $CI   = null;

        function __construct(){
            $this->CI = & get_instance();
        }

        function doUpload($params){
            $config['upload_path']  = './uploads/';
            $config['allowed_types']= 'gif|jpg|png';
            $config['max_size']     = 100;
            $config['max_width']    = 1024;
            $config['max_height']   = 768;
            $this->CI->load->library('upload', $config);

            if ( ! $this->CI->upload->do_upload($params['name']))
            {
                $error = array('error' => $this->CI->upload->display_errors());
            }
            else
            {
                $data = array('upload_data' => $this->CI->upload->data());
                
            }
        }
    }
?>