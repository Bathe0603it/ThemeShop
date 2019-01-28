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
                return false;
            }
            else
            {
                $this->info     = $this->CI->upload->data();
                $this->createThumbnail($this->info);
                return true;
            }
        }

        /**
         *  created thumnail image
         *
         *  @param type Comment for param
         *  @access public
         *  @return bool
         */
        function createThumbnail($dataImage){
            // tao anh thumbnail bang library add
            $this->CI->load->library('thumbnailimage');
            $this->CI->thumbnailimage->load($dataImage['full_path']);
            $this->CI->thumbnailimage->resizeToWidth(150);
            $this->CI->thumbnailimage->save($dataImage['file_path'].'thumb/'.$dataImage['file_name']);
            $this->CI->thumbnailimage->resizeToWidth(50);
            $this->CI->thumbnailimage->save($dataImage['file_path'].'thumb/50x50/'.$dataImage['file_name']);
            return true;
        }
    }
?>