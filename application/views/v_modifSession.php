<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Modification d'une Session</div>";
	echo "<form action='" . site_url() . "/gestionSessionAdmin/modifier/" . $ligne['numero'] . "/modification' method='post' accept-charset='ISO-8859-1' id='modifSession'>";
	echo "<label>Num&eacute;ro : </label>";
	echo"<input type='text' name='numSession' readOnly value='" . $ligne['numero'] . "' />";
	echo "<label>Libell&eacute; formation : </label>";
	echo "<select name='libFormSession'>";
	// Liste des libellés de formation
	echo "<option>Votre choix</option>";
	foreach ($lesFormations as $lig)
	{
	    if ($lig['libelle'] == $ligne['libelleform']) // ==> C'est le libelle de formation de cette session
		{
			echo "<option selected>" . $lig['libelle'] . "</option>";
		}
		else
		{
			echo "<option>" . $lig['libelle'] . "</option>";
		}
	}
	echo "</select>";
	echo "<label>Niveau de la formation : </label>";
	echo "<select name='nivFormSession'>";
	// Liste des niveaux de formation
	echo "<option>Votre choix</option>";
	foreach ($lesNiveaux as $lig)
	{
	    if ($lig['niveau'] == $ligne['niveauform']) // ==> C'est le niveau de formation de cette session
		{
			echo "<option selected>" . $lig['niveau'] . "</option>";
		}
		else
		{
			echo "<option>" . $lig['niveau'] . "</option>";
		}
	}
	echo "</select>";
	echo "<label>date de d&eacute;but session : </label>";
	echo"<input type='text' name='dateDebSession' value='" . $ligne['datedebut'] . "' />";
	echo "<label>Nombre de places propos&eacute;es : </label>";
	echo"<input type='text' name='nbPlaceSession' value='" . $ligne['nb_places'] . "' />";
	echo "<label>Nombre d'inscrits : </label>";
	echo"<input type='text' name='nbInscritSession' value='" . $ligne['nb_inscrits'] . "' />";
	echo "<input type='submit' name='modifSession' value='Enregistrer' />";
	echo "</form>";
?>
</div>
