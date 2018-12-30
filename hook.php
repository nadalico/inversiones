<?php
// plugin_"nombredelpluginenminúscula"_install() Nombre de la carpeta del plugin en el directorio plugins
function plugin_inversiones_install() {
  	global $DB;

	//PluginInversionesProfile el Plugin"Nombredelpluginprimeraletramayúscula"Profile
	//donde Profile es un archivo ubicado en plugins/inversiones/inc/profile.class.php
	PluginInversionesProfile::createFirstAccess($_SESSION['glpiactiveprofile']['id']);

	// aquí podrías crear tablas en la base de datos que luego tu aplicación necesite
	 //instanciate migration with version
   	$migration = new Migration(100);

   	//Create table only if it does not exists yet!
   	if (!TableExists('glpi_plugin_inversiones_inversiones')) {
      	//table creation query
      	$query = "CREATE TABLE `glpi_plugin_inversiones_inversiones` (
            	`id` INT(11) NOT NULL AUTO_INCREMENT,
            	`concepto` VARCHAR(255) NOT NULL,
            PRIMARY KEY  (`id`)
       	) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci";
      	$DB->queryOrDie($query, $DB->error());
   	}

   	//execute the whole migration
   	$migration->executeMigration();

    return true;
}

function plugin_inversiones_uninstall() {
 global $DB;

PluginInversionesProfile::uninstallProfile();

	// aquí podrás eliminar las tablas que creaste en la base de datos
	$tables = [
      	'inversiones'
   	];

   	foreach ($tables as $table) {
      	$tablename = 'glpi_plugin_inversiones_' . $table;
      	//Create table only if it does not exists yet!
      	if (TableExists($tablename)) {
         	$DB->queryOrDie(
            	"DROP TABLE `$tablename`",
            	$DB->error()
         	);
      	}
   	}

    return true;
}

?>