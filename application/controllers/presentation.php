<?php

class Presentation extends CI_Controller {

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('assets_helper.php');
		$this->load->view('header.php');
		$this->load->view('v_presentation.php');
		$this->load->view('footer.php');
	}
}

/* End of file Presentation.php */
/* Location: ./application/controllers/presentation.php */