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
		// Récupération des données saisies
		$mat = $_POST['matForm'];
		$mdp = $_POST['mdpForm'];
		// Critères de sélection de la requête
		$criteres = "matricule = '" . $mat . "' AND password = '" . $mdp ."'";
		$this->db->where($criteres);
		// Emission de la requête
		$query = $this->db->get('client');
		// Nombre d'enregt(s) retourné(s)
		$nb = $query->num_rows();
		return $nb;
	}
}
?>