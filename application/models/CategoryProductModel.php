<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class CategoryProductModel extends MY_Model{
        public $table = 'categorys_product';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
