{block name="title" prepend}{$LNG.custom_p2}{/block}
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
					<h2>{$LNG.custom_p2}</h2>
                    <h3 class="items-number">({count($mediaArray)})</h3>
                    	<div class="clear"></div>
					<div class="bline"></div>
				</div>
         <!-- All Wallpapers -->
         
         <ul class="screanshots all-wallpapers screanshots-media-page">
					{foreach $mediaArray as $ID => $media}
					<li>
						<a href="uploads/media/wallpaper/{$media.mediaLocation}" target="_blank" class="container_frame" title="{$media.mediaTitle}">
							<span class="cframe_inner" style="background-image:url(uploads/media/wallpaper/{$media.mediaLocation});"></span>
                            <div class="media-zoom-ico"></div>
						</a>
                        	<div class="wallpaper-info">
                            	<h2>{$media.mediaTitle}</h2>
                                <div class="dw-res-links">
									<a href="uploads/media/wallpaper/{$media.mediaLocation}" target="_blank"></a>
                                </div>
                            </div>
					</li>
                    {/foreach}
                
                    <div class="clear"></div>
				</ul>
         	
        	
         <!-- All Wallpapers.End -->
	        
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