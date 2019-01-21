<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Upload_lib {
        private $CI     = null;
        public $errors  = null;
        public $info    = null;
        private $prefix = 'uploads';

        function __construct(){
            $this->CI = & get_instance();
        }

        function doUpload($params){
            $config['upload_path']  = $this->prefix.'/'.(isset($params['path'])?$params['path']:'');
            $config['allowed_types']= 'gif|jpg|png';
            $config['max_size']     = 100;
            $config['max_width']    = 1024;
            $config['max_height']   = 768;
            $this->CI->load->library('upload', $config);

            if ( ! $this->CI->upload->do_upload($params['name']))
            {
                $this->errors   = $this->CI->upload->display_errors();
                dd($this->errors);
                return false;
            }
            else
            {
                $this->info     = $this->CI->upload->data();
                return true;
            }
        }
    }
?>