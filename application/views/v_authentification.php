<div id='contenu'>
	<div id='authentif'>
	<?php
		// Méthode avec le helper form (facilite la manipulation de formulaire) et la classe database
		// Initialisation des attributs du formulaire
		$formAtt = array('id'=>'authentificationForm','class'=>'standardForm');
		//Ouverture du formulaire (avec action = authentification/authentifier/controle)
		echo form_open('authentification/authentifier/controle',$formAtt);
		//Labels + Champs de type texte
		echo form_label('Matricule : ');
		echo form_input('matForm');
		echo form_label('Mot de passe : ');
		echo form_password('mdpForm');
		//Génération du bouton submit
		echo form_submit('validAuthentifForm','Soumettre');
		//Fermeture du formulaire
		echo form_close();
	?>
	</div>
</div>