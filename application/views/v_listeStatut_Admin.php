<div id='contenu'>
	<?php
		//Sans les helpers pagination et table
		echo "<br/>";
		echo "<div id='titre'>Liste des Statuts</div>";
		echo "<table border='1' align='center' width='90%'>";
		echo "<tr><th>Type</th><th>Taux Horaire</th><th colspan='2'>Option</td></tr>";
		foreach ($lesStatuts as $ligne)
		{
			echo "<tr>";
			echo "<td>" . $ligne['type'] . "</td>";
			echo "<td>" . $ligne['taux_horaire'] . "</td>";
			// Pour remplacer le caractère % (qui pose problème dans l'URL) par son code Ascii
			$ligne['type'] = str_replace("%","%25",$ligne['type']);
			echo "<td><a href='" . site_url() . "/gestionStatutAdmin/modifier/" . $ligne['type'] . "' title='Modifier l enregistrement'>Modifier</a></td>";
			echo "<td><a href='" . site_url() . "/gestionStatutAdmin/supprimer/" . $ligne['type'] . "' title='Supprimer l enregistrement'>Supprimer</a></td>";
			echo "</tr>";
		}
		echo "<tr><td colspan='4'>";
		echo $this->pagination->create_links(); //Creation des liens pour passer de page en page
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		
		/*
		//Avec les helpers pagination et table
		//Initialisation des en-tête du tableau
		echo "<br/>";
		echo $this->table->set_caption("Liste des statuts");
		echo $this->table->set_heading('Type','Taux Horaire');
		//Initialisation de notre tableau
		echo $this->table->generate($enregt);//Données récupérées de $data['enregt'] du contrôleur
		
		//Initialisation de la pagination
		echo $this->pagination->create_links();
		*/
	?>
</div>