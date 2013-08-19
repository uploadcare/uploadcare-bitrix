<?php
class BitrixUploadcare {
	function addEditorScriptsHandler($editorName, $arEditorParams) {	
		return array("JS" => array("uploadcare.js"));
	}

	function OnIncludeHTMLEditorHandler() {
		$public_key = COption::GetOptionString("uploadcare", "publickey");
		$secret_key = COption::GetOptionString("uploadcare", "secretkey");
		$uploadcare_api = new Uploadcare_Api($public_key, $secret_key);
		
		print '<script type="text/javascript">UPLOADCARE_CROP = true;</script>';
		print $uploadcare_api->widget->getScriptTag();
	}
}