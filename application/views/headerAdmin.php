<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />
	<meta name="formation" content="formation, tregor, goelo, 22, cotes d'armor">
	<meta name="Description" content="Site de l'organisme FormArmor. C'est un organisme...">
	<link rel="stylesheet" type="text/css" title="Design" href="<?php echo css_url('style') ; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo css_url('SpryMenuBarHorizontalAdmin') ; ?>" />
	<script src="<?php echo js_url('SpryMenuBar.js') ; ?>" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo js_url('jquery.js') ; ?>"></script>
	<title>Site officiel de l'organisme de formation FormArmor</title>
	<script type="text/javascript">
		var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"<?php echo img_url('SpryMenuBarDownHover.gif'); ?>", imgRight:"<?php echo img_url('SpryMenuBarRightHover.gif'); ?>"});
	</script>
</head>
<body>
	<div id="conteneur">
		<div id="header">
            <img src="<?php echo img_url('banniere.png') ; ?>" alt='banniere absente'/>
		</div>
		<div id="menu">
			<div id="sur_menu">
				<ul id="MenuBar1" class="MenuBarHorizontal">
					<li>
						<a class="MenuBarItemSubmenu" href="#" onMouseOver="document.getElementById('sous_menu1').style.display = 'block';" onMouseOut="document.getElementById('sous_menu1').style.display = 'none';">Formations</a>
	               		<div id='sous_menu1' style="display: none" onMouseOver="document.getElementById('sous_menu1').style.display = 'block';" onMouseOut="document.getElementById('sous_menu1').style.display = 'none';">
						<ul>
			    			<li><a href="/codeIgniter_FormArmor/index.php/gestionFormAdmin/lister">Lister/Modifier/Supprimer</a></li>
	                  		<li><a href="/codeIgniter_FormArmor/index.php/gestionFormAdmin/creer">Ajouter</a></li>
						</ul>
						</div>
					</li>
					<li>
						<a class="MenuBarItemSubmenu" href="#" onMouseOver="document.getElementById('sous_menu2').style.display = 'block';" onMouseOut="document.getElementById('sous_menu2').style.display = 'none';">Clients</a>
						<div id='sous_menu2' style="display: none" onMouseOver="document.getElementById('sous_menu2').style.display = 'block';" onMouseOut="document.getElementById('sous_menu2').style.display = 'none';">
						<ul>
							<li><a href="/codeIgniter_FormArmor/index.php/gestionClientAdmin/lister">Lister/Modifier/Supprimer</a></li>
							<li><a href="/codeIgniter_FormArmor/index.php/gestionClientAdmin/creer">Ajouter</a></li>
						</ul>
						</div>
					</li>
					<li>
						<a class="MenuBarItemSubmenu" href="#" onMouseOver="document.getElementById('sous_menu3').style.display = 'block';" onMouseOut="document.getElementById('sous_menu3').style.display = 'none';">Sessions</a>
	               		<div id='sous_menu3' style="display: none" onMouseOver="document.getElementById('sous_menu3').style.display = 'block';" onMouseOut="document.getElementById('sous_menu3').style.display = 'none';">
						<ul>
			    			<li><a href="/codeIgniter_FormArmor/index.php/gestionSessionAdmin/lister">Lister/Modifier/Supprimer</a></li>
	                  		<li><a href="/codeIgniter_FormArmor/index.php/gestionSessionAdmin/creer">Ajouter</a></li>
						</ul>
						</div>
					</li>
					<li>
						<a class="MenuBarItemSubmenu" href="#" onMouseOver="document.getElementById('sous_menu4').style.display = 'block';" onMouseOut="document.getElementById('sous_menu4').style.display = 'none';">Plans de formation</a>
	               		<div id='sous_menu4' style="display: none" onMouseOver="document.getElementById('sous_menu4').style.display = 'block';" onMouseOut="document.getElementById('sous_menu4').style.display = 'none';">
						<ul>
			    			<li><a href="/codeIgniter_FormArmor/index.php/gestionPlanAdmin/lister">Lister/Modifier/Supprimer</a></li>
	                  		<li><a href="/codeIgniter_FormArmor/index.php/gestionPlanAdmin/creer">Ajouter</a></li>
						</ul>
						</div>
					</li>
					<li>
						<a class="MenuBarItemSubmenu" href="#" onMouseOver="document.getElementById('sous_menu5').style.display = 'block';" onMouseOut="document.getElementById('sous_menu5').style.display = 'none';">Statuts</a>
	               		<div id='sous_menu5' style="display: none" onMouseOver="document.getElementById('sous_menu5').style.display = 'block';" onMouseOut="document.getElementById('sous_menu5').style.display = 'none';">
						<ul>
			    			<li><a href="/codeIgniter_FormArmor/index.php/gestionStatutAdmin/lister">Lister/Modifier/Supprimer</a></li>
	                  		<li><a href="/codeIgniter_FormArmor/index.php/gestionStatutAdmin/creer">Ajouter</a></li>
						</ul>
						</div>
					</li>
				</ul>                                                                                                                              
			</div>
			<div id="sous_menu">
			</div>
		</div>
		
	
		