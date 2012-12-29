<?php
class Uploadcare
{
	function addEditorScriptsHandler($editorName, $arEditorParams) {
		return array( "JS" => array("uploadcare.js"));
	}

	function OnIncludeHTMLEditorHandler() {
		print("<script type=\"text/javascript\" src=\"/bitrix/js/main/ajax.js\"></script>");
	}
}