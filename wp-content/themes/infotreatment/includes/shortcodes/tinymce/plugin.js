(function($) {
	"use strict";
	//Shortcodes
	tinymce.PluginManager.add( 'zillaShortcodes', function( editor, url ) {
		editor.addCommand("zillaPopup", function ( a, params )
			{	
				var popup = params.identifier;
				tb_show("Insert Awesome Shortcode", url + "/popup.php?popup=" + popup + "&width=" + 800);
			});
     
		editor.addButton( 'zilla_button', {
			type: 'splitbutton',
			icon: false,
			title: 'Insert Awesome Shortcode',
			onclick : function(e) {},
				menu: [
					{text: 'Alerts',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Alerts',identifier: 'alert'})
					}},
					{text: 'Buttons',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Buttons',identifier: 'buttons'})
					}},
					{text: 'Columns',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Columns',identifier: 'columns'})
					}},
					{text: 'Lists',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Lists',identifier: 'lists'})
					}},
					{text: 'Horizontal Line',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Horizontal Line',identifier: 'line'})
					}},
					{text: 'Clear',onclick:function(){
						editor.execCommand("zillaPopup", false, {title: 'Clear',identifier: 'clear'})
					}},
					//List your shortcodes like this
				]
		});
	});
 
})(jQuery);