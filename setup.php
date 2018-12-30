<?php

/*
 *
  Plugin GLPI Inversiones
 */

function plugin_init_inversiones() {
    global $PLUGIN_HOOKS,$CFG_GLPI;

    $PLUGIN_HOOKS['csrf_compliant']['inversiones'] = true;
    $PLUGIN_HOOKS['change_profile']['inversiones'] = array('PluginInversionesProfile', 'changeProfile');

//aquí esta registrando la clase profile que es la que desencadena todo en este ejemplo
    Plugin::registerClass('PluginInversionesProfile', array('addtabon' => 'Profile'));

    $plugin = new Plugin();

    if (isset($_SESSION['glpiID']) && $plugin->isInstalled('inversiones') && $plugin->isActivated('inversiones')) {
        if (Session::haveRight('plugin_inversiones', READ)) {

            //aquí se agrega al menú complementos
            $PLUGIN_HOOKS['menu_toadd']['inversiones'] = array(
               'plugins' => 'PluginInversionesIndex'); //en la clase form.class.php hace referencia esto

        }
    }
}

function plugin_version_inversiones() {
    global $LANG;

    return array(
        'name' => $LANG['plugin_inversiones']['title'],
        'version' => '1.1.0',
        'author' => "Javier Nadal",
        'license' => "GPLv2+",
        'homepage' => 'http://cdi-ibense.com',
        'minGlpiVersion' => '9.1' //aqui le digo que mi plugin va a trabajar con la versión minima de glpi
    );
}

function plugin_inversiones_check_prerequisites() {
    if (GLPI_VERSION >= 9.1) { //aqui le digo que el prerequisito es la versión 9.1 de glpi
        return true;
    } else {  //aquí le mando un mensaje si no tiene instalada la versión de glpi que yo deseo, y no lo deja instalar el plugin
        echo "La versión de GLPI no es compatible. Requiere GLPI 9.1";
        return false;
    }
}

function plugin_inversiones_check_config() {
    return true;
}