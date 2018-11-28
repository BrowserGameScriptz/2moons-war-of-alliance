{block name="title" prepend}{$LNG.siteTitleNews}{/block}
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
  <div id="title"><h1>{$LNG.siteTitleNews}<p></p><span></span></h1></div>
 </div>
	{if !empty($newsList.title)}
  	<div class="container_2" align="center">
    
    	<div class="container_3 archived-news">
        
        	<!-- News Content -->
    	  		
                
			        <div class="arnews-head" align="left">
			        	<h1>{$newsList.title}</h1>
			            {$newsList.from}
			        </div>
			        
			        <div class="arnews-cont" align="left">
						{$newsList.text}<div class="clear"></div>
			        </div>                
            <!-- News Content.End -->
            
    	</div>
        
        <!-- News Navigation -->
        
        	{if !empty($selectNewer)}<a class="newer-news-btn" href="index.php?page=news&id={$selectNewer}">{$LNG.custom_p50}</a>{/if}            
        	{if !empty($selectOlder)}<a class="older-news-btn" href="index.php?page=news&id={$selectOlder}">{$LNG.custom_p49}</a>{/if}              
            <div class="clear"></div>
        <!-- News Navigation.End -->
        
    </div>
	{else}
	<div class="container_2" align="center">

        <div class="container_3 under-construction" align="left">
        <div class="holder">
            <h5>{$LNG.custom_p51}...<span></span></h5>
            <h4><span><p class="there-is-nothing">{$LNG.custom_p52}</p></span></h4>
        </div>
    </div>
        </div>{/if}
    
</div>

</div>

   <!-- BODY Content end here -->
   </div>
  </div>

 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-news.css?v={$REV}">
{/block}