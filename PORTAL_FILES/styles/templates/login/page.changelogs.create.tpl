{block name="title" prepend}{$LNG.custom_p7}{/block}
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

<!-- Main Side -->
<div class="main_side">

	<div class="article">
        <div class="comments">
        	
            
					<!-- if logged in -->
						<div class="post_comment">
							<form method="post" action="index.php?page=changelogs&mode=create" id="quick-comment">
								<textarea placeholder="Type in your changelog..." name="text" id="textarea"></textarea>
								<input type="submit" value="Add changelog" />
							</form>
						</div>
					 <!-- if logged in.end -->            
            <div class="comments-cont">
            	
                                
           	</div>
            
                        
        </div>
        
    </div>
	    
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
            <p><font color="#817464">www.warofalliance.eu</font></p>
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
                                <p class="realm-desc">{$usersOnline}</p>
                            </div>
                        
                    </div>
                <!-- REALM.End -->    	

        
    	
        
       	<div class="logon-status">
        	<div id="logon-status">
            	<h3>LOGON Status: <br> {if $game_disable == 1}<p class="status online" id="logon-status2">Online</p>{else}<p class="status offline" id="logon-status2">Offline</p>{/if}</h3>
                
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
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5&appId=1448348818558410";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <div id="fb-root">
<div class="fb-page" data-href="https://www.facebook.com/warofalliance2" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/warofalliance2"><a href="https://www.facebook.com/warofalliance2">War of Alliance : The Game</a></blockquote></div></div>
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
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-articles.css?v={$REV}">
{/block}