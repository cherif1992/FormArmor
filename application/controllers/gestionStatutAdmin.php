<?php

class GestionStatutAdmin extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par d�faut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement du mod�le
		$this->load->model('modeleStatutAdmin');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		// Chargement du mod�le
		$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
		// Chargement de la vue et transfert du tableau � cette vue
		$this->load->view('v_listeStatut_Admin',$data);
		
	}
	public function creer($etat = null)
	{
		if ($etat == null) // Affichage du formulaire de cr�ation formation
		{
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutStatut');
		}
		else
		{
			//Traitement des donn�es du formulaire (insertion dans la base)
			//R�cup�ration des variables post (pas de controle de saisie pour l'instant)
			if(isset($_POST['ajoutStatut'])) // si un clic a �t� fait sur le bouton submit (enregistrer) ==> soumission du formulaire
			{
				// Avec la classedatabase (charger dans le controleur)
				$nouveauStatut = array('type'=>$_POST['typeStatut'],'taux_horaire'=>$_POST['tauxStatut']);
				//INSERTION VIA MODELE ADEQUAT
				$this->modeleStatutAdmin->insertionStatutAdmin($nouveauStatut);
				
				$data['donnee'] = "CREATION DU STATUT OK !";
				// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de l'insertion
				$this->load->view('dialogueAlert',$data);
				
				// Puis r�affichage du formulaire vierge
				$this->load->view('headerAdmin.php');
				$this->load->view('v_ajoutStatut');
			}
		}
	}
	public function modifier($type, $etat = null) // 
	{
		if ($etat == null)
		{
			// Pour remettre le caract�re % � la place de son code Ascii (%25)
			$type = str_replace("%25","%",$type);
			// Pour remettre l'espace � la place de son code Ascii (%20)
			$type = str_replace("%20"," ",$type);
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleStatutAdmin->modificationStatutAdmin($type);
			$this->load->view('v_modifStatut',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des donn�es r�cup�r�es dans un tableau
			$data = array('type' => $_POST['typeStatut'],'taux_horaire' => $_POST['tauxHoraire']);
			//S�lection de l'enregistrement � modifier
			$criteres="type = '" . $_POST['typeStatut'] . "'";
			$this->modeleStatutAdmin->updateStatut($data, $criteres);
			$data['donnee'] = "MODIFICATION DU STATUT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de la modification
			$this->load->view('dialogueAlert',$data);
			
			// Puis r�affichage de la liste des statuts
			$this->load->view('headerAdmin.php');
			// Chargement du mod�le
			$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listeStatut_Admin',$data);
		}
	}
	public function supprimer($type, $etat = null) // 
	{
		if ($etat == null)
		{
			// Pour remettre le caract�re % � la place de son code Ascii (%25)
			$type = str_replace("%25","%",$type);
			// Pour remettre l'espace � la place de son code Ascii (%20)
			$type = str_replace("%20"," ",$type);
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleStatutAdmin->suppressionStatutAdmin($type);
			$this->load->view('v_supprimStatut',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le controleur)
			// Passage des donn�es r�cup�r�es dans un tableau
			// Pr�paration de la s�lection de l'enregistrement � supprimer
			$typeStatut = $_POST['typeStatut'];
			$tauxHoraire = $_POST['tauxHoraire'] ;
			//Suppression de l'enregistrement
			$this->modeleStatutAdmin->deleteStatut($typeStatut, $tauxHoraire);
			
			$data['donnee'] = "SUPPRESSION DU STATUT OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de la suppression
			$this->load->view('dialogueAlert',$data);
			// Puis r�affichage de la liste des statuts
			$this->load->view('headerAdmin.php');
			// Chargement du mod�le
			$data['lesStatuts'] = $this->modeleStatutAdmin->listeStatutAdmin();
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listeStatut_Admin',$data);
		}
	}
}
