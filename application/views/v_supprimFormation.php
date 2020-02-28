<div id='contenu'>
<?php
	echo "<br/>";
	echo "<div id='titre'>Etes vous certain de vouloir supprimer la formation suivante</div>";
	echo "<form action='" . site_url() . "/gestionFormAdmin/supprimer/" . $ligne['libelle'] . "/" . $ligne['niveau'] . "/suppression' method='post' accept-charset='ISO-8859-1' id='modifForm'>";
	echo "<label>Libelle : </label>";
	echo"<input type='text' name='libForm' readOnly value='" . $ligne['libelle'] . "' />";
	echo "<label>Niveau : </label>";
	echo"<input type='text' name='nivForm' readOnly value='" . $ligne['niveau'] . "' />";
	echo "<label>Type : </label><select readonly name='typForm'>";
	if ($ligne['type'] == 'Bureautique')
	{
		echo "<option selected value='Bureautique'>Bureautique</option>";
		echo "<option value='Compta'>Comptabilite</option>";
	}
	else
	{
		echo "<option value='Bureautique'>Bureautique</option>";
		echo "<option selected value='Compta'>Comptabilite</option>";
	}
	echo "</select>";
	echo "<label>Description : </label>";
	echo "<input readonly type='text' name='desForm' value='" . $ligne['description'] . "' />";
	echo "<label>Diplomante ? </label>";
	echo "<select readonly name='dipForm'>";
	if ($ligne['diplomante']=='0') // la valeur 0 équivaut à faux en "boolean mysql"
	{
		echo "<option value='Oui'>Oui</option>";
		echo "<option selected value='Non'>Non</option>";
	}
	else
	{
		echo "<option selected value='Oui'>Oui</option>";
		echo "<option value='Non'>Non</option>";
	}
	echo "</select>";
	echo "<label>Duree : </label>";
	echo "<input readonly type='text' name='durForm' value='" . $ligne['duree'] . "' />";
	echo "<label>Cout de revient : </label>";
	echo "<input readonly type='text' name='couForm' value='" . $ligne['coutrevient'] . "' />";
	echo "<input type='submit' name='supprimForm' value='Suppression definitive' />";
	echo "</form>";
?>
</div>
