<?php

/*
 *
  -------------------------------------------------------------------------
  Plugin GLPI inversiones
  Copyright (C) 2018 by Walid H.
 */

class PluginInversionesIndex extends CommonDBTM {

	static $rightname = 'plugin_inversiones';

	/**
    * Name of the type
    *
    * @param type
    **/
   	static function getTypeName($nb=0) {
      	global $LANG;
      	return $GLOBALS['LANG']['plugin_inversiones']['title'];
   	}

    public function showForm($ID, $options = []) {
        global $CFG_GLPI;

        $this->initForm($ID, $options);
        $this->showFormHeader($options);

        if (!isset($options['display'])) {
            //display per default
            $options['display'] = true;
        }

        $params = $options;
        //do not display called elements per default; they'll be displayed or returned here
        $params['display'] = false;

        $out = '<tr>';

        $out .= '<th>' . __('My label', 'inversiones') . '</th>';

      	$objectName = autoName(
         	$this->fields["concepto"],
         	"concepto",
         	(isset($options['withtemplate']) && $options['withtemplate']==2),
         	$this->getType(),
         	$this->fields["entities_id"]
      	);

      	$out .= '<td>';
      	$out .= Html::autocompletionTextField(
         	$this,
         		'concepto',
         	[
            	'value'     => $objectName,
            	'display'   => false
         	]
      	);
      	$out .= '</td>';

      	$out .= $this->showFormButtons($params);

      	if ($options['display'] == true) {
         	echo $out;
      	} else {
         	return $out;
      	}

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

	   /*static function canView() {
      if (isset($_SESSION["glpiactiveprofile"])) {
         return ($_SESSION["glpiactiveprofile"]['inversiones'] == 'w'
                 || $_SESSION["glpiactiveprofile"]['inversiones'] == 'r');
      }
      return false;
   }*/
}