<?php

class GestionPlanAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par d�faut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement des mod�les utiles ici
		$this->load->model('modeleClientAdmin');
		$this->load->model('modelePlanAdmin');
		$this->load->model('modeleFormationAdmin');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		$data['lesPlans'] = $this->modelePlanAdmin->listePlanAdmin();
		
		// Chargement de la vue et transfert du tableau � cette vue
		$this->load->view('v_listePlan_Admin',$data);
		
	}
	public function creer($etat = null) // Cr�ation ou soumission du formulaire plan
	{
		if ($etat == null) // Affichage du formulaire de cr�ation plan
		{
			$this->load->view('headerAdmin.php');
			// Chargement de la librairie permettant de valider le formulaire
			$this->load->library('form_validation');
			// Enregistrement des roles � respecter et "invocation" de la fonction de contr�le
			$this->form_validation->set_rules('matPlan', 'matricule', 'required');
			$this->form_validation->set_rules('matPlan', 'matricule', 'callback_controle_formulairePlan');
			$this->form_validation->set_rules('libFormPlan', 'libell� formation', 'required');
			$this->form_validation->set_rules('libFormPlan', 'libell� formation', 'callback_controle_formulairePlan');
			$this->form_validation->set_rules('nivFormPlan', 'niveau formation', 'required');
			$this->form_validation->set_rules('nivFormPlan', 'niveau formation', 'callback_controle_formulairePlan');
			$this->form_validation->run();
			if ($this->form_validation->run() == FALSE)
			{
				unset($_POST['ajoutPlan']); // Pour ne pas que l'insertion se fasse
			}
			$donnee['lesMatricules'] = $this->modeleClientAdmin->listeMatricule();
			$donnee['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$donnee['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			$this->load->view('v_ajoutPlan', $donnee);
		}
		else
		{
			//Traitement des donn�es du formulaire (insertion dans la base)
			//R�cup�ration des variables post (pas de controle de saisie pour l'instant)
			if ($_POST['effFormPlan']=='Oui')
			{
				$_POST['effFormPlan']=1; // 1 est vrai en boolean mysql
			}
			else
			{
				$_POST['effFormPlan']=0; // 0 est faux en boolean mysql
			}
			//1� avec la classedatabase (charger dans le controleur)
			$nouveauPlan = array('matricule'=>$_POST['matPlan'],'libelle_form'=>$_POST['libFormPlan'],'niveau'=>$_POST['nivFormPlan'],'effectue'=>$_POST['effFormPlan']);
			//INSERTION VIA MODELE ADEQUAT
			$this->modelePlanAdmin->insertionPlanAdmin($nouveauPlan);
			
			$data['donnee'] = "CREATION DU PLAN OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de l'insertion
			$this->load->view('dialogueAlert',$data);
				
			// Puis r�affichage du formulaire vierge
			$this->load->view('headerAdmin.php');
			// Chargement de la librairie permettant de valider le formulaire
			$this->load->library('form_validation');
			// Enregistrement des roles � respecter et "invocation" de la fonction de contr�le
			$this->form_validation->set_rules('matPlan', 'matricule', 'required');
			$this->form_validation->set_rules('matPlan', 'matricule', 'callback_controle_formulairePlan');
			$this->form_validation->set_rules('libFormPlan', 'libell� formation', 'required');
			$this->form_validation->set_rules('libFormPlan', 'libell� formation', 'callback_controle_formulairePlan');
			$this->form_validation->set_rules('nivFormPlan', 'niveau formation', 'required');
			$this->form_validation->set_rules('nivFormPlan', 'niveau formation', 'callback_controle_formulairePlan');
			$this->form_validation->run();
			if ($this->form_validation->run() == FALSE)
			{
				unset($_POST['ajoutPlan']); // Pour ne pas que l'insertion se fasse
			}
			$donnee['lesMatricules'] = $this->modeleClientAdmin->listeMatricule();
			$donnee['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$donnee['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			$this->load->view('v_ajoutPlan', $donnee);
		}
	}
	function controle_formulairePlan($chaine)
	{
		if ($chaine == "Votre choix")
		{
			$this->form_validation->set_message('controle_formulairePlan', 'Le champ %s ne doit pas contenir : "Votre choix"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function modifier($mat, $lib, $niv, $etat = null)
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$donnee['ligne'] = $this->modelePlanAdmin->modificationPlanAdmin($mat, $lib, $niv);
			
			$this->load->view('v_modifPlan',$donnee);
		}
		else
		{
			if ($_POST['effFormPlan']=='Oui')
			{
				$_POST['effFormPlan']=1;
			}
			else
			{
				$_POST['effFormPlan']=0;
			}
			
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des donn�es r�cup�r�es dans un tableau
			$data = array('matricule' => $_POST['matPlan'],'libelle_form' => $_POST['libFormPlan'],'niveau' => $_POST['nivFormPlan'],'effectue' => $_POST['effFormPlan']);
			//S�lection de l'enregistrement � modifier
			$criteres="matricule = '" . $_POST['matPlan'] . "' And libelle_form = '" . $_POST['libFormPlan'] . "' And niveau = '" . $_POST['nivFormPlan'] ."'";
			$this->modelePlanAdmin->updatePlan($data, $criteres);
			
			$data['donnee'] = "MODIFICATION DU PLAN OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de la modification
			$this->load->view('dialogueAlert',$data);
				
			// Puis r�affichage de la liste des plans
			$this->load->view('headerAdmin.php');
			$data['lesPlans'] = $this->modelePlanAdmin->listePlanAdmin();
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listePlan_Admin',$data);
		}
	}
	public function supprimer($mat, $lib, $niv, $etat = null)
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$donnee['ligne'] = $this->modelePlanAdmin->suppressionPlanAdmin($mat, $lib, $niv);
			
			$this->load->view('v_supprimPlan',$donnee);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des donn�es r�cup�r�es dans un tableau
			// Pr�paration de la s�lection de l'enregistrement � supprimer
			$mat = $_POST['matPlan'];
			$lib = $_POST['libFormPlan'];
			$niv = $_POST['nivFormPlan'];
			//Suppression de l'enregistrement
			$this->modelePlanAdmin->deletePlan($mat, $lib, $niv);
			
			// Puis r�affichage de la liste des plans
			$this->load->view('headerAdmin.php');
			$data['lesPlans'] = $this->modelePlanAdmin->listePlanAdmin();
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listePlan_Admin',$data);
		}
	}
}
