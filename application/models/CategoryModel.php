<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class CategoryModel extends MY_Model{
        public $table = 'categorys';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
