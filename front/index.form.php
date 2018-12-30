<?php
include ("../../../inc/includes.php");

if ($_SESSION["glpiactiveprofile"]["interface"] == "central") {
   Html::header("TITRE", $_SERVER['PHP_SELF'], "plugins", "pluginInversionesIndex", "");
} else {
   Html::helpHeader("TITRE", $_SERVER['PHP_SELF']);
}

echo "glpi formulario inversiones";

//hay que intentar llamar con el objeto
/*$inversiones = new pluginInversionesIndex();
$inversiones->showForm();*/

Html::footer();