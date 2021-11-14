<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_system {
		var $template_data = array();
		
		function set($name, $value)
		{
			$this->template_data[$name] = $value;
		}
	
		function load($template_system = '', $view = '' , $view_data = array(), $return = FALSE)
		{               
			$this->CI =& get_instance();
			$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
			$this->set('navbar_admin', $this->CI->load->view('sistem/data/navbar_admin/index', $view_data, TRUE));
			$this->set('navbar_operator', $this->CI->load->view('sistem/data/navbar_operator/index', $view_data, TRUE));
			$this->set('sidebar_admin', $this->CI->load->view('sistem/data/sidebar_admin/index', $view_data, TRUE));
			$this->set('sidebar_operator', $this->CI->load->view('sistem/data/sidebar_operator/index', $view_data, TRUE));
			$this->set('footer', $this->CI->load->view('sistem/data/footer/index', $view_data, TRUE));		
			return $this->CI->load->view($template_system, $this->template_data, $return);
		}
		
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
