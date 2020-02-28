<div id='contenu'>
	<?php
		//Sans les helpers pagination et table
		echo "<br/>";
		echo "<div id='titre'>Liste des clients</div>";
		echo "<table border='1' align='center' width='90%'>";
		echo "<tr><th>Matricule</th><th>Nom</th><th>Rue</th><th>Ville</th><th colspan='2'>Option</td></tr>";
		foreach ($lesClients as $ligne)
		{
			echo "<tr>";
			echo "<td>" . $ligne['matricule'] . "</td>";
			echo "<td>" . $ligne['nom'] . "</td>";
			echo "<td>" . $ligne['rue'] . "</td>";
			echo "<td>" . $ligne['ville'] . "</td>";
			echo "<td><a href='" . site_url() . "/gestionClientAdmin/modifier/" . $ligne['matricule'] . "' title='Modifier l'enregistrement'>Modifier</a></td>";
			echo "<td><a href='" . site_url() . "/gestionClientAdmin/supprimer/" . $ligne['matricule'] . "' title='Supprimer l'enregistrement'>Supprimer</a></td>";
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
		echo $this->table->set_caption("Liste des clients");
		echo $this->table->set_heading('Matricule','Nom','Rue','Ville');
		//Initialisation de notre tableau
		echo $this->table->generate($enregt);//Données récupérées de $data['enregt'] du contrôleur
		
		//Initialisation de la pagination
		echo $this->pagination->create_links();
		*/
	?>
</div>