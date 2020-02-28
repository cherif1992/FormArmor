<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Etes vous certain de vouloir supprimer le plan de formation suivant</div>";
	echo "<form action='" . site_url() . "/gestionPlanAdmin/supprimer/" . $ligne['matricule'] . "/". $ligne['libelle_form'] . "/" . $ligne['niveau'] . "/suppression' method='post' accept-charset='ISO-8859-1' id='supprimPlan'>";
	echo "<label>Matricule : </label>";
	echo"<input type='text' name='matPlan' readOnly value='" . $ligne['matricule'] . "' />";
	echo "<label>Libelle de la formation: </label>";
	echo"<input type='text' name='libFormPlan' readOnly value='" . $ligne['libelle_form'] . "' />";
	echo "<label>Niveau : </label>";
	echo"<input type='text' name='nivFormPlan' readOnly value='" . $ligne['niveau'] . "' />";
	echo "<label>Effectu&eacute;e ? </label>";
	echo "<select readonly name='effFormPlan'>";
	if ($ligne['effectue']==0) // la valeur 0 équivaut à faux en "boolean mysql"
	{
		echo "<option value='Oui'>Oui</option>";
		echo "<option selected value='Non'>Non</option>";
	}
	else
	{
		echo "<option selected value='Oui'>Oui</option>";
		echo "<option value='Non'>Non</option>";
	}
	echo "</select>";
	echo "<input type='submit' name='supprimPlan' value='Suppression definitive' />";	
	echo "</form>";
?>
</div>
