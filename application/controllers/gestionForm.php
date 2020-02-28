<?php

class GestionForm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par défaut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement des modèles utiles ici
		$this->load->model('modeleFormation');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('header.php');
		$data['lesFormations'] = $this->modeleFormation->listeFormations();
		
		// Chargement de la vue et transfert du tableau à cette vue
		$this->load->view('v_listeFormation',$data);
		$this->load->view('footer.php');
	}
}
