<div id='contenu'>
	<?php
		echo "<br/>";
		echo "<div id='titre'>Liste des Plans de formation</div>";
		echo "<table border='1' align='center' width='90%'>";
		echo "<tr><th>Matricule</th><th>Libell&eacute; de la formation</th><th>Niveau</th><th>Effectu&eacute; (Oui/Non)</th><th colspan='2'>Option</td></tr>";
		foreach ($lesPlans as $ligne)
		{
			echo "<tr>";
			echo "<td>" . $ligne['matricule'] . "</td>";
			echo "<td>" . $ligne['libelle_form'] . "</td>";
			echo "<td>" . $ligne['niveau'] . "</td>";
			if ($ligne['effectue'] == 1)
			{
				echo "<td>Oui</td>";
			}
			else
			{
				echo "<td>Non</td>";
			}
			echo "<td><a href='" . site_url() . "/gestionPlanAdmin/modifier/" . $ligne['matricule'] . "/" . $ligne['libelle_form'] . "/" . $ligne['niveau'] . "' title='Modifier l'enregistrement'>Modifier</a></td>";
			echo "<td><a href='" . site_url() . "/gestionPlanAdmin/supprimer/" . $ligne['matricule'] . "/" . $ligne['libelle_form'] . "/" . $ligne['niveau'] . "' title='Supprimer l'enregistrement'>Supprimer</a></td>";
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
		echo $this->table->set_caption("Liste des plans de formation");
		echo $this->table->set_heading('Matricule','Libellé formation','Niveau','Effectué ?');
		//Initialisation de notre tableau
		echo $this->table->generate($enregt);//Données récupérées de $data['enregt'] du contrôleur
		
		//Initialisation de la pagination
		echo $this->pagination->create_links();
		*/
	?>
</div>