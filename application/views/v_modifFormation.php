<div id='contenu'>
<?php
	echo "<div id='titre'>Modification de formation</div>";
	echo "<form action='" . site_url() . "/gestionFormAdmin/modifier/" . $laFormation['libelle'] . "/" . $laFormation['niveau'] . "/modification' method='post' accept-charset='ISO-8859-1' id='modifForm'>";
	echo "<label>Libelle : </label>";
	echo"<input type='text' name='libForm' readOnly value='" . $laFormation['libelle'] . "' />";
	echo "<label>Niveau : </label>";
	echo"<input type='text' name='nivForm' readOnly value='" . $laFormation['niveau'] . "' />";
	echo "<label>Type : </label><select name='typForm'>";
	if ($laFormation['type']=='Bureautique')
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
	echo "<input type='text' name='desForm' value='" . $laFormation['description'] . "' />";
	echo "<label>Diplomante ? </label>";
	echo "<select name='dipForm'>";
	if ($laFormation['diplomante']=='0') // la valeur 0 équivaut à faux en "boolean mysql"
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
	echo "<input type='text' name='durForm' value='" . $laFormation['duree'] . "' />";
	echo "<label>Cout de revient : </label>";
	echo "<input type='text' name='couForm' value='" . $laFormation['coutrevient'] . "' />";
	echo "<input type='submit' name='modifForm' value='Enregistrer' />";
?>
</div>
