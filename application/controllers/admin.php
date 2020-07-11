<!-- proses 2 - rubah class dan file dr welcome -->

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller. 
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function beranda() //proses 3 - dr index (autoload.php)
	{
		if($this->session->userdata('status') != "loginAdmin"){
			$newdata = array(
				'email'  =>'',
				'id_user' => '',
				'status' => "logout",
			   );
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy();
			
            $this->load->view('v_login');
        } else {
            // proses 7 - load seluruh template
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('v_bengkel');  // dr welcome_message
			$this->load->view('templates/footer');
        }
	}
}
 