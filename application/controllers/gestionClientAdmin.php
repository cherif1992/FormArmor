<?php

class GestionClientAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par défaut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement du modèle
		$this->load->model('modeleClientAdmin');
		$this->load->model('modeleStatutAdmin');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		$data['lesClients'] = $this->modeleClientAdmin->listeClients();
		
		// Chargement de la vue et transfert du tableau à cette vue
		$this->load->view('v_listeClient_Admin',$data);
		
	}
	public function creer($etat = null) // Création ou soumission du formulaire client
	{
		if ($etat == null) // Affichage du formulaire de création client
		{
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutClient');
		}
		else // Insertion du contenu du formulaire dans la table client
		{
			// Avec la classedatabase (charger dans le controleur)
			$nouveauClient = array('matricule'=>$_POST['matClient'],'nom'=>$_POST['nomClient'],'password'=>$_POST['mdpClient'],'typestatut'=>$_POST['staClient'],'rue'=>$_POST['rueClient'],'cp'=>$_POST['cpClient'],'ville'=>$_POST['vilClient'],'nbheurcpta'=>$_POST['nbcClient'],'nbheurbur'=>$_POST['nbbClient']);
			
			//INSERTION VIA MODELE ADEQUAT
			$this->modeleClientAdmin->insertionClient($nouveauClient);
			
			$data['donnee'] = "CREATION DU CLIENT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de l'insertion
			$this->load->view('dialogueAlert',$data);
			
			// Puis réaffichage du formulaire vierge
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutClient');
		}
	}
	public function modifier($mat, $etat = null) // 
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$data['leClient'] = $this->modeleClientAdmin->modificationClient($mat);
			$data['lesTypesStatuts'] = $this->modeleStatutAdmin->listeTypeStatut();
			
			$this->load->view('v_modifClient',$data);
		}
		else
		{
			//1° avec la classedatabase (charger dans le constructeur)
			//Passage des données récupérées dans un tableau
			$data = array('matricule' => $_POST['matClient'],'nom' => $_POST['nomClient'],'password' => $_POST['mdpClient'],'typestatut' => $_POST['staClient'],
	'rue' => $_POST['rueClient'],'cp' => $_POST['cpClient'],'ville' => $_POST['vilClient'], 'nbheurcpta' => $_POST['nbcClient'], 'nbheurbur' => $_POST['nbbClient']);
			//Sélection de l'enregistrement à modifier
			$criteres="matricule = '" . $_POST['matClient'] ."'";
			//MODIFICATION VIA MODELE ADEQUAT
			$this->modeleClientAdmin->updateClient($data, $criteres);
			$data['donnee'] = "MODIFICATION DU CLIENT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de la modification
			$this->load->view('dialogueAlert',$data);
			
			// Puis réaffichage de la liste des clients
			$this->load->view('headerAdmin.php');
			$data['lesClients'] = $this->modeleClientAdmin->listeClients();
			$this->load->view('v_listeClient_Admin', $data);
		}
	}
	public function supprimer($mat, $etat = null)
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleClientAdmin->suppressionClient($mat);
			$data['lesTypesStatuts'] = $this->modeleStatutAdmin->listeTypeStatut();
			
			$this->load->view('v_supprimClient',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des données récupérées dans un tableau
			// Préparation de la sélection de l'enregistrement à supprimer
			$mat = $_POST['matClient'];
			//Suppression de l'enregistrement
			$this->modeleClientAdmin->deleteClient($mat);
			
			// Puis réaffichage de la liste des clients
			$this->load->view('headerAdmin.php');
			$data['lesClients'] = $this->modeleClientAdmin->listeClients();
			$this->load->view('v_listeClient_Admin', $data);
		}

	}
}
