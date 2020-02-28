<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Insertion d'une formation</div>";
	// Construction du formulaire
	// Méthode avec le helper form (facilite la manipulation de formulaire) et la classe database
	//Initialisation des attributs du formulaire
	//$formAtt = array('id'=>'ajoutForm','class'=>'standardForm', 'action'=>'" . site_url() . "/gestionFormAdmin/creer/insertion', 'method'=>'post');
	//Overture du formulaire
	echo form_open('" . site_url() . "/gestionFormAdmin/creer/insertion');
	//Labels + Champs de type texte
	echo form_label('Libelle de la formation : ');
	echo form_input('libForm');
	echo form_label('Niveau : ');
	echo form_input('nivForm');
	//Initialisation des valeurs d'un champ select (dropdown)
	$types = array('Bureautique'=>'Bureautique','Compta'=>'Comptabilite');
	echo form_label('Type : ');
	echo form_dropdown('typForm',$types);
	echo form_label('Description : ');
	echo form_input('desForm');
	$diploms = array('Oui'=>'Oui','Non'=>'Non');
	echo form_label('Diplomante ? ');
	echo form_dropdown('dipForm',$diploms);
	echo form_label('Duree : ');
	echo form_input('durForm');
	echo form_label('Cout de revient : ');
	echo form_input('couForm');
	//Génération du bouton submit
	echo form_submit('validForm','Enregistrer');
	//Fermeture du formulaire
	echo form_close();
?>
</div>