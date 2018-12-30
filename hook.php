<?php
// plugin_"nombredelpluginenminúscula"_install() Nombre de la carpeta del plugin en el directorio plugins
function plugin_inversiones_install() {
  global $DB;

//PluginInversionesProfile el Plugin"Nombredelpluginprimeraletramayúscula"Profile
//donde Profile es un archivo ubicado en plugins/inversiones/inc/profile.class.php
 PluginInversionesProfile::createFirstAccess($_SESSION['glpiactiveprofile']['id']);

// aquí podrías crear tablas en la base de datos que luego tu aplicación necesite
    return true;
}

function plugin_inversiones_uninstall() {
 global $DB;

PluginInversionesProfile::uninstallProfile();

// aquí podrás eliminar las tablas que creaste en la base de datos

      return true;
}

?>