<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Insertion d'un plan de formation</div>";
	// Pour permettre le controle
	echo validation_errors();
	// Construction du formulaire
	echo "<form action='" . site_url() . "/gestionPlanAdmin/creer/insertion' method='post' accept-charset='ISO-8859-1' id='ajoutPlan'>";
	echo "<label>Matricule : </label>";
	// Liste des matricules
	echo "<select name='matPlan'>";
	echo "<option>Votre choix</option>";
	foreach($lesMatricules as $matricule)
	{
		echo "<option>" . $matricule['matricule'] . "</option>";
	}
	echo "</select>";
	echo "<label>Libell&eacute; formation : </label>";
	// Liste des libellés de formation
	echo "<select name='libFormPlan'>";
	echo "<option>Votre choix</option>";
	foreach($lesFormations as $formation)
	{
		echo "<option>" . $formation['libelle'] . "</option>";
	}
	echo "</select>";
	echo "<label>Niveau : </label>";
	// Liste des niveaux de formation
	echo "<select name='nivFormPlan'>";
	echo "<option>Votre choix</option>";
	foreach($lesNiveaux as $niveau)
	{
		echo "<option>" . $niveau['niveau'] . "</option>";
	}
	echo "</select>";
	echo "<label>Effectu&eacute;e ? </label>";
	echo "<select name='effFormPlan'>";
	echo "<option value='Oui'>Oui</option>";
	echo "<option selected value='Non'>Non</option>";
	echo "</select>";
	
	echo "<input type='submit' name='ajoutPlan' value='Enregistrer' />";
?>
</div>