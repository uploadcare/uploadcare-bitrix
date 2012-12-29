<?
class uploadcare extends CModule
{
	var $MODULE_ID = "uploadcare";
	var $MODULE_NAME = "Uploadcare";
	var $MODULE_VERSION = "1.0.0";
	var $MODULE_VERSION_DATE = "2012.12.29";
	var $MODULE_DESCRIPTION = "Uploadcare extension for 1C-Bitrix. Adds a way to upload files and images using default editor.";

	function DoInstall()
	{
		RegisterModuleDependences("fileman", "OnBeforeHTMLEditorScriptsGet", $this->MODULE_ID,
		"Uploadcare", "addEditorScriptsHandler" );
		RegisterModuleDependences("fileman", "OnIncludeHTMLEditorScript", $this->MODULE_ID,
		"Uploadcare", "OnIncludeHTMLEditorHandler" );
		
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare.js", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin/htmleditor2/uploadcare.js", true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare.png", $_SERVER["DOCUMENT_ROOT"]."/bitrix/images/fileman/htmledit2/uploadcare.png", true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare.php", $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/uploadcare/uploadcare.php", true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare-php", $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/uploadcare/uploadcare-php", true, true);
		
		RegisterModule($this->MODULE_ID);
	}

	function DoUninstall()
	{
		UnRegisterModuleDependences("fileman", "OnBeforeHTMLEditorScriptsGet", $this->MODULE_ID,
		"Uploadcare", "addEditorScriptsHandler" );
		UnRegisterModuleDependences("fileman", "OnIncludeHTMLEditorScript", $this->MODULE_ID,
		"Uploadcare", "OnIncludeHTMLEditorHandler" );	
		
		DeleteDirFilesEx("/bitrix/admin/htmleditor2/uploadcare.js");
		DeleteDirFilesEx("/bitrix/images/fileman/htmledit2/uploadcare.png");
		DeleteDirFilesEx("/bitrix/tools/uploadcare/uploadcare.php");
		DeleteDirFilesEx("/bitrix/tools/uploadcare/uploadcare-php");
		
		UnRegisterModule($this->MODULE_ID);
	}
}
?>
