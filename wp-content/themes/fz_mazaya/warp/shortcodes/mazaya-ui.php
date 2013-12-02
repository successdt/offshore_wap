<?php
$page = htmlentities($_GET['page']); ?>
<!DOCTYPE html>
<head>
		<script type="text/javascript" src="../../../../../wp-admin/load-scripts.php?c=1&load=jquery"></script>
	<script type="text/javascript" src="../../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script type="text/javascript" src="../../../../../wp-includes/js/jquery/jquery.js"></script>
	
	
	<link rel='stylesheet' href='shortcodes.css' type='text/css' media='all' />
<?php if( $page == 'box' ){ ?>
	<script type="text/javascript">
		var AddBoxes = {
			e: '',
			init: function(e) {
				AddBoxes.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var BoxType = jQuery('#BoxType').val();
				var BoxTitle = jQuery('#BoxTitle').val();
				var BoxIcon = jQuery('#BoxIcon').val();
				var Boxalign = jQuery('#Boxalign').val();
				var BoxClass = jQuery('#BoxClass').val();
				var BoxWidth = jQuery('#BoxWidth').val();
				var BoxContent = jQuery('#BoxContent').val();

				var output = '[box ';
		
				if(BoxType) {
					output += 'type="'+BoxType+'" ';
				}
				if(BoxTitle) {
					output += 'title="'+BoxTitle+'" ';
				}
				if(BoxIcon) {
					output += 'icon="'+BoxIcon+'" ';
				}
				if(Boxalign) {
					output += 'align="'+Boxalign+'" ';
				}
				if(BoxClass) {
					output += 'class="'+BoxClass+'" ';
				}
				if(BoxWidth) {
					output += 'width="'+BoxWidth+'" ';
				}

				output += ']'+BoxContent+'[/box]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddBoxes.init, AddBoxes);

	</script>
	<title>Add Box</title>

</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="BoxType">Type of the box :</label>
		<select id="BoxType" name="BoxType">
			<option value="shadow">Shadow</option>
			<option value="green">Green</option>
			<option value="blue">blue</option>
			<option value="green">green</option>
			<option value="red">red</option>
			<option value="yellow">yellow</option>
		</select>
	</p>
	
	
	
		<p>
		<label for="BoxTitle">Box Title :</label>
		<input id="BoxTitle" name="BoxTitle" type="text" value="" />
	</p>
	

	
		<p>
		<label for="BoxIcon">Box Title Icon:</label>
		<input id="BoxIcon" name="BoxIcon" type="text" value="" />
	</p>
	</p>
	<p>
		<label for="BoxWidth">Box Width :</label>
		<input id="BoxWidth" name="BoxWidth" type="text" value="" />
	</p>
	<p>
		<label for="BoxContent">Content : </label>
		<textarea id="BoxContent" name="BoxContent" col="20"></textarea>
	</p>
	<p><a class="add" href="javascript:AddBoxes.insert(AddBoxes.e)">Insert code</a></p>
</form>

<?php
} elseif( $page == 'buttons' ){
 ?>
 	<script type="text/javascript">
		var AddButtons = {
			e: '',
			init: function(e) {
				AddButtons.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var ButtonColor = jQuery('#ButtonColor').val();
				var Buttonsize = jQuery('#Buttonsize').val();
				var Buttonlink = jQuery('#Buttonlink').val();
				var Buttontext = jQuery('#Buttontext').val();
				var Buttontarget = jQuery('#Buttontarget').val();

				var output = '[button ';
				
				if(ButtonColor) {
					output += 'color="'+ButtonColor+'" ';
				}
				if(Buttonsize) {
					output += 'size="'+Buttonsize+'" ';
				}
				if(Buttonlink) {
					output += 'link="'+Buttonlink+'" ';
				}
				if(Buttontarget) {
					output += 'target="blank" ';
				}


				output += ']'+Buttontext+'[/button]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddButtons.init, AddButtons);

	</script>
	
	<title>Add Buttons</title>

</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="ButtonColor">Type of the box :</label>
		<select id="ButtonColor" name="ButtonColor">
			<option value="red">Red</option>
			<option value="orange">Orange</option>
			<option value="blue">Blue</option>
			<option value="green">Green</option>
			<option value="black">Black</option>
			<option value="gray">Gray</option>
		</select>
	</p>
	<p>
		<label for="Buttonsize">Button Size :</label>
		<select id="Buttonsize" name="Buttonsize">
			<option value="small">Small</option>
			<option value="medium">Medium</option>
			<option value="big">Big</option>
		</select>
	</p>
	<p>
		<label for="Buttonlink">Button Link :</label>
		<input id="Buttonlink" name="Buttonlink" type="text" value="http://" />
	</p>
	<p>
		<label for="Buttontarget">Open Link in a new window : </label>
		<input id="Buttontarget" name="Buttontarget" type="checkbox" value="true" />
	</p>
	</p>
	<p>
		<label for="Buttontext">Button Text :</label>
		<input id="Buttontext" name="Buttontext" type="text" value="" />
	</p>

	<p><a class="add" href="javascript:AddButtons.insert(AddButtons.e)">Insert code</a></p>
</form>
  
<?php } elseif( $page == 'flickr' ){ ?>

	<script type="text/javascript">
		var AddFlickr = {
			e: '',
			init: function(e) {
				AddFlickr.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var FlickrID = jQuery('#FlickrID').val();
				var Photos = jQuery('#Photos').val();
				var PhotosOrder = jQuery('#PhotosOrder').val();


				var output = '[flickr ';
				
				if(FlickrID) {
					output += 'id="'+FlickrID+'" ';
				}
				if(Photos) {
					output += 'number="'+Photos+'" ';
				}
				if(PhotosOrder) {
					output += 'orderby="'+PhotosOrder+'" ';
				}

				output += ']';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddFlickr.init, AddFlickr);

	</script>
	<title>Add Photos From Flickr</title>

</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="FlickrID">Your account Id</label>
		<input id="FlickrID" name="FlickrID" type="text" value="" />
		<small>(get it from <a href="http://www.idgettr.com">idGettr</a>)</small>

	</p>
	<p>
		<label for="Photos">Number of photos :</label>
		<input id="Photos" name="Photos" type="text" value="" />

	</p>
	<p>
		<label for="PhotosOrder">Sorting : </label>
		<select id="PhotosOrder" name="PhotosOrder">
			<option value="latest">Most recent</option>
			<option value="random">Random selection</option>
		</select>
	</p>
	<p><a class="add" href="javascript:AddFlickr.insert(AddFlickr.e)">Insert code</a></p>
	</form>

<?php } elseif( $page == 'audio' ){ ?>

	<script type="text/javascript">
		var AddAudio = {
			e: '',
			init: function(e) {
				AddAudio.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var mp3Url = jQuery('#mp3Url').val();


				var output = '[audio ';
				
				if(mp3Url) {
					output += 'mp3="'+mp3Url+'" ';
				}				
		

				output += ']';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(AddAudio.init, AddAudio);

	</script>
	<title>Add Mp3 Player</title>

</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="mp3Url">Mp3 file Url : </label>
		<input id="mp3Url" name="mp3Url" type="text" value="" />
	</p>
	
	<p><a class="add" href="javascript:AddAudio.insert(AddAudio.e)">Insert code</a></p>
</form>



<?php } elseif( $page == 'lightbox' ){ ?>

	<script type="text/javascript">
		var Addlightbox = {
			e: '',
			init: function(e) {
				Addlightbox.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var ImgLink = jQuery('#ImgLink').val();
				var ImgTitle = jQuery('#ImgTitle').val();
				var ImgContent = jQuery('#ImgContent').val();
				var Imgimage = jQuery('#Imgimage').val();
                var ImgWidth = jQuery('#ImgWidth').val();
                var ImgHeight = jQuery('#ImgHeight').val();
                var ImgTransition = jQuery('#ImgTransition').val();
               


				var output = '[lightbox';
				
				if(ImgLink) {
					output += ' link="'+ImgLink+'"';
				}
				if(ImgTitle) {
					output += ' title="'+ImgTitle+'"';
				}
		
					if(ImgWidth) {
					output += ' width="'+ImgWidth+'"';
				}
				
					if(ImgHeight) {
					output += ' height="'+ImgHeight+'"';
				}
				
						if(ImgTransition) {
					output += ' transition="'+ImgTransition+'"';
				}
				
				
				

				output += ']'+ ImgContent + '[/lightbox]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}
		}
		tinyMCEPopup.onInit.add(Addlightbox.init, Addlightbox);

	</script>
	<title>Add LightBox</title>

</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="ImgLink"> Image or Youtube / Vimeo Video URL : </label>
		<input id="ImgLink" name="ImgLink" type="text" value="http://" />

	</p>
	<p>
		<label for="ImgTitle">Title : </label>
		<input id="ImgTitle" name="ImgTitle" type="text" value="" />

	</p>
	
	
		<p>
		<label for="ImgTransition">Type of the transition:</label>
		<select id="ImgTransition" name="ImgTransition">
			<option value="fade">Fade</option>
			<option value="elastic">Elastic</option>
			<option value="none">None</option>
		</select>
	</p>
	
	
		<p>
		<label for="ImgWidth">Ligtbox Width : </label>
		<input id="ImgWidth" name="ImgWidth" type="text" value=""></input>
	</p>
	
		<p>
		<label for="ImgHeight">Ligtbox Height : </label>
		<input id="ImgHeight" name="ImgHeight" type="text" value=""></input>
	</p>
	
	<p>
		<label for="ImgContent">Content : </label>
		<textarea id="ImgContent" name="ImgContent" cols="45" rows="5" ></textarea>
	</p>
	
	<p><a class="add" href="javascript:Addlightbox.insert(Addlightbox.e)">insert into post</a></p>
</form>

<?php } elseif( $page == 'video' ){ ?>

	<script type="text/javascript">
		var AddVideo = {
			e: '',
			init: function(e) {
				AddVideo.e = e;
				tinyMCEPopup.resizeToInnerSize();
			},
			insert: function createGalleryShortcode(e) {

				var VideoUrl = jQuery('#VideoUrl').val();
				var width = jQuery('#width').val();
				var height = jQuery('#height').val();
				var output = '[video ';
					
				if(width) {
					output += 'width="'+width+'" ';
				}
				if(height) {
					output += 'height="'+height+'" ';
				}

				output += ']'+ VideoUrl + '[/video]';
				tinyMCEPopup.execCommand('mceReplaceContent', false, output);
				tinyMCEPopup.close();
				
			}}
		tinyMCEPopup.onInit.add(AddVideo.init, AddVideo);

	</script>
	<title>Add Video</title>
</head>
<body>
<form id="GalleryShortcode">
	<p>
		<label for="VideoUrl" style="width:230px">Youtube or Vimeo / Dailymotion Video Url : </label>
		<input id="VideoUrl" name="VideoUrl" type="text" value="http://" />

	</p>
	<p>
		<label for="width">Width :</label>
		<input style="width:40px;" id="width" name="width" type="text" value="" />
	</p>
	<p>
		<label for="height">Height :</label>
		<input style="width:40px;"  id="height" name="height" type="text" value="" />
	</p>

	
	<p><a class="add" href="javascript:AddVideo.insert(AddVideo.e)">Insert code</a></p>
</form>

<?php } ?>

</body>
</html>