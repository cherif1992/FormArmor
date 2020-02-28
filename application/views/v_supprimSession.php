<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Etes vous certain de vouloir supprimer la session suivante</div>";
	echo "<form action='" . site_url() . "/gestionSessionAdmin/supprimer/" . $ligne['numero'] . "/suppression' method='post' accept-charset='ISO-8859-1' id='supprimSession'>";
	
	echo "<label>Numéro : </label>";
	echo"<input type='text' name='numSession' readOnly value='" . $ligne['numero'] . "' />";
	echo "<label>Libell&eacute; formation : </label>";
	echo "<select readonly name='libFormSession'>";
	// Liste des libellés de formation
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
	echo "<select readonly name='nivFormSession'>";
	// Liste des niveaux de formation
	foreach ($lesNiveaux as $lig)
	{
	    if ($lig['niveau'] == $ligne['niveauform']) // ==> C'est le libelle de formation de cette session
		{
			echo "<option selected>" . $lig['niveau'] . "</option>";
		}
		else
		{
			echo "<option>" . $lig['niveau'] . "</option>";
		}
	}
	echo "</select>";
	echo "<label>date de début session : </label>";
	echo"<input type='text' name='dateDebSession' readonly value='" . $ligne['datedebut'] . "' />";
	echo "<label>Nombre de places proposées : </label>";
	echo"<input type='text' name='nbPlaceSession' readonly value='" . $ligne['nb_places'] . "' />";
	echo "<label>Nombre d'inscrits : </label>";
	echo"<input type='text' name='nbInscritSession' readonly value='" . $ligne['nb_inscrits'] . "' />";
	echo "<input type='submit' name='supprimSession' value='Suppression definitive' />";
?>
</div>
