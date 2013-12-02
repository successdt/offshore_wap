(function() {

	tinymce.create('tinymce.plugins.Addshortcodes', {
		init : function(ed, url) {
		
			//Add Video
			ed.addButton('Video', {
				title : 'Add Video',
				cmd : 'tinyVideo',
				image : url + '/images/video.png'
			});
			ed.addCommand('tinyVideo', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=video',width : 600 ,	height : 180 ,	inline : 1});
			});
			

			//Add Audio
			ed.addButton('Audio', {
				title : 'Add Audio file player',
				cmd : 'tinyAudio',
				image : url + '/images/audio.png'
			});
			ed.addCommand('tinyAudio', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=audio',width : 600 ,	height : 200 ,	inline : 1});
			});
			
			//Add Lightbox
			ed.addButton('LightBox', {
				title : 'Add LightBox',
				cmd : 'tinylightbox',
				image : url + '/images/lightbox.png'
			});
			ed.addCommand('tinylightbox', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=lightbox',width : 600 ,	height : 500 ,	inline : 1});
			});
	
			
			//Highlight 
			ed.addButton('highlight', {  
				title : 'Highlight Text',  
				image : url+'/images/highlight.png',  
				onclick : function() {
					//if(ed.selection.getContent().length > 0)				
					ed.selection.setContent('[highlight]' + ed.selection.getContent() + '[/highlight]');  
				}  
			});  			
			
			//dropcap 
						ed.addButton('dropcap', {  
				title : 'Dropcap',  
				image : url+'/images/dropcap.png',  
				onclick : function() {
					//if(ed.selection.getContent().length > 0)				
					ed.selection.setContent(' [dropcap]' + ed.selection.getContent() + '[/dropcap]');  
				}  
			});  
				
			//Checklist
			ed.addButton('checklist', {  
				title : 'Add Check List',  
				image : url+'/images/check.png',  
				onclick : function() { 
					//if(ed.selection.getContent().length > 0)								
					ed.selection.setContent('[checklist]' + ed.selection.getContent() + '[/checklist]');  
				}  
			});  
				  
			//starlist
			ed.addButton('starlist', {  
				title : 'Add Star List',  
				image : url+'/images/star.png',  
				onclick : function() { 
					//if(ed.selection.getContent().length > 0)								
					ed.selection.setContent('[starlist]' + ed.selection.getContent() + '[/starlist]');  
				}  
			});

			
			//Divider
			ed.addButton('divider', {  
				title : 'Add Divider line',  
				image : url+'/images/divider.png',  
				onclick : function() { 
					ed.selection.setContent('[divider]');  
				}  
			});
			
				//AddBoxs
			ed.addButton('AddBox', {
				title : 'Add Box',
				cmd : 'tinyBoxes',
				image : url + '/images/boxes.png'
			});
			ed.addCommand('tinyBoxes', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=box',width : 600 ,	height : 450 ,	inline : 1});
			});	
  			
  			
  			
  			
  				//AddButtons
			ed.addButton('AddButtons', {
				title : 'Add Button',
				cmd : 'tinyButtons',
				image : url + '/images/buttons.png'
			});
			ed.addCommand('tinyButtons', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=buttons',width : 600 ,	height : 260 ,	inline : 1});
			});
			
			//AddFlickr
			ed.addButton('AddFlickr', {
				title : 'Add Photos From FLickr',
				cmd : 'tinyFlickr',
				image : url + '/images/flickr.png'
			});
			ed.addCommand('tinyFlickr', function() {
				ed.windowManager.open({file : url + '/mazaya-ui.php?page=flickr',width : 600 ,	height : 180 ,	inline : 1});
			});
  			
  			
  			
		},
		getInfo : function() {
			return {
				longname : "Fawaniss Shortcodes",
				author : 'Fawaniss',
				authorurl : 'http://www.fawaniss.com/',
				infourl : 'http://www.fawaniss.com/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('mazayaShortCodes', tinymce.plugins.Addshortcodes);	
	
})();