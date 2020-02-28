<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Insertion d'une session de formation</div>";
	// Pour permettre le controle
	echo validation_errors();
	// Construction du formulaire
	// Méthode avec le helper form (facilite la manipulation de formulaire) et la classe database
	// Initialisation des attributs du formulaire
	$formAtt = array('id'=>'ajoutSession','class'=>'standardForm');
	//Overture du formulaire
	echo form_open(site_url() . "/gestionSessionAdmin/creer/insertion",$formAtt);
	//Labels + listes déroulantes
	echo "<label>Libell&eacute; formation : </label>";
	echo "<select name='libFormSession'>";
	echo "<option>Votre choix</option>";
	foreach($lesFormations as $formation)
	{
		echo "<option>" . $formation['libelle'] . "</option>";
	}
	echo "</select>";
	echo "<label>Niveau : </label>";
	// Liste des niveaux de formation
	echo "<select name='nivFormSession'>";
	echo "<option>Votre choix</option>";
	foreach($lesNiveaux as $niveau)
	{
		echo "<option>" . $niveau['niveau'] . "</option>";
	}
	echo "</select>";
	//Labels + Champs de type texte
	echo form_label('Date de d&eacute;but (aaaa/mm/jj) : ');
	echo form_input('dateDebSession');
	echo form_label('Nombre de places : ');
	echo form_input('nbPlaceSession');
	echo form_label('Nombre d\'inscrits : ');
	echo form_input('nbInscritSession');
	//Génération du bouton submit
	echo form_submit('ajoutSession','Enregistrer');
	//Fermeture du formulaire
	echo form_close();
	
?>
</div>