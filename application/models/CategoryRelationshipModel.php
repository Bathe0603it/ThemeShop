<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class CategoryRelationshipModel extends MY_Model{
        public $table = 'category_relationships';
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
