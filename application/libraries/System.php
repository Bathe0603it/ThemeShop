<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class System extends My_Controller{
	protected $ci;
	public $menuConfig = null;

	public function __construct(){
        $this->ci =& get_instance();
	}

	public function flash($param1,$param2 = null){
		if ($param2) {
			return $this->ci->session->set_userdata( $param1,$param2 );
		}
		if ($this->ci->session->has_userdata($param1)) {
			$result = $this->ci->session->userdata($param1);
			$this->ci->session->unset_userdata($param1);
			return $result;
		}
		return false;
	}

	public function hasFlash($param){
		if ($this->ci->session->has_userdata($param)) {
			return true;
		}
		return false;
	}
	
	public function addThemeSupportAricle(){
		return array(
			'images',
			'video',
			'gallery',
			'quote',
			'link',
		);
	}

	public function registerNavMenu(){
		return array(
			array(
				'primary-menu', 
				'Menu chính'
			),
			array(
				'bottom-menu', 
				'Menu chân trang'
			),
		);
	}

	public function registerSidebar(){
		// Tao sidebar - tao 2 sidebar
		$sidebar1 	= array(
			'name'	=> 'Main Sidebar',
			'id'	=> 'main-sidebar',
			'class'	=> 'main-sidebar',
			'before_widget'	=> '<li>',
			'after_widget'	=> '</li>',
			'before_title'	=> '<h3 class="sidebar">',
			'after_title'	=> '</h3>',
		);
		$sidebar2 	= array(
			'name'	=> 'Extend Sidebar',
			'id'	=> 'extend-sidebar',
			'class'	=> 'extend-sidebar',
			'before_widget'	=> '<li>',
			'after_widget'	=> '</li>',
			'before_title'	=> '<h3 class="sidebar">',
			'after_title'	=> '</h3>',
		);
		return array(
			$sidebar1,
			$sidebar2
		);
	}
}

/* End of file system extends My_Controller.php */
/* Location: ./application/libraries/system extends My_Controller.php */
