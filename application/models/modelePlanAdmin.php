<?php
class ModelePlanAdmin extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
		// chargement de la classe database
		$this->load->database();
    }
	function listePlanAdmin()
	{
		//Selection des formations dans la table client
		/*
		// 1� m�thode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select matricule, libelle_form, niveau, effectue from plan_formation";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2� M�thode sans les librairies pagination et table et avec la classe database
		//connexion � la base faite dans le fichier database.php
		//chargement de la classe database
		$this->load->database();
		$this->db->select('matricule, libelle_form, niveau, effectue');
		$mysqlResult = $this->db->get('plan_formation');
		// Equivalent � : SELECT  matricule, libelle_form, niveau, effectue from plan_formation
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3� M�thode avec  les librairies pagination et table et avec la classe database
		// connexion � la base faite dans le fichier database.php
		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionPlanAdmin/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('plan_formation')->num_rows();
		// Initialise le nombre d'enregistrements � afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Execution de la requ�te
		$this->db->select('matricule, libelle_form, niveau, effectue');
		$req = $this->db->get('plan_formation',$config['per_page'],$this->uri->segment(3));
		return $req->result_array();
	}
	function modificationPlanAdmin($mat, $lib, $niv)
	{
		// crit�res de s�lection (attention aux espaces avant et apr�s le 1er =
		$criteres="matricule = '$mat' And libelle_form = '$lib' And niveau = '$niv'";
		$this->db->where($criteres); 
		$req = $this->db->get('plan_formation');
		return $req->row_array();
	}
	function suppressionPlanAdmin($mat, $lib, $niv)
	{
		// crit�res de s�lection (attention aux espaces avant et apr�s le  =
		$criteres="matricule = '$mat' And libelle_form = '$lib' And niveau = '$niv'";
		$this->db->where($criteres);
		$req = $this->db->get('plan_formation');
		return $req->row_array();
	}
	function deletePlan($mat, $lib, $niv)
	{
		$this->db->delete('plan_formation', array('matricule' => $mat, 'libelle_form' => $lib, 'niveau' => $niv));
	}
	function insertionPlanAdmin($nouveauPlan)
	{
		//Insertion
		$this->db->insert('plan_formation', $nouveauPlan);
	}
	function updatePlan($data, $criteres)
	{
		//Modification de l'enregistrement
		$this->db->update('plan_formation', $data, $criteres);
	}
}
?>