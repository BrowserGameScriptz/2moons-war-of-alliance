{block name="title" prepend}{$LNG.siteTitleIndex}{/block}
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


	<div class="important_notice">
		<p><a href="index.php?page=application"><b>{$LNG.custom_p14}</b></a></p>
	</div>
	
<!-- Main Side -->
<div class="main_side">
 
<!-- Index News -->
<div class="index_news">
   
   	<div class="welcome_to_warcry">
    	<h1>{$LNG.custom_p15}</h1>
		<span></span>
        <p>
        {$LNG.custom_p16}
        </p>
    </div>
   	
	<div class="news_container">
    	
		<div class="header">
			<div class="header_left">
				{$LNG.custom_p17}
				<span class="title_overlay"></span>
			</div>
			<div class="header_right">
				<ul>
					<li><a href="index.php?page=news">{$LNG.custom_p18}</a></li>
					<li><a href="index.php?page=changelogs">{$LNG.custom_p7}</a></li>
				</ul>
			</div>
			<div class="clear"></div>
		</div>
        
		
		{foreach $newsList as $News}
		{if $News@first}
        <div class="active_latest_news">
        
			
				<div class="news_thumb_image">
					<a href="?page=news&amp;id={$News.id}"><img src="uploads/news/{$News.id}.png"></a>
					<span class="news-img-overlay"></span>
				</div>
				<div class="news_content">
					<h1>{$News.title}</h1>
					<h4>{$News.from}</h4>
					<p>{$News.text}</p>
					<a class="readn_ln" href="?page=news&amp;id={$News.id}">{$LNG.custom_p19}</a>
				</div>
				<div class="clear"></div>            
        </div>{/if}{/foreach}
        
        <ul class="older_news">
					{foreach $newsList as $News}
					{if !$News@first}
					<li>
						<div class="news_left_column">
							<h2><a href="?page=news&amp;id={$News.id}">{$News.title}</a></h2>
							<h4>{$News.from}</h4>
						</div>
						<div class="news_right_column">
							<a class="readn_ln" href="?page=news&amp;id={$News.id}">{$LNG.custom_p19}</a>
						</div>
						<div class="clear"></div>
					</li>{/if}{/foreach}        </ul>
    
	</div>
    
</div>
<!-- Index News.End -->

	<!-- SOCIAL Media -->
	<div class="social-media home_container">
        <div class="media-buttons-holder"><!-- Media buttons holder -->
        		
                        
		         <!-- Facebook -->
		         <div class="media-wrapp">
                    <div class="media-button-holder">
                    
	                 	<!-- New Media Button look -->
	                 	<div class="facebook media-new-design" id="facebook-button">
                        	<div class="button-container">
	                    		<div class="new-design-left-part"><p class="icon " id="facebook-icon"></p></div>
                                <div class="fb-like fb_iframe_widget" data-href="http://www.facebook.com/Official.Heroes.WoW" data-send="false" data-width="500" data-show-faces="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=234697176687896&amp;container_width=0&amp;href=http%3A%2F%2Fwww.facebook.com%2FOfficial.Heroes.WoW&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=500"><span style="vertical-align: bottom; width: 500px; height: 20px;"><iframe name="fc7ceba83279d8" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" style="border: medium none; visibility: visible; width: 500px; height: 20px;" src="https://www.facebook.com/plugins/like.php?app_id=234697176687896&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2FXBwzv5Yrm_1.js%3Fversion%3D42%23cb%3Df36c2a7ac54124c%26domain%3Dheroes-wow.com%26origin%3Dhttps%253A%252F%252Fheroes-wow.com%252Fff8231b2807204%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fwww.facebook.com%2FOfficial.Heroes.WoW&amp;locale=en_US&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=500" class="" width="500px" height="1000px" frameborder="0"></iframe></span></div>                            </div>
	                        <div class="new-design-count-cont">
                                <span id="facebook-likes-counter">36534</span>								<span id="text">Likes</span>
                           	</div>
	                    </div>
                        <!-- New Media Button look.End -->
                        
                    </div>
		         </div>
		            
		         {*<!-- TWITTER -->
		         <div class="media-wrapp">
                    <div class="media-button-holder">
                    
	                 	<!-- New Media Button look -->
	                 	<div class="twitter media-new-design" id="twitter-button">
                        	<div class="button-container">
	                    		<div class="new-design-left-part"><p class="icon " id="twitter-icon"></p></div>
                                 <iframe id="twitter-widget-0" scrolling="no" allowtransparency="true" class="twitter-follow-button twitter-follow-button-rendered" style="position: static; visibility: visible; width: 234px; height: 20px;" title="Twitter Follow Button" src="https://platform.twitter.com/widgets/follow_button.7bf2b0e802ada47dae9548b7a1739fed.en.html#dnt=false&amp;id=twitter-widget-0&amp;lang=en&amp;screen_name=HeroesWoW&amp;show_count=true&amp;show_screen_name=true&amp;size=m&amp;time=1498590976433" data-screen-name="HeroesWoW" frameborder="0"></iframe>                            </div>
	                        <div class="new-design-count-cont">
                            	<p class="arrow"></p>
                                <span id="twitter-follows-counter"></span>								<span id="text">Followers</span>
                            </div>
	                    </div>
                        <!-- New Media Button look.End -->
                        
                    </div>
		         </div>*}

				 
				 <div class="clear"></div>
         
         </div><!-- Media buttons holder.END -->
	</div>
 	<!-- SOCIAL Media.End -->

    <!-- MEDIA -->
    
    	<div class="home_media home_container">
        
        	<div class="new_trailer">
            	<div class="sub_header">
                	<h1>{$LNG.custom_p20}</h1>
                    <a href="index.php?page=media&mode=allvideos">{$LNG.custom_p21}</a>
                    <div class="clear"></div>
					<span class="title_overlay"></span>
                </div>
                <div class="new_video_thumb">
                
							<a title="{$mediaInfo.mediaTitle}" href="index.php?page=media&mode=watchvid&amp;id={$mediaInfo.mediaId}">
								<!--Video THUMB Preview-->
								<div class="image-thumb-preview" style="background-image:url('uploads/media/movies/{$mediaInfo.imageBlock}');"></div>
								<div class="play-button-small"></div>
							</a>                    </div>
                    
                    <div class="sub_header sreenshots">
                        <h1>{$LNG.custom_p22}</h1>
                        <a href="index.php?page=media&mode=allscreenshots">{$LNG.custom_p23}</a>
                        <div class="clear"></div>
						<span class="title_overlay"></span>
                	</div>
                    
                    
					<!-- Screenshots -->
					<ul class="screanshots home_scr">
							{foreach $mediaArray as $ID => $Media}<li>
								<a href="uploads/media/screenshots/{$Media.mediaLocation}" class="container_frame" rel="shadowbox" title="{$Media.mediaTitle}">
									<span class="cframe_inner" style="background-image:url(uploads/media/screenshots/{$Media.mediaLocation}); background-repeat: no-repeat; background-size:121%;"></span>
								</a>
							</li>{/foreach}
							<div class="clear"></div>
					</ul>                
            </div>
        </div>
    
    <!-- MEDIA.End -->
    
    <!-- TOP VOTERS -->
        <div class="top_voters home_container">
            <div class="sub_header">
                <h1>{$LNG.custom_p24}</h1>
				<span class="title_overlay"></span>
            </div>
            
            <div class="cont_container">
            
            	<ul class="top_voters_list">
                
						<li>
							<p>1</p>
							<a href="index.php?page=profile&amp;uid=630429">Demo</a>
							<span>0 <i>Votes</i></span>
						</li>
										</ul>
				
                <div class="gift_box">
                	<div class="gift_image"></div>
                    <h2>
                    {$LNG.custom_p26}
                    </h2>
                </div>
            
            </div>
            
        </div>
    <!-- TOP VOTERS.End -->
    
    <div class="clear"></div>
    
</div>
<!-- Main side.End-->


<!-- Sidebar -->
<div class="sidebar">
	
		<div class="realmlist home_container">
            {if count($languages) > 1}
				
				{foreach $languages as $langKey => $langName}
				<a href="#" onclick="javascript:setLNG('{$langKey}', '?lang={$langKey}')" rel="alternate" hreflang="{$langKey}" title="{$langName}"><img src="uploads/flags/{$langKey}.png" width="33px" height="33px"></a>
				{/foreach}
				
			{/if}
        </div>
        <div class="realmlist home_container">
            <p><font color="#817464">warofalliance.com</font></p>
        </div>
    <!-- REALMLIST.End -->

  
  	<div class="index-status-container home_container">

		<!-- REALM -->
                    <div class="realm_st realm_st_pandaria">

                            <div class="realmst_head">
                                <div class="realm_name">
                                    <span id="realm-status-1" class="online">
                                        <script>
                                            $(function()
                                            {
                                                WarcryQueue('onload').add(function()
                                                {
                                                    updateRealmStatus(1);
                                                });
                                            });
                                        </script>
                                    </span>
                                    War Of Alliance [U1]
                                </div>
                                <p class="realm-desc">213 players are online</p>
                            </div>
                        
                    </div>
                <!-- REALM.End -->    	

        
    	
        
       	<div class="logon-status">
        	<div id="logon-status">
            	<script>
				$(function()
				{
					WarcryQueue('onload').add(function()
					{
						updateLogonStatus();
					});
				});
				</script>
            	<h3>LOGON Status: <br><p class="status online" id="logon-status2">Online</p></h3>
                <!--<p>2 days 2 hours 52 min Uptime</p>-->
            </div>
            <div id="server-time">
            	<script>
					ServerTimeCloack();
				</script>
            	<span>Server Time</span>
                <p id="server-time-cloack"></p>
            </div>
        </div>
    </div>

    <div class="spotlight home_container">
    	
        
			<div class="sub_header">
				<h1>{$LNG.custom_p27}</h1>
				<div class="title_overlay"></div>
			</div>
    
			
				<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=1433738693595658";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="fb-root">
<div class="fb-page" data-href="https://www.facebook.com/XteriumTheGame" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/XteriumTheGame"><a href="https://www.facebook.com/XteriumTheGame">Xterium : The Game</a></blockquote></div></div>
     </div>
				
			
				      
	</div>
    
</div>


<!-- Sidebar.End -->

<div class="clear"></div>

</div>

<!-- Include Social APIs -->
<div id="fb-root" class=" fb_reset"></div>
<script>
    
 $(function() {
  $('.vote-inf').on("click", function(){
    if( $(this).hasClass("active") ){
      $(this).removeClass("active");
    } else {
      $(this).addClass("active");
    }
  });
  
});
function setLNG(LNG, Query) {
	var nom = 'lang';
	document.cookie = nom + "=" + LNG;
	
	if(typeof Query === "undefined")
		document.location.reload();
	else
		document.location.href = "index.php"+Query;
}    
</script>
   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}