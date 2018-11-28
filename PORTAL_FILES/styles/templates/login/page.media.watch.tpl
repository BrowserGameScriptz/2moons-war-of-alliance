{block name="title" prepend}Media{/block}
{block name="content"}
<!-- BODY-->
<div class="main_b_holder" align="center">

{if $ShowUser.display == 0}
{include file="page.notlogged.default.tpl"}
{else}
{include file="page.logged.default.tpl"}
{/if}
 <div class="sec_b_holder" align="center">
  <div id="body" align="left">
   <!-- BODY Content start here -->
   

<div class="content_holder">
    <div class="sub-page-title">
    	<div id="title"><h1>Media<p></p><span></span></h1></div>
    </div>
	<div class="container_2" align="center" style="padding:30px 75px; width:846px;">
     
        <div class="media-header">
            <h2>VIDEOS</h2>
            <div class="clear"></div>
            <div class="bline"></div>
        </div>
   
		
					<!-- VIDEO Frame -->
					<video id="movie-frame" 
						class="video-js vjs-default-skin warcry-skin" 
						controls 
						preload="auto" 
						width="846" height="476" 
						poster="uploads/media/movies/{$mediaInfo.imageBlock}"
						data-setup="{}"><source src="uploads/media/movies/{$mediaInfo.mediaLocation2}" type="video/mp4">
					</video>
					<!-- VIDEO Frame.End -->
	
					<!-- VEDEO Info -->
					<div class="open-video-info">
						<h3>{$mediaInfo.mediaTitle}</h3>
						<p>{$mediaInfo.mediaDescription}</p>
					</div>
				<!-- Other Media Items  (Videos/Screanshots/Wallpapers) -->       
	</div>
</div>

<script type="text/javascript">
$(document).ready(function()
{
	if (typeof $RunMovieSlider != 'undefined' && $RunMovieSlider)
	{
		$("#slider").mopSlider({
			'w':846,
			'h':150,
			'sldW':842,
			'btnW':200,
			'indi':"",
			'shuffle':0
		});
	}
});
$(window).load(function()
{
	//Posters fix for chrome and IE
	$('.vjs-poster').css('display', 'block');
});
</script>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-media.css?v={$REV}">
{/block}