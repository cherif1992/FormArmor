<?php

class GestionStatutAdmin extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par défaut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement du modèle
		$this->load->model('modeleStatutAdmin');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		// Chargement du modèle
		$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
		// Chargement de la vue et transfert du tableau à cette vue
		$this->load->view('v_listeStatut_Admin',$data);
		
	}
	public function creer($etat = null)
	{
		if ($etat == null) // Affichage du formulaire de création formation
		{
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutStatut');
		}
		else
		{
			//Traitement des données du formulaire (insertion dans la base)
			//Récupération des variables post (pas de controle de saisie pour l'instant)
			if(isset($_POST['ajoutStatut'])) // si un clic a été fait sur le bouton submit (enregistrer) ==> soumission du formulaire
			{
				// Avec la classedatabase (charger dans le controleur)
				$nouveauStatut = array('type'=>$_POST['typeStatut'],'taux_horaire'=>$_POST['tauxStatut']);
				//INSERTION VIA MODELE ADEQUAT
				$this->modeleStatutAdmin->insertionStatutAdmin($nouveauStatut);
				
				$data['donnee'] = "CREATION DU STATUT OK !";
				// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de l'insertion
				$this->load->view('dialogueAlert',$data);
				
				// Puis réaffichage du formulaire vierge
				$this->load->view('headerAdmin.php');
				$this->load->view('v_ajoutStatut');
			}
		}
	}
	public function modifier($type, $etat = null) // 
	{
		if ($etat == null)
		{
			// Pour remettre le caractère % à la place de son code Ascii (%25)
			$type = str_replace("%25","%",$type);
			// Pour remettre l'espace à la place de son code Ascii (%20)
			$type = str_replace("%20"," ",$type);
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleStatutAdmin->modificationStatutAdmin($type);
			$this->load->view('v_modifStatut',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des données récupérées dans un tableau
			$data = array('type' => $_POST['typeStatut'],'taux_horaire' => $_POST['tauxHoraire']);
			//Sélection de l'enregistrement à modifier
			$criteres="type = '" . $_POST['typeStatut'] . "'";
			$this->modeleStatutAdmin->updateStatut($data, $criteres);
			$data['donnee'] = "MODIFICATION DU STATUT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de la modification
			$this->load->view('dialogueAlert',$data);
			
			// Puis réaffichage de la liste des statuts
			$this->load->view('headerAdmin.php');
			// Chargement du modèle
			$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
			// Chargement de la vue et transfert du tableau à cette vue
			$this->load->view('v_listeStatut_Admin',$data);
		}
	}
	public function supprimer($type, $etat = null) // 
	{
		if ($etat == null)
		{
			// Pour remettre le caractère % à la place de son code Ascii (%25)
			$type = str_replace("%25","%",$type);
			// Pour remettre l'espace à la place de son code Ascii (%20)
			$type = str_replace("%20"," ",$type);
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleStatutAdmin->suppressionStatutAdmin($type);
			$this->load->view('v_supprimStatut',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le controleur)
			// Passage des données récupérées dans un tableau
			// Préparation de la sélection de l'enregistrement à supprimer
			$typeStatut = $_POST['typeStatut'];
			$tauxHoraire = $_POST['tauxHoraire'] ;
			//Suppression de l'enregistrement
			$this->modeleStatutAdmin->deleteStatut($typeStatut, $tauxHoraire);
			
			$data['donnee'] = "SUPPRESSION DU STATUT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de la suppression
			$this->load->view('dialogueAlert',$data);
			// Puis réaffichage de la liste des statuts
			$this->load->view('headerAdmin.php');
			// Chargement du modèle
			$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
			// Chargement de la vue et transfert du tableau à cette vue
			$this->load->view('v_listeStatut_Admin',$data);
		}
	}
}
