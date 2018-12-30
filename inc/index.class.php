<?php

/*
 *
  -------------------------------------------------------------------------
  Plugin GLPI inversiones
  Copyright (C) 2017 by Walid H.
 */

if (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access directly to this file");
}

class PluginInversionesIndex extends CommonDBTM {

    static $rightname = 'plugin_inversiones';

    /**
     *
     * @return type
     */
    public static function getTypeName() {

    return $GLOBALS['LANG']['plugin_inversiones']['title'];
    }

      /**
     * Show the form (menu->plugin->inversiones)
     */
    public function formIndex() {
        echo "<form action='' method='post'>";
        echo '<div class="tab_cadre_fixe" style="box-shadow: 0 1px 8px #aaa;text-align:center;padding:1em;">';
        echo "<h1>Plugin Inversiones</h1>";
        echo "<p>...</p>";
        echo "</div>";
        html::closeForm();
    }


 /**
    * @see CommonGLPI::getAdditionalMenuLinks()
   **/
   static function getAdditionalMenuLinks() {
      global $CFG_GLPI;
      $links = array();

   //   $links['config'] = '/plugins/inversiones/front/link_cualquiera.php';
    //  $links["<img  src='".$CFG_GLPI["root_doc"]."/pics/menu_showall.png' title='".__s('Show all')."' alt='".__s('Show all')."'>"] = '/plugins/inversiones/front/link_cualquiera.php';
      $links[__s('Ver Link', 'inversiones')] = '/plugins/inversiones/front/link_cualquiera.php';

      return $links;
   }

}