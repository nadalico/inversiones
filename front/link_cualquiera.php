<?php



include ("../../../inc/includes.php");


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

//aqui va lo que ve el usuario

echo ("me llamaron desde otro lugar");


//$app->formIndex();

if (Session::getCurrentInterface() == "helpdesk") {
   Html::helpFooter();
} else {
   Html::footer();
}
