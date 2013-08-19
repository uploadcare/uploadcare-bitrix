<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/tools/uploadcare/uploadcare-php/uploadcare/lib/5.2/Uploadcare.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
$public_key = COption::GetOptionString("uploadcare", "publickey");
$secret_key = COption::GetOptionString("uploadcare", "secretkey");
$uploadcare_api = new Uploadcare_Api($public_key, $secret_key);

$file_id = $_GET['file_id'];
$file = $uploadcare_api->getFile($file_id);
$file->store();
print 'OK';