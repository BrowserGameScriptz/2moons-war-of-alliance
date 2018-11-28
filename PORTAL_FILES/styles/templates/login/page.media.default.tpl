{block name="title" prepend}{$LNG.custom_p28}{/block}
{block name="content"}
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
	  <div id="title"><h1>{$LNG.custom_p28}<p></p><span></span></h1></div>
	 </div>
	 
	 <div class="container_2" style="padding:30px 40px; width:916px;" align="center">
     
        <!-- Videos -->
        	<div class="media-container flleft half-w" align="left">
            
	            <div class="media-c-header">
	            	<h3>{$LNG.custom_p3}</h3>
	                <a class="view-alll" href="index.php?page=media&mode=allvideos">{$LNG.custom_p29}</a>
	            </div>
            	
							{foreach $mediaArray as $ID => $media}
							{if $media.mediaType == 3}
							<div class="media-video-container" align="left">
								<div class="media-video-thumb container_frame">
									<div class="cframe_inner">
										<a href="index.php?page=media&mode=watchvid&amp;id={$ID}">
										<!--Video THUMB Preview-->
										<div class="image-thumb-preview" style="background-image:url('/uploads/media/movies/{$media.imageBlock}');"></div>
										<div class="play-button-small"></div>
										</a>
									</div>
								</div>
								<div class="video-info">
									<h3>{$media.mediaTitle}</h3>
									<p>{$media.mediaDescription}

</p>
									<a href="{$media.mediaLocation}" class="youtube-link" target="_blank">{$LNG.custom_p30}</a>
								</div>
								<div class="clear"></div>
							</div>
							{/if}
							{/foreach}
            </div>
        <!-- Videos.End -->
        
       <!-- Wallpapers -->
        	<div class="media-container flright half-w" align="left">
            
	            <div class="media-c-header">
	            	<h3>{$LNG.custom_p2}</h3>
	                <a class="view-alll" href="index.php?page=media&mode=allwallpappers">{$LNG.custom_p29}</a>
	            </div>
            
				<ul class="screanshots screanshots-media-page">
					{foreach $mediaArray as $ID => $media}
					{if $media.mediaType == 2}
					<li>
						<a href="index.php?page=media&mode=allwallpappers" class="container_frame" title="{$media.mediaTitle}">
							<span class="cframe_inner" style="background-image:url(uploads/media/wallpaper/{$media.mediaLocation});"></span>
                            <!--<div class="media-zoom-ico"></div>-->
						</a>
					</li>
					{/if}
					{/foreach}
                    <div class="clear"></div>
				</ul>
                
            </div>
        <!-- Wallpapers.End -->
        <div class="clear"></div>
        <br>
        
        <!-- Screanshots -->
        	<div class="media-container flright full-w" align="left">
            
	            <div class="media-c-header">
	            	<h3>{$LNG.siteTitleScreens}</h3>
	                <a class="view-alll" href="index.php?page=media&mode=allscreenshots">{$LNG.custom_p29}</a>
	            </div>
                  
				<ul class="screanshots screanshots-media-page-two">
							{foreach $mediaArray as $ID => $media}
							{if $media.mediaType == 1}
							<li>
								<a href="/uploads/media/screenshots/{$media.mediaLocation}" class="container_frame" rel="shadowbox" title="{$media.mediaTitle}">
									<span class="cframe_inner" style="background-image:url(/uploads/media/screenshots/{$media.mediaLocation}); background-size: 100%; background-repeat: no-repeat;"></span>
		                            <div class="media-zoom-ico"></div>
								</a>
							</li> 
							{/if}
							{/foreach}
                    <div class="clear"></div>
				</ul>
                 <div class="clear"></div>
                
                                
            </div>
            
        <!-- Screanshots.End -->
        <div class="clear"></div>
	        
	 </div>
    
</div>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->

{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-media.css?v={$REV}">
{/block}