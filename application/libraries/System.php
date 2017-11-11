<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends My_Controller{
	protected $ci;

	public function __construct(){
        $this->ci =& get_instance();
	}

	public function flash($param1,$param2 = null){
		if (!$param2) {
			return $this->ci->session->set_userdata( $param1,$param2 );
		}
		if ($this->ci->session->has_userdata($param1)) {
			$result = $this->session->userdata($param1);
			$this->ci->session->unset_userdata($param1);
			return $result;
		}
	}
	

}

/* End of file system extends My_Controller.php */
/* Location: ./application/libraries/system extends My_Controller.php */
