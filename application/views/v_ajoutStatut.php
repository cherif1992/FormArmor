<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Insertion d'un Statut</div>";
	// Construction du formulaire
	// Méthode avec le helper form (facilite la manipulation de formulaire) et la classe database
	// Initialisation des attributs du formulaire
	$formAtt = array('id'=>'ajoutStatut','class'=>'standardForm');
	//Overture du formulaire
	echo form_open(site_url() . "/gestionStatutAdmin/creer/insertion",$formAtt);
	//Labels + Champs de type texte
	echo form_label('Type de statut : ');
	echo form_input('typeStatut');
	echo form_label('Taux Horaire : ');
	echo form_input('tauxStatut');
	//Génération du bouton submit
	echo form_submit('ajoutStatut','Enregistrer');
	//Fermeture du formulaire
	echo form_close();
?>
</div>