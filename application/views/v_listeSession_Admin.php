<div id='contenu'>
	<?php
		
		//Sans les helpers pagination et table
		echo "<br/>";
		echo "<div id='titre'>Liste des sessions de formation</div>";
		echo "<table border='1' align='center' width='90%'>";
		echo "<tr><th>Numero</th><th>Libell&eacute; formation</th><th>Niveau de la formation</th><th>Date Debut</th><th>nombre de places</th><th>Nombre d'inscrits</th><th colspan='2'>Option</td></tr>";
		foreach ($lesSessions as $ligne)
		{
			echo "<tr>";
			echo "<td>" . $ligne['numero'] . "</td>";
			echo "<td>" . $ligne['libelleform'] . "</td>";
			echo "<td>" . $ligne['niveauform'] . "</td>";
			echo "<td>" . $ligne['datedebut'] . "</td>";
			echo "<td>" . $ligne['nb_places'] . "</td>";
			echo "<td>" . $ligne['nb_inscrits'] . "</td>";
			echo "<td><a href='" . site_url() . "/gestionSessionAdmin/modifier/" . $ligne['numero'] . "' title='Modifier l'enregistrement'>Modifier</a></td>";
			echo "<td><a href='" . site_url() . "/gestionSessionAdmin/supprimer/" . $ligne['numero'] . "' title='Supprimer l'enregistrement'>Supprimer</a></td>";
			echo "</tr>";
		}
		echo "<tr><td colspan='8'>";
		echo $this->pagination->create_links(); //Creation des liens pour passer de page en page
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		
		/*
		//Avec les helpers pagination et table
		//Initialisation des en-tête du tableau
		echo "<br/>";
		echo $this->table->set_caption("Liste des sessions de formation proposees");
		echo $this->table->set_heading('numero', 'libelleform','niveauform', 'datedebut','nb_places','nb_inscrits');
		//Initialisation de notre tableau
		echo $this->table->generate($lesSessions);//Données récupérées de $data['enregt'] du contrôleur
		
		//Initialisation de la pagination
		echo $this->pagination->create_links();
		*/
	?>
</div>