<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class MenuModel extends MY_Model{
        public $table = 'menus';
        private $slug;
        private $description;
        private $location;
        private $name;
        
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
