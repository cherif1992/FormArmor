<?php

class GestionSessionAdmin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// pour charger le helper url donnant entre autre le chemin par d�faut de l'application : fonction base_url()
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('assets_helper.php');
		// Chargement des mod�les utiles ici
		$this->load->model('modeleSessionAdmin');
		$this->load->model('modeleFormationAdmin');
		// Chargement de la class database
		$this->load->database();
    }
	
	public function lister() // 
	{
		$this->load->view('headerAdmin.php');
		$data['lesSessions'] = $this->modeleSessionAdmin->listeSessionAdmin();
				
		// Chargement de la vue et transfert du tableau � cette vue
		$this->load->view('v_listeSession_Admin',$data);
		
	}
	public function creer($etat = null)
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			// Chargement de la librairie permettant de valider le formulaire
			$this->load->library('form_validation');
			// Enregistrement des roles � respecter et "invocation" de la fonction de contr�le
			$this->form_validation->set_rules('libFormSession', 'libell� formation', 'required');
			$this->form_validation->set_rules('libFormSession', 'libell� formation', 'callback_controle_formulaireSession');
			$this->form_validation->set_rules('nivFormSession', 'niveau formation', 'required');
			$this->form_validation->set_rules('nivFormSession', 'niveau formation', 'callback_controle_formulaireSession');
			$this->form_validation->run();
			if ($this->form_validation->run() == FALSE)
			{
				unset($_POST['ajoutSession']); // Pour ne pas que l'insertion se fasse
			}
			
			$donnee['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$donnee['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			$this->load->view('v_ajoutSession', $donnee);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			$nouvelleSession = array('libelleform'=>$_POST['libFormSession'],'niveauform'=>$_POST['nivFormSession'],'datedebut'=>$_POST['dateDebSession'],'nb_places'=>$_POST['nbPlaceSession'],'nb_inscrits'=>$_POST['nbInscritSession']);
			//INSERTION VIA MODELE ADEQUAT
			$this->modeleSessionAdmin->insertionSessionAdmin($nouvelleSession);
			
			$data['donnee'] = "CREATION DE LA SESSION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de l'insertion
			$this->load->view('dialogueAlert',$data);
			
			// Puis r�affichage du formulaire vierge
			$this->load->view('headerAdmin.php');
			$donnee['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$donnee['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			$this->load->view('v_ajoutSession', $donnee);
		}
	}
	function controle_formulaireSession($chaine)
	{
		if ($chaine == "Votre choix")
		{
			$this->form_validation->set_message('controle_formulaireSession', 'Le champ %s ne doit pas contenir : "Votre choix"');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function modifier($numSession, $etat = null)
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			$data['ligne'] = $this->modeleSessionAdmin->modificationSessionAdmin($numSession);
			$data['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$data['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			$this->load->view('v_modifSession',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des donn�es r�cup�r�es dans un tableau
			$data = array('libelleform' => $_POST['libFormSession'],'niveauform' => $_POST['nivFormSession'],'datedebut' => $_POST['dateDebSession'],'nb_places' => $_POST['nbPlaceSession'],'nb_inscrits' => $_POST['nbInscritSession']);
			//S�lection de l'enregistrement � modifier
			$criteres="numero =" .  $_POST['numSession'] ;
			$this->modeleSessionAdmin->updateSession($data, $criteres);
			
			$data['donnee'] = "MODIFICATION DE LA SESSION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de la modification
			$this->load->view('dialogueAlert',$data);
			
			// Puis r�affichage de la liste des sessions
			$this->load->view('headerAdmin.php');
			$data['lesSessions'] = $this->modeleSessionAdmin->listeSessionAdmin();
			//var_dump($data);
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listeSession_Admin',$data);
		}
	}
	public function supprimer($numSession, $etat = null) // 
	{
		if ($etat == null)
		{
			$this->load->view('headerAdmin.php');
			// Chargement du mod�le
			$this->load->model('modeleSessionAdmin');
			$data['ligne'] = $this->modeleSessionAdmin->suppressionSessionAdmin($numSession);
			$data['lesFormations'] = $this->modeleFormationAdmin->listeLibelle();
			$data['lesNiveaux'] = $this->modeleFormationAdmin->listeNiveau();
			
			$this->load->view('v_supprimSession',$data);
		}
		else
		{
			// Avec la classedatabase (charger dans le constructeur)
			// Passage des donn�es r�cup�r�es dans un tableau
			// Pr�paration de la s�lection de l'enregistrement � supprimer
			$numSession = $_POST['numSession'];
			//Suppression de l'enregistrement
			$this->modeleSessionAdmin->deleteSession($numSession);
			
			$data['donnee'] = "SUPPRESSION DE LA SESSION OK !";
			// Affichage d'une "vue javascript" pour alerter l'utilisateur de la r�ussite de la suppression
			$this->load->view('dialogueAlert',$data);
			// Puis r�affichage de la liste des sessions
			$this->load->view('headerAdmin.php');
			$data['lesSessions'] = $this->modeleSessionAdmin->listeSessionAdmin();
			//var_dump($data);
			// Chargement de la vue et transfert du tableau � cette vue
			$this->load->view('v_listeSession_Admin',$data);
		}
	}
}
