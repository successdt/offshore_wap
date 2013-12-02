jQuery(document).ready(function($){
    "use strict";                  
	$(function() {
		$( "#accordion" ).accordion({heightStyle: "content"});
	});
	
	$('.btn_insert').click(function(){
		var params = '';
		var scname = $(this).attr('data-name');
		var sc = '';
		var attr = '';
		var val = '';
		
		$(this).parent().find('input[type="text"], select').each(function(){
			if($(this).val() !== ''){
				attr = $(this).attr('data-param');
				val = $(this).val();
				params += attr + '="' + val + '" ';
			}
		});
		
		var textarea = $(this).parent().find('textarea[name="content"]');
		
		if(wsc(scname)){
			name = '"' + scname + '"';
		}else{
			name = scname;
		}
		
		if(textarea.val() !== undefined){
			sc = '[fw_' + name + ' ' + params + ']'+$(textarea).val() + '[/fw_'+name+']';
		}else{
			sc = '[fw_' + name + ' ' + params + ']';
		}

		if(sc !== '') {parent.send_to_editor(sc);}
	});
});

var sc_closeiframe = function($){
	"use strict";
	$('.sc_share_iframe').remove();
};

function wsc(s){
	"use strict";
	if(s === null){
		return '';
	}
	return s.indexOf(' ') >= 0;
}