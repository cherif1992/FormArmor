<div id='contenu'>
<?php
		echo "<br/>";
		echo "<div id='titre'>Insertion d'un client</div>";
		// Construction du formulaire
		echo "<form action='" . site_url() . "/gestionClientAdmin/creer/insertion' method='post' accept-charset='ISO-8859-1' id='ajoutClient'>";
		echo "<label>Matricule : </label>";
		echo"<input type='text' name='matClient' value='' />";
		echo "<label>Nom : </label>";
		echo"<input type='text' name='nomClient' value='' />";
		echo "<label>Mot de passe : </label>";
		echo"<input type='text' name='mdpClient' value='' />";
		
		echo "<label>Statut : </label>";
		echo "<select name='staClient'>";
		// Liste des types de statut
		$this->db->select('type');
		$query = $this->db->get('statut');
		foreach ($query->result() as $lig)
		{
			echo "<option>" . $lig->type . "</option>";
		}
		echo "</select>";
				
		echo "<label>Rue : </label>";
		echo"<input type='text' name='rueClient' value='' />";
		echo "<label>CP : </label>";
		echo"<input type='text' name='cpClient' value='' />";
		echo "<label>Ville : </label>";
		echo "<input type='text' name='vilClient' value='' />";
		echo "<label>Nombre d'heures comptabilit&eacute; : </label>";
		echo "<input type='text' name='nbcClient' value='' />";
		echo "<label>Nombre d'heures de bureautique : </label>";
		echo "<input type='text' name='nbbClient' value='' />";
		echo "<input type='submit' name='ajoutClient' value='Enregistrer' />";
?>
</div>