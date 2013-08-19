<?
global $MESS, $DOCUMENT_ROOT;

include $_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/uploadcare/uploadcare-php/uploadcare/lib/5.2/Uploadcare.php";
include $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php";

CModule::AddAutoloadClasses(
    'uploadcare',
    array(
        'BitrixUploadcare' => 'classes/bitrix_uploadcare.php',
   )
);

include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/uploadcare/properties.php");
?>