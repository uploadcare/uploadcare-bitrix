<?
if(!$USER->IsAdmin())
	return;

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/options.php");

$module_id = "uploadcare";

$aTabs = array(
		array("DIV" => "edit1", "TAB" => GetMessage("MAIN_TAB_SET"), "ICON" => "ib_settings", "TITLE" => GetMessage("MAIN_TAB_TITLE_SET")),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if($REQUEST_METHOD=="POST" && strlen($Update.$Apply.$RestoreDefaults)>0 && check_bitrix_sessid())
{
	$publickey = $_REQUEST['publickey'];
	$secretkey = $_REQUEST['secretkey'];
	COption::SetOptionString($module_id, "publickey", $publickey);
	COption::SetOptionString($module_id, "secretkey", $secretkey);
} else {
	$publickey = COption::GetOptionString($module_id, "publickey");
	$secretkey = COption::GetOptionString($module_id, "secretkey");
}

$tabControl->Begin();
?>

<form method="post"
	action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=urlencode($mid)?>&amp;lang=<?echo LANGUAGE_ID?>">
	<?$tabControl->BeginNextTab();?>

	<tr class="heading">
		<td valign="top" colspan="2"><div>You can get your own account for Uploadcare at <a href="https://uploadcare.com/accounts/create/">https://uploadcare.com/accounts/create/</a></div></td>
	</tr>

	<tr>
		<td>Public Key</td>
		<td><input type="text" id="uploadcare_publickey" name="publickey" value="<?php echo $publickey;?>" /></td>
	</tr>
	<tr>
		<td>Secret Key</td>
		<td><input type="text" id="uploadcare_secretkey" name="secretkey" value="<?php echo $secretkey; ?>" /></td>
	</tr>	

	<?$tabControl->Buttons();?>
	<input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>"
		title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>">
	<?=bitrix_sessid_post();?>
	<?$tabControl->End();?>
</form>