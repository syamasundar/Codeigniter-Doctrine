<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Site
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @subpackage	Controllers
 * @author		Nageswara Rao S
 * @created		23-10-14
 */
class Site extends MX_Controller {
	/**
	* 
	* Constructor
	* 
	* Initialize the user preferences
	*/
	public function __construct(){
		parent::__construct();
                $this->_init();
	}
        private function _init()
	{ echo 'kdjksjfkdskf';
		$this->output->set_template('blank');
                $this->output->set_title('kfjsdkfjaskdfjdsk');

		$this->load->js('assets/themes/default/js/jquery-1.9.1.min.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-transition.js');
		$this->load->js('assets/themes/default/hero_files/bootstrap-collapse.js');
	}
	/**
	*
	*  Index page for this controller
	* 
	*/
	public function index() {
		
		/*$header_data = array(
            'title1' => 'Hello World'
        );
        $view_data = array(
            'content' => 'This is the content',
            'posts' => array('post1', 'post2', 'post3')
        );
        $this->template->load_header($data = array(), $view_data = array());
        // Load the template
        $this->template->load('templates/default', 'content', $data);*/
            $this->load->view('welcome');
		
	} 

}


/* End of file Site.php */
/* Location: ./applications/espandana-dev/modules/site/Site.php */