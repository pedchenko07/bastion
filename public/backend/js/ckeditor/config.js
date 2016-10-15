/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    config.filebrowserBrowseUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = 'http://kobra1.loc//admin/templates/js/kcfinder/upload.php?type=flash';
};
