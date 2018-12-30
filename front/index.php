<?php
/*
 *
 -------------------------------------------------------------------------
 Plugin GLPI Inversiones
 */

include ("../../../inc/includes.php");
include ('../inc/misfunciones.php'); //aqui esta parte de la lógica

Session::checkLoginUser();
session_start();



$plugin = new Plugin();
if (!$plugin->isInstalled("inversiones") || !$plugin->isActivated("inversiones")) {
   Html::displayNotFoundError();
}

Session::checkRight('plugin_inversiones', READ);

$app = new PluginInversionesIndex();

Html::header(
   $LANG['plugin_inversiones']['title'],
   $_SERVER["PHP_SELF"],
   'plugins',
   "PluginInversionesIndex"
);


//podriamos llamar a las funciones desde cualquier lado con include

//printInversiones();


//ó  utilizamos la herencia de la clase index


$app->formIndex();

if (Session::getCurrentInterface() == "helpdesk") {
   Html::helpFooter();
} else {
   Html::footer();
}
