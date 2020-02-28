<?php

class GestionFormAdmin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par défaut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement du modèle
		$this->load->model('modeleFormationAdmin');
		// Chargement de la class database
		$this->load->database();
    }
		
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		$donnee['lesFormations'] = $this->modeleFormationAdmin->listeFormations();
		
		// Chargement de la vue et transfert du tableau à cette vue
		$this->load->view('v_listeFormation_Admin',$donnee);
		
	}
	public function creer($etat = null) // Création ou soumission du formulaire formation
	{
		if ($etat == null) // Affichage du formulaire de création formation
		{
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutFormation');
		}
		else
		{
			if ($_POST['dipForm']=='Oui')
			{
				$_POST['dipForm']=1; // 1 est vrai en boolean mysql
			}
			else
			{
				$_POST['dipForm']=0; // 0 est faux en boolean mysql
			}
			$nouvelleFormation = array('libelle'=>$_POST['libForm'],'niveau'=>$_POST['nivForm'],'type'=>$_POST['typForm'],'description'=>$_POST['desForm'],
			'diplomante'=>$_POST['dipForm'],'duree'=>$_POST['durForm'],'coutrevient'=>$_POST['couForm']);
			
			//INSERTION VIA MODELE ADEQUAT
			$this->modeleFormationAdmin->insertionFormation($nouvelleFormation);
			
			$data['donnee'] = "CREATION DE LA FORMATION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de l'insertion
			$this->load->view('dialogueAlert',$data);
			
			// Puis réaffichage du formulaire vierge
			$this->load->view('headerAdmin.php');
			$this->load->view('v_ajoutFormation');
		}
	}
	public function modifier($lib, $niv, $etat = null) // 
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$donnee['laFormation'] = $this->modeleFormationAdmin->modificationFormation($lib, $niv);
			$this->load->view('v_modifFormation',$donnee);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des données récupérées dans un tableau
			if ($_POST['dipForm']=='Oui')
			{
				$_POST['dipForm']=1;
			}
			else
			{
				$_POST['dipForm']=0;
			}
			$data = array('libelle' => $_POST['libForm'],'niveau' => $_POST['nivForm'],'type' => $_POST['typForm'],'description' => $_POST['desForm'],
			'diplomante' => $_POST['dipForm'],'duree' => $_POST['durForm'],'coutrevient' => $_POST['couForm']);
			//Sélection de l'enregistrement à modifier
			$criteres="libelle = '" . $_POST['libForm'] . "' And niveau = '" . $_POST['nivForm'] ."'";
			//MODIFICATION VIA MODELE ADEQUAT
			$this->modeleFormationAdmin->updateFormation($data, $criteres);
			
			$data['donnee'] = "MODIFICATION DE LA FORMATION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de la modification
			$this->load->view('dialogueAlert',$data);
			
			// Puis réaffichage de la liste des formations
			$this->load->view('headerAdmin.php');
			$data['lesFormations'] = $this->modeleFormationAdmin->listeFormations();
			$this->load->view('v_listeFormation_Admin', $data);
			
		}
	}
	public function supprimer($lib, $niv, $etat = null) // 
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$donnee['ligne'] = $this->modeleFormationAdmin->suppressionFormation($lib, $niv);
			
			$this->load->view('v_supprimFormation',$donnee);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des données récupérées dans un tableau
			// Préparation de la sélection de l'enregistrement à supprimer
			$lib = $_POST['libForm'];
			$niv = $_POST['nivForm'] ;
			//Suppression de l'enregistrement
			$this->modeleFormationAdmin->deleteFormation($lib, $niv);
			
			$data['donnee'] = "SUPPRESSION DE LA FORMATION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la réussite de la modification
			$this->load->view('dialogueAlert',$data);
			// Puis réaffichage de la liste des formations
			$this->load->view('headerAdmin.php');
			$data['lesFormations'] = $this->modeleFormationAdmin->listeFormations();
			$this->load->view('v_listeFormation_Admin', $data);
		}
	}
}
