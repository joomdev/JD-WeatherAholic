<?php	
/*-------------------------------------------------------------------------------	
# mod_weatheraholic - A FREE weather module for Joomla 3.x v1.4.4	
# -------------------------------------------------------------------------------	
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - GNU General Public License version 2 or later
# Websites: https://www.joomdev.com
--------------------------------------------------------------------------------*/	
// No direct access	
defined('_JEXEC') or die('Restricted access');	
$document	= JFactory::getDocument();	
$path		= $params->get('path');	
?>	
<style type="text/css">	
	#weatheraholic-<?php echo $moduleID ?> {	
		width: <?php echo $params->get('weatheraholicWidth') ?>;	
		<?php if ($choosebackgroundEffect == "1"): ?>	
		background-color: <?php echo $params->get('weatheraholicBackground') ?>;	
		<?php endif ; ?>	
		<?php if ($choosebackgroundEffect == "2"): ?>	
		background-image: url("<?php echo $LiveSite ?><?php echo $params->get('weatheraholicBackgroundImage') ?>");	
		background-repeat: <?php echo $params->get('weatheraholicImageRepeat') ?>;	
		<?php endif ; ?>	
		<?php if($weatheraholicColor != ""):?>	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
		<?php endif ; ?>	
		<?php if ($weatheraholicShadowEffext == "1"): ?>	
		text-shadow: 0px <?php echo $params->get('weatheraholicDistance') ?>px <?php echo $params->get('weatheraholicBlur') ?>px <?php echo $params->get('weatheraholicShadow') ?>;	
		<?php endif ; ?>	
		padding: 10px 0px 10px 10px;	
		margin: 0 20px 20px 0;	
	}	
	<?php if ($weatheraholicFont == "h1"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h1 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicFont == "h2"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h2 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicFont == "h3"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h3 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicFont == "h4"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h4 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicFont == "h5"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h5 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicFont == "h6"): ?>	
	.weatheraholic-<?php echo $moduleID ?> h6 {	
		color: <?php echo $params->get('weatheraholicColor') ?> !important;	
	}	
	<?php endif ; ?>	
	<?php if ($weatheraholicDesc == "1"): ?>	
	.wiText {display: none;}	
	<?php endif ; ?>	
	<?php if ($displayLocation == "0"): ?>	
	.flatWeatherPlugin h1, .flatWeatherPlugin h2, .flatWeatherPlugin h3, .flatWeatherPlugin h4, .flatWeatherPlugin h5, .flatWeatherPlugin h6 {display: none !important;}
	<?php endif ; ?>
</style>	
<script type="text/javascript">	
  jQuery(document).ready(function() {	
	var weatheracholic<?php echo $moduleID ?> = jQuery("#weatheraholic-<?php echo $moduleID ?>").flatWeatherPlugin({	
		module: <?php echo $moduleID ?>, //unique Module ID
		location: "<?php echo $params->get('weatheraholicLocation') ?>", //city and region *required	
		state: "<?php echo $params->get('regionName') ?>", //city and region *required if using openweathermap API	
		country: "<?php echo $params->get('weatheraholicCountry') ?>",  //country *required	
		locationSize: "<<?php echo $params->get('weatheraholicFont') ?>/>",
		sunday: "<?php echo $params->get('languageSunday') ?>",	
		monday: "<?php echo $params->get('languageMonday') ?>",	
		tuesday: "<?php echo $params->get('languageTuesday') ?>",	
		wednesday: "<?php echo $params->get('languageWednesday') ?>",	
		thursday: "<?php echo $params->get('languageThursday') ?>",	
		friday: "<?php echo $params->get('languageFriday') ?>",	
		saturday: "<?php echo $params->get('languageSaturday') ?>",	
		api: "openweathermap", //default: openweathermap (openweathermap or yahoo)	
		<?php if ($weatheraholicAPI == "openweathermap"): ?>
		apikey: "<?php echo $params->get('weatheraholicAPIkey') ?>",   //optional api key for openweather	
		languageCode: "<?php echo $params->get('countrylanguageCode') ?>",   //optional api key for openweather	
		<?php endif ; ?>	
		view : "<?php echo $params->get('weatheraholicView') ?>", //default: full (partial, full, simple, today or forecast)	
		displayCityNameOnly : <?php echo $params->get('weatheraholicCityname') ?>, //default: false (true/false) if you want to display only city name	
		timeDisplay: "<?php echo $params->get('weatheraholicTime') ?>", //12 Hour or 24 Hour Display
        <?php if ($openweatherAPIage == 2): ?>
		forecast: <?php echo $params->get('weatheraholicForecast') ?>, //default: 5 (0 -5) how many days you want forecast	
        <?php endif ; ?>
		render: true, //default: true (true/false) if you want plugin to generate markup	
		loadingAnimation: <?php echo $params->get('weatheraholicAnimation') ?>, //default: true (true/false) if you want plugin to show loading animation	
		units : "<?php echo $params->get('weatheraholicUnits') ?>" //options: "metric" "imperial" default: "auto"	
	});	
	<?php if ($weatheraholicAutoRefresh == "2"): ?>
		//then setup an interval to make repeat calls to fetchWeather 
			var intervalID = window.setInterval(function() {
				weatheracholic<?php echo $moduleID ?>.flatWeatherPlugin('fetchWeather').then(success, fail);				
			}, <?php echo $params->get('weatheraholicAutoRefreshRate') ?>*60*1000); //call every x minutes

			//then handle the success and fail states of the fetchWeather promise
			function success(data) {
				weatheracholic<?php echo $moduleID ?>.flatWeatherPlugin('render', data);
			} 

			function fail(data) {
				weatheracholic<?php echo $moduleID ?>.flatWeatherPlugin('error', data);
			} 
	<?php endif ; ?> 
  });	
</script>	
<?php if($weatheraholicPretext != ""):?>	
<?php echo $params->get('weatheraholicPretext') ?>	
<?php endif;?>	
<div id="weatheraholic-<?php echo $moduleID ?>"></div>	
<?php if($weatheraholicPosttext != ""):?>	
<?php echo $params->get('weatheraholicPosttext') ?>	
<?php endif;?>