<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    
    class UserModel extends MY_Model{
        public $table = 'users';
        public function __construct(){
            parent::__construct();
            $this->load->database();
        }

        public function create(){
            $input = $this->input->post();
            
        }

        /*public function created($data){
            return $this->insert($data);
        }*/
    
    }
