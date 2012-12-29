arButtons['uploadcare'] = [ 'BXButton', {
    id : 'uploadcare',
    iconkit : 'uploadcare.png',
    name : 'uploadcare',
    title : 'Uploadcare',
    handler : function() {
        this.pMainObj.OpenEditorDialog('dd_uploadcare', null, 800);
    }
} ];

if (arGlobalToolbar == undefined) {
    arToolbars['standart'][1].unshift(arButtons['uploadcare']);
} else {
    arGlobalToolbar.unshift(arButtons['uploadcare']);
}

arEditorFastDialogs['dd_uploadcare'] = function(pObj) {
    var __obj = this;

    this.OnClose = function() {
        window.oBXEditorDialog.Close();
    };

    return {
        title : 'Uploadcare',
        innerHTML : '<iframe width="100%" height="100%" src="/bitrix/tools/uploadcare/uploadcare.php" border="0" frameborder="0" style="overflow-y: hidden; overflow-x: scroll;"></iframe>',
        OnLoad : function() {
            window.oBXEditorDialog.SetButtons([window.oBXEditorDialog.btnClose ]);
        }
    };
}