var url = document.getElementById('sc_editorUrl').innerHTML;
function sc_show_editor(){
	"use strict";
	tb_show('Insert a Shortcode', url + '&random=' + Math.random() + '&TB_iframe=1');
}

// For adding button in the visual editing toolbox
(function() {
	"use strict";
	tinymce.create('tinymce.plugins.SCButton', {
	
		init : function(ed, url) {	
			ed.addButton('scbutton', {
				title : 'Insert shortcodes',
				image : url + '/icon.png',
				onclick : function() {
					sc_show_editor();
                }
			});	
		},
		
		getInfo : function() {
			return {
				longname : 'WP Nukes Team',
				author : 'Allan Bonds',
				authorurl : 'http://www.fourthwavetech.com/',
				infourl : 'http://www.fourthwavetech.com/',
				version : '1.0'
			};
		}

	});
	
	tinymce.PluginManager.add('fwbutton', tinymce.plugins.SCButton);
})();

// For adding button in the code editing toolbox

if(document.getElementById("ed_toolbar")){
	qt_toolbar = document.getElementById("ed_toolbar");
	edButtons[edButtons.length] = new edButton("ed_scbutton", "WP Socializer", "", "","");
	var qt_button = qt_toolbar.lastChild;
	while (qt_button.nodeType !== 1){
		qt_button = qt_button.previousSibling;
	}
	qt_button = qt_button.cloneNode(true);
	qt_button.value = 'Shortcoder';
	qt_button.title = 'Insert shortcodes by WP Nukes';
	qt_button.onclick = function(){ "use strict"; sc_show_editor(); };
	qt_button.id = "ed_scbutton";
	qt_toolbar.appendChild(qt_button);
}