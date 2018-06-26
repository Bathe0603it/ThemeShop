<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class MenuModel extends MY_Model{
        public $table = 'menus';
        public $filed = array(
        	'name',
        	'slug',
        	'description',
        	'location'
        );
        public function __construct(){
        	parent::__construct();
            $this->load->database();
        }
    }
