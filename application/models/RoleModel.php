<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class RoleModel extends MY_Model{
        public $table = 'role';
        public function __construct(){
            $this->load->database();
        }
    }
