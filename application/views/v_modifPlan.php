<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Modification du plan de formation</div>";
	echo "<form action='" . site_url() . "/gestionPlanAdmin/modifier/" . $ligne['matricule'] . "/" .$ligne['libelle_form'] . "/" . $ligne['niveau'] . "/modification' method='post' accept-charset='ISO-8859-1' id='modifPlan'>";
	echo "<label>Matricule : </label>";
	echo"<input type='text' name='matPlan' readOnly value='" . $ligne['matricule'] . "' />";
	echo "<label>Libelle formation: </label>";
	echo"<input type='text' name='libFormPlan' readOnly value='" . $ligne['libelle_form'] . "' />";
	echo "<label>Niveau formation : </label>";
	echo"<input type='text' name='nivFormPlan' readOnly value='" . $ligne['niveau'] . "' />";
	echo "<label>Effectue : </label><select name='effFormPlan'>";
	if ($ligne['effectue']==0) // la valeur 0 équivaut à faux en "boolean mysql"
	{
		echo "<option selected value='Non'>Non</option>";
		echo "<option value='Oui'>Oui</option>";
	}
	else
	{
		echo "<option value='Non'>Non</option>";
		echo "<option selected value='Oui'>Oui</option>";
	}
	echo "</select>";
	
	echo "<input type='submit' name='modifPlan' value='Enregistrer' />";	
	echo "</form>";
?>
</div>
