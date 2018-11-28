{block name="title" prepend}{$LNG.custom_p3}{/block}
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
	  <div id="title"><h1>{$LNG.custom_p28}<p></p><span></span></h1></div>
	 </div>
	 
	 <div class="container_2" align="center" style="padding:30px 40px; width:916px;">
     
     			<div class="media-header">
					<h2>{$LNG.custom_p3}</h2>
                    <h3 class="items-number">({count($mediaArray)})</h3>
                    	<div class="clear"></div>
					<div class="bline"></div>
				</div>
     	
         <!-- All Videos -->

			
					{foreach $mediaArray as $ID => $media}<div class="media-video-container media-all-vids-page" align="left">
						<div class="media-video-thumb container_frame">
							<div class="cframe_inner">
								<a href="index.php?page=media&mode=watchvid&id={$ID}">
								<!--Video THUMB Preview-->
								<div class="image-thumb-preview" style="background-image:url('/uploads/media/movies/{$media.imageBlock}');"></div>
								<div class="play-button-small"></div>
								</a>
							</div>
						</div>
						<div class="video-info">
							<h3>{$media.mediaTitle}</h3>
							<p style="height: auto;">{$media.mediaDescription}

</p>
							<a href="{$media.mediaLocation}" class="youtube-link" target="_blank">{$LNG.custom_p30}</a>
						</div>
						<div class="clear"></div>
					</div>{/foreach}
					           
            <div class="clear"></div>
         <!-- All Videos.End -->
         
         	        
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