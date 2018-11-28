{block name="title" prepend}{$LNG.custom_p6}{/block}
{block name="content"}
<!-- BODY-->
<div class="main_b_holder" align="center">

{if $ShowUser.display == 0}
{include file="page.notlogged.default.tpl"}
{else}
{include file="page.logged.default.tpl"}
{/if} <div class="sec_b_holder" align="center">
  <div id="body" align="left">
   <!-- BODY Content start here -->
   
<div class="content_holder">

 <div class="sub-page-title">
  <div id="title"><h1>{$LNG.custom_p6}<p></p><span></span></h1></div>
 </div>
 
  	<div class="container_2" align="center">
    
    	<div class="container_3 references-wide partners" align="left">
        	<!-- Partners -->
				
				<div class="partner-row ddos-guard clearfix">
                	<div class="site-background-image"></div>
                    <div class="row-content">
                    	<a target="_blank" title="www.2moons.cc" href="http://2moons.cc" class="site-backlink">
                        	<i>www.2moons.cc</i>
                        </a>
                    	<div class="site-details">
                            <h1>2Moons</h1>
                            <h2>www.2moons.cc</h2>
                        </div>
                    </div>
                </div>
				
           		<div class="partner-row partner2 clearfix">
                	<div class="site-background-image"></div>
                    <div class="row-content">
                    	<a target="_blank" title="Partner 2" href="#" class="site-backlink">
                        	<i>{$LNG.account_p14}</i>
                        </a>
                    	<div class="site-details">
                            <h1>{$LNG.account_p15}</h1>
                            <h2>{$LNG.account_p16}</h2>
                        </div>
                    </div>
                </div>
				
				

                
            <!-- Partners.End -->
    	</div>
        
    </div>
    
</div>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-references.css?v={$REV}">
{/block}