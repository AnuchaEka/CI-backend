//<![CDATA[
    CKEDITOR.replace( 'txteditor',{
        toolbar: [
                { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
                { name: 'styles', items: [ 'Styles', 'Format' ] },
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
                { name: 'tools', items: [ 'Maximize' ] },
                { name: 'editing', items: [ 'Scayt' ] }
            ],
              
    // อยากกำหนดอะไรก็ใส่ที่นี่
    filebrowserBrowseUrl : baseurl+'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=images',
	filebrowserUploadUrl : baseurl+'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=images',
	filebrowserImageBrowseUrl : baseurl+'assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr=images'
    } );
    //]]>