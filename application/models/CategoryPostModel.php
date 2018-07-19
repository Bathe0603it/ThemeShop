<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class CategoryPostModel extends MY_Model{
        public $table = 'categorys_post';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
