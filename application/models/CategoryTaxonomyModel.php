<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class CategoryTaxonomyModel extends MY_Model{
        public $table = 'category_taxonomy';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
