<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Etes vous certain de vouloir supprimer le statut suivant</div>";
	// Pour remplacer le caractère % (qui pose problème dans l'URL) par son code Ascii
	$remplace = str_replace("%","%25",$ligne['type']);
	echo "<form action='" . site_url() . "/gestionStatutAdmin/supprimer/" . $remplace . "/suppression' method='post' accept-charset='ISO-8859-1' id='supprimStatut'>";
	echo "<label>Type : </label>";
	echo"<input type='text' name='typeStatut' readOnly value='" . $ligne['type'] . "' />";
	echo "<label>Taux Horaire : </label>";
	echo"<input type='text' name='tauxHoraire' readOnly value='" . $ligne['taux_horaire'] . "' />";
	echo "<input type='submit' name='supprimStatut' value='Suppression definitive' />";
	echo "</form>";
?>
</div>
