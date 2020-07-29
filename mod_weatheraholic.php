<?php	
/*-------------------------------------------------------------------------------	
# mod_weatheraholic - A FREE weather module for Joomla 3.x v1.4.4	
# -------------------------------------------------------------------------------	
# author    JoomDev (Formerly GraphicAholic)	
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: https://www.joomdev.com
--------------------------------------------------------------------------------*/	
// No direct access	
defined('_JEXEC') or die('Restricted access');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$LiveSite 	= JURI::base();
$document	= JFactory::getDocument();	
$modbase	= JURI::base(true).'/modules/mod_weatheraholic/';	
$openweatherAPIage = $params->get('openweatherAPIage');
if($openweatherAPIage == 1) {
$document->addScript ($modbase.'js/jquery.flatWeatherPlugin.new.min.js');	
}
if($openweatherAPIage == 2) {
$document->addScript ($modbase.'js/jquery.flatWeatherPlugin.old.min.js');	
}
$document->addStyleSheet($modbase.'css/flatWeatherPlugin.css');	
$moduleID	= $module->id;	
$choosebackgroundEffect = $params->get('choosebackgroundEffect');	
$weatheraholicShadowEffext = $params->get('weatheraholicShadowEffext');	
$weatheraholicFont = $params->get('weatheraholicFont');	
$weatheraholicColor = $params->get('weatheraholicColor');	
$weatheraholicDesc = $params->get('weatheraholicDesc');	
$displayLocation = $params->get('displayLocation');	
$weatheraholicAutoRefresh = $params->get('weatheraholicAutoRefresh');	
$weatheraholicAPI = $params->get('weatheraholicAPI');	
$weatheraholicPretext = $params->get('weatheraholicPretext');	
$weatheraholicPosttext = $params->get('weatheraholicPosttext');	
require JModuleHelper::getLayoutPath('mod_weatheraholic','default',$params);	
?>