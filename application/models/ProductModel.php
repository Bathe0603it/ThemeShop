<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class ProductModel extends MY_Model{
        public $table = 'products';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
