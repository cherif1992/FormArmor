<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Modification de statut</div>";
	// Pour remplacer le caractère % (qui pose problème dans l'URL) par son code Ascii
	$remplace = str_replace("%","%25",$ligne['type']);
	echo "<form action='" . site_url() . "/gestionStatutAdmin/modifier/" . $remplace . "/modification' method='post' accept-charset='ISO-8859-1' id='modifStatut'>";
	echo "<label>Type : </label>";
	echo"<input type='text' name='typeStatut' readOnly value='" . $ligne['type'] . "' />";
	echo "<label>Taux Horaire : </label>";
	echo"<input type='text' name='tauxHoraire' value='" . $ligne['taux_horaire'] . "' />";
	echo "<input type='submit' name='modifStatut' value='Enregistrer' />";
	echo "</form>";
	
?>
</div>
