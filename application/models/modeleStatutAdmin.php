<?php
class ModeleStatutAdmin extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
		// chargement de la classe database
		$this->load->database();
    }
	function listeStatutAdmin()
	{
		//Selection des statuts dans la table statut
		/*
		// 1° méthode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select type, taux_horaire from statut";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2° Méthode sans les librairies pagination et table et avec la classe database
		//connexion à la base faite dans le fichier database.php
		$this->db->select('type, taux_horaire');
		$mysqlResult = $this->db->get('statut');
		// Equivalent à : SELECT type, taux_horaire FROM statut
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3° Méthode avec  les librairies pagination et table et avec la classe database
		// connexion à la base faite dans le fichier database.php

		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionStatutAdmin/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('statut')->num_rows();
		// Initialise le nombre d'enregistrements à afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Execution de la requête
		$this->db->select('type, taux_horaire');
		$this->db->order_by("type", "asc");
		$req = $this->db->get('statut',$config['per_page'],$this->uri->segment(3));
		return $req->result_array();
	}
	function modificationStatutAdmin($type)
	{
		// critères de sélection (attention aux espaces avant et après le 1er =
		$criteres="type = '$type'";
		$this->db->where($criteres); 
		$req = $this->db->get('statut');
		return $req->row_array();
	}
	function updateStatut($data, $criteres)
	{
		//Modification de l'enregistrement
		$this->db->update('statut', $data, $criteres);
	}
	function suppressionStatutAdmin($type)
	{
		// critères de sélection (attention aux espaces avant et après le 1er =
		$criteres="type = '$type'";
		$this->db->where($criteres); 
		$req = $this->db->get('statut');
		return $req->row_array();
	}
	function deleteStatut($typeStatut, $tauxStatut)
	{
		$this->db->delete('statut', array('type' => $typeStatut, 'taux_horaire' => $tauxStatut));
	}
	function insertionStatutAdmin($nouveauStatut)
	{
		//Insertion
		$this->db->insert('statut', $nouveauStatut);
	}
	function listeTypeStatut()
	{
		// Liste des types de statut
		$this->db->select('type');
		$query = $this->db->get('statut');
		return $query->result();
	}
}
?>