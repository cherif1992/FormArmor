<?php

class Authentification extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
    }
	
	public function authentifier($etat)
	{
		
		if($etat == "accueil")
		{
			// Affichage des vues souhaitees
			$this->load->view('header.php');
			$this->load->view('v_authentification.php');
			$this->load->view('footer.php');
		}
		else
		{
			if($etat == "controle")
			{
				// chargement du modèle
				$this->load->model('modeleAuthentification');
				$nb = $this->modeleAuthentification->controleAuthentification();
				if ($nb == 0)
				{
					// Chargement du helper form et affichage des vues souhaitees
					$this->load->helper('form');
					$this->load->view('header.php');
					// Affichage de la vue v_authentification (avec passage d'un message ?)
					$this->load->view('v_authentification.php');
					$this->load->view('footer.php');
				}
				else
				{
					// Affichage des vues headerAdmin,  accueilAdmin et footerAdmin
					$this->load->view('headerAdmin.php');
					$this->load->view('v_accueilAdmin.php');
				}
			}
		}
	}
}
/* End of file Authentification.php */
/* Location: ./application/controllers/authentification.php */
?>