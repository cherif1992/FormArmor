<?php
class ModeleSessionAdmin extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
		// chargement de la classe database
		$this->load->database();
    }
	function listeSessionAdmin()
	{
		//Selection des sessions dans la table session
		/*
		// 1� m�thode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select numero, libelle_form, niveauform, datedebut, nb_places, nb_inscrits from session_form";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2� M�thode sans les librairies pagination et table et avec la classe database
		//connexion � la base faite dans le fichier database.php
		$this->db->select('numero, libelle_form, niveauform, datedebut, nb_places, nb_inscrits');
		$mysqlResult = $this->db->get('session_form');
		// Equivalent � : SELECT numero, libelle_form, niveauform, datedebut, nb_places, nb_inscrits FROM session_form
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3� M�thode avec  les librairies pagination et table et avec la classe database
		// connexion � la base faite dans le fichier database.php
		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionSessionAdmin/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('session_form')->num_rows();
		// Initialise le nombre d'enregistrements � afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Tri de la requ�te
		$this->db->order_by("datedebut", "asc");
		// Ex�cution de la requ�te
		$this->db->select('numero, libelleform, niveauform, datedebut, nb_places, nb_inscrits');
		$req = $this->db->get('session_form',$config['per_page'],$this->uri->segment(3));
		$req = $this->db->get('session_form',$config['per_page'],$this->uri->segment(3));
		return $req->result_array();
	}
	function modificationSessionAdmin($numSession)
	{
		// crit�res de s�lection (attention aux espaces avant et apr�s le 1er =
		$criteres="numero = $numSession";
		$this->db->where($criteres); 
		$req = $this->db->get('session_form');
		return $req->row_array();
	}
	function updateSession($data, $criteres)
	{
		//Modification de l'enregistrement
		$this->db->update('session_form', $data, $criteres);
	}
	function suppressionSessionAdmin($numSession)
	{
		// crit�res de s�lection (attention aux espaces avant et apr�s le 1er =
		$criteres="numero = $numSession";
		$this->db->where($criteres);
		
		$req = $this->db->get('session_form');
		return $req->row_array();
	}
	function deleteSession($numSession)
	{
		$this->db->delete('session_form', array('numero' => $numSession));
	}
	function insertionSessionAdmin($nouvelleSession)
	{
		//Insertion
		$this->db->insert('session_form', $nouvelleSession);
	}
}
?>