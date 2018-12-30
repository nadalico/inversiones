<?php

include ("../../../inc/includes.php");
include("../inc/index.class.php");

if ($_SESSION["glpiactiveprofile"]["interface"] == "central") {
   Html::header(__("Inversiones", "inversiones"), $_SERVER['PHP_SELF'], "plugins", "pluginInversionesIndex", "");
} else {
   Html::helpHeader(__("Inversiones", "inversiones"), $_SERVER['PHP_SELF']);
}

//checkTypeRight('PluginExampleExample',"r");


$inversiones = new pluginInversionesIndex();
if (pluginInversionesIndex::canView() || pluginInversionesIndex::canCreate()) {
   Search::show("pluginInversionesIndex");
} else {
   echo "<div align='center'><br><br><img src=\"".
      $CFG_GLPI["root_doc"]."/pics/warning.png\" alt=\"warning\"><br><br>";
   echo "<b>".__s('Access denied')."</b></div>";
}
//$inversiones->showMenu();

Html::footer();