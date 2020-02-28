<?php

class Formation extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('assets_helper.php');
		$this->load->view('header.php');
		$this->load->view('v_formation.php');
		$this->load->view('footer.php');
	}
	
}

/* End of file Formation.php */
/* Location: ./application/controllers/formation.php */