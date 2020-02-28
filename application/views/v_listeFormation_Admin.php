<div id='contenu'>
	<?php
		
		//Sans les helpers pagination et table
		echo "<br/>";
		echo "<div id='titre'>Liste des formations</div>";
		echo "<table border='1' align='center' width='90%'>";
		echo "<tr><th>Libell&eacute;</th><th>Niveau</th><th>Type</th><th>Description</th><th colspan='2'>Option</td></tr>";
		foreach ($lesFormations as $ligne)
		{
			echo "<tr>";
			echo "<td>" . $ligne['libelle'] . "</td>";
			echo "<td>" . $ligne['niveau'] . "</td>";
			echo "<td>" . $ligne['type'] . "</td>";
			echo "<td>" . $ligne['description'] . "</td>";
			echo "<td><a href='" . site_url() . "/gestionFormAdmin/modifier/" . $ligne['libelle'] . "/" . $ligne['niveau'] . "' title='Modifier l'enregistrement'>Modifier</a></td>";
			echo "<td><a href='" . site_url() . "/gestionFormAdmin/supprimer/" . $ligne['libelle'] . "/" . $ligne['niveau'] . "' title='Supprimer l'enregistrement'>Supprimer</a></td>";
			echo "</tr>";
		}
		echo "<tr><td colspan='6'>";
		echo $this->pagination->create_links(); //Creation des liens pour passer de page en page
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		
		/*
		//Avec les helpers pagination et table
		//Initialisation des en-tête du tableau
		echo "<br/>";
		echo $this->table->set_caption("Liste des formations proposees");
		echo $this->table->set_heading('Libelle','Niveau','Type','Description');
		//Initialisation de notre tableau
		echo $this->table->generate($enregt);//Données récupérées de $data['enregt'] du contrôleur
		
		//Initialisation de la pagination
		echo $this->pagination->create_links();
		*/
	?>
</div>