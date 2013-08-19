arButtons['uploadcare'] = ['BXButton', {
	id : 'uploadcare',
	iconkit : 'uploadcare.png',
	name : 'uploadcare',
	title : 'Uploadcare',
	handler : function() {
		var editor = this;
		var dialog = uploadcare.openDialog().done(function(file) {
			file.done(function(fileInfo) {
				_file_id = fileInfo.uuid;
				url = fileInfo.cdnUrl;
				dialog_path = '/bitrix/admin/uploadcare_admin.php?file_id=' + _file_id;				
			   	BX.ajax.get(dialog_path, false, function() {
					if (fileInfo.isImage) {
						editor.pMainObj.insertHTML('<img src="' + url + '" />');
					} else {
						editor.pMainObj.insertHTML('<a href="' + url + '">' + fileInfo.name + '</a>');
					}
			   	});
			});
		});
	}
}];

if (arGlobalToolbar == undefined) {
	arToolbars['standart'][1].unshift(arButtons['uploadcare']);
} else {
	arGlobalToolbar.unshift(arButtons['uploadcare']);
}