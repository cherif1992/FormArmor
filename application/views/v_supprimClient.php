<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Etes vous certain de vouloir supprimer le client suivant</div>";
	echo "<form action='" . site_url() . "/gestionClientAdmin/supprimer/" . $ligne['matricule'] . "/suppression' method='post' accept-charset='ISO-8859-1' id='supprimClient'>";
	
	echo "<label>Matricule : </label>";
	echo"<input type='text' name='matClient' readOnly value='" . $ligne['matricule'] . "' />";
	echo "<label>Nom : </label>";
	echo"<input type='text' name='nomClient' readOnly value='" . $ligne['nom'] . "' />";
	echo "<label>Mot de passe : </label>";
	echo"<input type='text' name='mdpClient'  readOnly value='" . $ligne['password'] . "' />";
	
	echo "<label>Statut : </label>";
	echo "<select name='staClient'  readOnly>";
	// Liste des types de statut
	foreach ($lesTypesStatuts as $lig)
	{
	    if ($lig->type == $ligne['typestatut']) // ==> C'est le statut de ce client
		{
			echo "<option selected>" . $lig->type . "</option>";
		}
		else
		{
			echo "<option>" . $lig->type . "</option>";
		}
	}
	echo "</select>";
	
	echo "<label>Rue : </label>";
	echo"<input type='text' name='rueClient' readOnly value='" . $ligne['rue'] . "' />";
	echo "<label>CP : </label>";
	echo"<input type='text' name='cpClient' readOnly value='" . $ligne['cp'] . "' />";
	echo "<label>Ville : </label>";
	echo "<input type='text' name='vilClient' readOnly value='" . $ligne['ville'] . "' />";
	echo "<label>Nombre d'heures comptabilite : </label>";
	echo "<input type='text' name='nbcClient' readOnly value='" . $ligne['nbheurcpta'] . "' />";
	echo "<label>Nombre d'heures bureautique : </label>";
	echo "<input type='text' name='nbbClient' readOnly value='" . $ligne['nbheurbur'] . "' />";
	
	echo "<input type='submit' name='supprimClient' value='Suppression definitive' />";
	echo "</form>";
?>
</div>
