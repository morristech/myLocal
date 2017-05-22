<?php
require_once("defines.php");
if ( $devMod )
{
	error_reporting(E_ALL);
	ini_set('display_errors',true);
}
require_once('ConfigReader.php');
//init config reader
$configReader = new ConfigReader($mainFolderName , $templateName);
$userConfigs = $configReader->getConfig();

//so beautifull code <3
if ( $userConfigs )
{
	foreach( $userConfigs as $configName => $userConfig )
	{
		if( !empty( $$configName ) )
		{
			$$configName = $configReader->getConfig($configName);
		}
	}
}

require_once("config_smarty.php");
require_once(CLASS_DIR . "/Controller.php");
require_once(CLASS_DIR . "/FrontController.php");

if( file_exists(CLASS_DIR . "/" . $configReader->getControllerName() . ".php") )
{
	require_once(CLASS_DIR . "/" . $configReader->getControllerName() . ".php");
}
?>