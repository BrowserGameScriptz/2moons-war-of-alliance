{block name="title" prepend}{$LNG.siteTitleScreens}{/block}
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
					<h2>{$LNG.siteTitleScreens}</h2>
                    <h3 class="items-number">({count($mediaArray)})</h3>
                    	<div class="clear"></div>
					<div class="bline"></div>
				</div>
     	
         	<!-- All Screanshots -->
         	<ul class="screanshots all-screanshots screanshots-media-page-two">
						{foreach $mediaArray as $ID => $media}
						<li>
							<a href="uploads/media/screenshots/{$media.mediaLocation}" class="container_frame" rel="shadowbox" title="{$media.mediaTitle}">
								<span class="cframe_inner" style="background-image:url(uploads/media/screenshots/{$media.mediaLocation}); background-size: 100%; background-repeat: no-repeat;"></span>
								<div class="media-zoom-ico"></div>
							</a>
							<div class="screanshot-title-info">{$media.mediaTitle}</div>
						</li>
						{/foreach}
					
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        	
         	<!-- All Screanshots.End -->
	        
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