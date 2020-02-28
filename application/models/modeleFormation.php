<?php
class ModeleFormation extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
    }
	function listeFormations()
	{
		//Selection des formations dans la table formation
		/*
		// 1� m�thode classique
		$con=mysql_connect('localhost','root','');
		$res=mysql_select_db('formarmor');
		$req="Select libelle, niveau, type, description from formation";
		$result=mysql_query($req);
		$data['enregt'] = mysql_fetch_array($result);
		*/
		
		/*
		// 2� M�thode sans les librairies pagination et table et avec la classe database
		//connexion � la base faite dans le fichier database.php
		//chargement de la classe database
		$this->load->database();
		$this->db->select('libelle, niveau, type, description');
		$mysqlResult = $this->db->get('formation');
		// Equivalent � : SELECT libelle, niveau, type, description FROM formation
		//Convertit le jeu d'enregistrements en tableau
		$data['enregt'] = $mysqlResult->result_array();
		*/
		
		// 3� M�thode avec  les librairies pagination et table et avec la classe database
		// connexion � la base faite dans le fichier database.php
		// chargement de la classe database
		$this->load->database();
		// Chargement de la librairie pagination
		$this->load->library('pagination');
		// Chargement de la librairie table
		$this->load->library('table');
		$config['base_url'] = 'http://localhost/CodeIgniter_FormArmor/index.php/gestionForm/lister';
		// Initialise le nombre total d'enregistrements
		$config['total_rows'] = $this->db->get('formation')->num_rows();
		// Initialise le nombre d'enregistrements � afficher par page
		$config['per_page'] = '4';
		$config['num_links'] = '3';
		$config['full_tag_open'] = '<p>';
		$config['full_tag_close'] = '</p>';
		// Initialisation de notre pagination
		$this->pagination->initialize($config);
		// Execution de la requ�te
		$this->db->select('libelle, niveau, type, description');
		$requete = $this->db->get('formation',$config['per_page'],$this->uri->segment(3));
		return $requete->result_array();
	}
}
?>