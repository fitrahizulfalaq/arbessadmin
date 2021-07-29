<?php 

/**
 * 
 */
class Templateadmin {
	
	var $templateadmin_data = array();

	function set($name, $value)
	{
		$this->templateadmin_data[$name] = $value;
	}

	function load($template = '', $view = '', $view_data = array (), $return = FALSE)
	{
		$this-> CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view,$view_data,TRUE));
		return $this->CI->load->view($template, $this->templateadmin_data, $return);
	}

}

?>