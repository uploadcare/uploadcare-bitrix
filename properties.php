<?php
class CUserTypeUploadcare {
	function GetUserTypeDescription() {
		return array(
			"USER_TYPE_ID" => "uploadcare", 
			"CLASS_NAME" => "CUserTypeUploadcare", 
			"DESCRIPTION" => "Uploadcare", 
			"BASE_TYPE" => "string"
		);
	}

	function GetIBlockPropertyDescription() {
		return array(
			"PROPERTY_TYPE" => "S", 
			"USER_TYPE" => "uploadcare", 
			"DESCRIPTION" => "Uploadcare",
			'GetPropertyFieldHtml' => array('CUserTypeUploadcare', 'GetPropertyFieldHtml'), 
			'GetAdminListViewHTML' => array('CUserTypeUploadcare', 'GetAdminListViewHTML'),
			'ConvertToDB'          => array('CUserTypeUploadcare', 'ConvertToDB'),
		);
	}

	function GetDBColumnType($arUserField)
	{
		global $DB;
		switch(strtolower($DB->type))
		{
			case "mysql":
				return "text";
			case "oracle":
				return "varchar2(2000 char)";
			case "mssql":
				return "varchar(2000)";
		}
	}

	function ConvertToDB($arProperty, $value)
	{
		$value = $value['VALUE'];
		if (strpos($value, 'ucarecdn.com')) {
			$parts = parse_url($value);
			$path = $parts['path'];
			$path_parts = explode('/', $path);
			$file_id = $path_parts[1];
		} else {
			$file_id = $value;
		}
		$public_key = COption::GetOptionString("uploadcare", "publickey");
		$secret_key = COption::GetOptionString("uploadcare", "secretkey");
		$uploadcare_api = new Uploadcare_Api($public_key, $secret_key);		
		$file = $uploadcare_api->getFile($file_id);
		$file->store();	
		$arResult = array('VALUE' => $value);
		return $arResult;
	}

	function getViewHTML($name, $value) {
		return '';
	}

	function getEditHTML($name, $value, $is_ajax = false) {
		$public_key = COption::GetOptionString("uploadcare", "publickey");
		$secret_key = COption::GetOptionString("uploadcare", "secretkey");
		$uploadcare_api = new Uploadcare_Api($public_key, $secret_key);		
		$result = $uploadcare_api->widget->getInputTag($name, array('value' => $value));
		return $result;
	}

	function GetEditFormHTML($arUserField, $arHtmlControl) {
		return self::getEditHTML($arHtmlControl['NAME'], $arHtmlControl['VALUE'], false);
	}

	function GetAdminListEditHTML($arUserField, $arHtmlControl) {
		return self::getViewHTML($arHtmlControl['NAME'], $arHtmlControl['VALUE'], true);
	}

	function GetAdminListViewHTML($arProperty, $value, $strHTMLControlName) {
		return self::getViewHTML($strHTMLControlName['VALUE'], $value['VALUE']);
	}

	function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName) {
		return $strHTMLControlName['MODE'] == 'FORM_FILL' ? self::getEditHTML($strHTMLControlName['VALUE'], $value['VALUE'], false) : self::getViewHTML($strHTMLControlName['VALUE'], $value['VALUE']);
	}

}
?>