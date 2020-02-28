<?php

class Accueil extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 
	 */
	public function index()
	{
		// pour charger le helper url donnant entre autre le chemin par défaut de l'application : fonction base_url() 
		$this->load->helper('url');
		$this->load->helper('assets_helper.php');
		$this->load->view('header.php');
		$this->load->view('v_presentation.php');
		$this->load->view('footer.php');
	}
}

/* End of file Accueil.php */
/* Location: ./application/controllers/Accueil.php */