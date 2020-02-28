<?php
class ModeleClientAdmin extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
		// chargement de la classe database
		$this->load->database();
    }
	function listeMatricule()
	{
		$this->db->select('matricule');
		$this->db->order_by("matricule", "asc"); 
		$query = $this->db->get('client');
		return $query->result_array();
	}
	function listeClients()
	{
		//Selection des formations dans la table client
		/*
		// 1° méthode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select matricule, nom, rue, ville from client";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2° Méthode sans les librairies pagination et table et avec la classe database
		//connexion à la base faite dans le fichier database.php
		
		$this->db->select('matricule, nom, rue, ville');
		$mysqlResult = $this->db->get('client');
		// Equivalent à : SELECT  matricule, nom, rue, ville from client
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3° Méthode avec  les librairies pagination et table et avec la classe database
		// connexion à la base faite dans le fichier database.php
		
		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionClientAdmin/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('client')->num_rows();
		// Initialise le nombre d'enregistrements à afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Execution de la requête
		$this->db->select('matricule, nom, rue, ville');
		$req = $this->db->get('client',$config['per_page'],$this->uri->segment(3));
		return $req->result_array();
	}
	function modificationClient($mat)
	{
		// critères de sélection (attention aux espaces avant et après le 1er =
		$criteres="matricule = '$mat'";
		$this->db->where($criteres); 
		$req = $this->db->get('client');
		return $req->row_array();
	}
	function suppressionClient($mat)
	{
		// critères de sélection (attention aux espaces avant et après le  =
		$criteres="matricule = '$mat'";
		$this->db->where($criteres); 
		$req = $this->db->get('client');
		return $req->row_array();
	}
	function updateClient($data, $criteres)
	{
		$this->db->update('client', $data, $criteres);
	}
	function insertionClient($nouveauClient)
	{
		$this->db->insert('client', $nouveauClient);
	}
	function deleteClient($mat)
	{
		$this->db->delete('client', array('matricule' => $mat));
	}
}
?>