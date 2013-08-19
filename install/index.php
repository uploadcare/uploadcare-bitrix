<?
class uploadcare extends CModule
{
	var $MODULE_ID = "uploadcare";
	var $MODULE_NAME = "Uploadcare";
	var $MODULE_VERSION = "1.1.0";
	var $MODULE_VERSION_DATE = "2013.08.19";
	var $MODULE_DESCRIPTION = "Uploadcare extension for 1C-Bitrix. Adds a way to upload files and images using default editor.";

	function DoInstall()
	{
		RegisterModuleDependences("fileman", "OnBeforeHTMLEditorScriptsGet", $this->MODULE_ID,
		"BitrixUploadcare", "addEditorScriptsHandler" );
		RegisterModuleDependences("fileman", "OnIncludeHTMLEditorScript", $this->MODULE_ID,
		"BitrixUploadcare", "OnIncludeHTMLEditorHandler" );
		
		RegisterModuleDependences("iblock", "OnIBlockPropertyBuildList", $this->MODULE_ID, 
		"CUserTypeUploadcare", "GetIBlockPropertyDescription");		
		RegisterModuleDependences("main", "OnUserTypeBuildList", $this->MODULE_ID, 
		"CUserTypeUploadcare", "GetUserTypeDescription");
		
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare.js", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin/htmleditor2/uploadcare.js", true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare.png", $_SERVER["DOCUMENT_ROOT"]."/bitrix/images/fileman/htmledit2/uploadcare.png", true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/admin/uploadcare_admin.php", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin/uploadcare_admin.php", true, true);
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/install/scripts/uploadcare-php", $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/uploadcare/uploadcare-php", true, true);
		
		RegisterModule($this->MODULE_ID);
	}

	function DoUninstall()
	{
		UnRegisterModuleDependences("fileman", "OnBeforeHTMLEditorScriptsGet", $this->MODULE_ID,
		"BitrixUploadcare", "addEditorScriptsHandler" );
		UnRegisterModuleDependences("fileman", "OnIncludeHTMLEditorScript", $this->MODULE_ID,
		"BitrixUploadcare", "OnIncludeHTMLEditorHandler" );	
		
		UnRegisterModuleDependences("iblock", "OnIBlockPropertyBuildList", $this->MODULE_ID, 
		"CUserTypeUploadcare", "GetIBlockPropertyDescription");		
		UnRegisterModuleDependences("main", "OnUserTypeBuildList", $this->MODULE_ID, 
		"CUserTypeUploadcare", "GetUserTypeDescription");		
		
		DeleteDirFilesEx("/bitrix/admin/htmleditor2/uploadcare.js");
		DeleteDirFilesEx("/bitrix/images/fileman/htmledit2/uploadcare.png");
		DeleteDirFilesEx("/bitrix/admin/uploadcare_admin.php");
		DeleteDirFilesEx("/bitrix/tools/uploadcare/uploadcare-php");
		
		UnRegisterModule($this->MODULE_ID);
	}
}
?>
