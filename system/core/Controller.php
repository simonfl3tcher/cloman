<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
require("application/libraries/classes/databoundObjects/pdofactory.php");
require("application/libraries/classes/databoundObjects/databoundobject.php");
require("application/libraries/helpers/functions.php");
class CI_Controller {

	private static $instance;

	/**
	 * Constructor
	*/
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->initialize();
		
		log_message('debug', "Controller Class Initialized");
		// use this to automatically load the helpers into all controllers.
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('helpers/request_model', 'request');
		$this->load->model('helper_model');
		// THis is where is set the session vairables for the jquery chat this needs to be sorted out properly.
		session_start();
		$_SESSION['username'] = 'Simon Fletcher';
		// if(!$this->session->userdata('Logged_In') && uri_string() != 'login'){
		// 	redirect('/login');
		// }
	}

	public static function &get_instance()
	{
		return self::$instance;
	}

	public function render_view($path, $data=null, $noInclude=false){
		if($noInclude == true){
			$this->load->view($path, $data);
		} else {
			$this->load->view('templates/header', $data);
			$this->load->view($path, $data);
			$this->load->view('templates/footer');
		}
	}
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */