<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class UserModel extends MY_Model{
        public $table = 'user';
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        /*public function created($data){
            return $this->insert($data);
        }*/
    
    }
