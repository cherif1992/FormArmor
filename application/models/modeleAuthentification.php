<?php
class ModeleAuthentification extends CI_Model
{
    function __construct()
    {
        // Appel au constructeur parent
        parent::__construct();
    }
	function controleAuthentification()
	{
		// Chargement de la classe database
		$this->load->database();
		// R�cup�ration des donn�es saisies
		$mat = $_POST['matForm'];
		$mdp = $_POST['mdpForm'];
		// Crit�res de s�lection de la requ�te
		$criteres = "matricule = '" . $mat . "' AND password = '" . $mdp ."'";
		$this->db->where($criteres);
		// Emission de la requ�te
		$query = $this->db->get('client');
		// Nombre d'enregt(s) retourn�(s)
		$nb = $query->num_rows();
		return $nb;
	}
}
?>