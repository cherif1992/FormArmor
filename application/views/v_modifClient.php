<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Modification de client</div>";
	echo "<form action='" . site_url() . "/gestionClientAdmin/modifier/" . $leClient['matricule'] . "/modification' method='post' accept-charset='ISO-8859-1' id='modifClient'>";
	echo "<label>Matricule : </label>";
	echo"<input type='text' name='matClient' readOnly value='" . $leClient['matricule'] . "' />";
	echo "<label>Nom : </label>";
	echo"<input type='text' name='nomClient' value='" . $leClient['nom'] . "' />";
	echo "<label>Mot de passe : </label>";
	echo"<input type='text' name='mdpClient' value='" . $leClient['password'] . "' />";
	
	echo "<label>Statut : </label>";
	echo "<select name='staClient'>";
	foreach ($lesTypesStatuts as $lig)
	{
	    //echo $row->type;
	    if ($lig->type == $leClient['typestatut']) // ==> C'est le statut de ce client
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
	echo"<input type='text' name='rueClient' value='" . $leClient['rue'] . "' />";
	echo "<label>CP : </label>";
	echo"<input type='text' name='cpClient' value='" . $leClient['cp'] . "' />";
	echo "<label>Ville : </label>";
	echo "<input type='text' name='vilClient' value='" . $leClient['ville'] . "' />";
	echo "<label>Nombre d'heures comptabilit&eacute; : </label>";
	echo "<input type='text' name='nbcClient' value='" . $leClient['nbheurcpta'] . "' />";
	echo "<label>Nombre d'heures bureautique : </label>";
	echo "<input type='text' name='nbbClient' value='" . $leClient['nbheurbur'] . "' />";
	echo "<input type='submit' name='modifClient' value='Enregistrer' />";
	echo "</form>";
?>
</div>
