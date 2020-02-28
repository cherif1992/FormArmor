<?php
class ModeleFormationAdmin extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
		// chargement de la classe database
		$this->load->database();
    }
	function listeLibelle()
	{
		$this->db->select('libelle');
		$this->db->order_by("libelle", "asc"); 
		$this->db->distinct();
		$query = $this->db->get('formation');
		return $query->result_array();
	}
	function listeNiveau()
	{
		$this->db->select('niveau');
		$this->db->order_by("niveau", "asc"); 
		$this->db->distinct();
		$query = $this->db->get('formation');
		return $query->result_array();
	}
	function listeFormations()
	{
		//Selection des formations dans la table formation
		/*
		// 1° méthode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select libelle, niveau, type, description from formation";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2° Méthode sans les librairies pagination et table et avec la classe database
		//connexion à la base faite dans le fichier database.php
		$this->db->select('libelle, niveau, type, description');
		$mysqlResult = $this->db->get('formation');
		// Equivalent à : SELECT libelle, niveau, type, description FROM formation
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3° Méthode avec  les librairies pagination et table et avec la classe database
		// connexion à la base faite dans le fichier database.php
		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionFormAdmin/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('formation')->num_rows();
		// Initialise le nombre d'enregistrements à afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Execution de la requête
		$this->db->select('libelle, niveau, type, description');
		$req = $this->db->get('formation',$config['per_page'],$this->uri->segment(3));
		return $req->result_array();
	}
	function modificationFormation($lib, $niv)
	{
		// critères de sélection (attention aux espaces avant et après le 1er =)
		$criteres="libelle = '$lib' And niveau = '$niv'";
		$this->db->where($criteres);
		$req = $this->db->get('formation');
		return $req->row_array();
	}
	function suppressionFormation($lib, $niv)
	{
		// critères de sélection (attention aux espaces avant et après le 1er =)
		$criteres="libelle = '$lib' And niveau = '$niv'";
		$this->db->where($criteres); 
		$req = $this->db->get('formation');
		return $req->row_array();
	}
	function deleteFormation($lib, $niv)
	{
		$this->db->delete('formation', array('libelle' => $lib, 'niveau' => $niv));
	}
	function insertionFormation($nouvelleFormation)
	{
		//Insertion
		$this->db->insert('formation', $nouvelleFormation);
	}
	function updateFormation($data, $criteres)
	{
		$this->db->update('formation', $data, $criteres);
	}
}
?>