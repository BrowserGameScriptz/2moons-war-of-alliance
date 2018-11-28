{block name="title" prepend}{$LNG.siteTitleRules}{/block}
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
  <div id="title"><h1>Rules & Regulations<p></p><span></span></h1></div>
 </div>
 
  	<div class="container_2" align="center">
    
    	<div class="container_3 archived-news terms-of-use" align="left">
        	<!-- Rules -->
				{$rules}
				<br>
                <div class="important">
                	<span>
                        {$LNG.custom_p53}
                    </span>
                    <p>!</p>
                </div>


            <!-- Rules.End -->
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
<link rel="stylesheet" href="styles/resource/css/login/page-terms-of-use.css?v={$REV}">
{/block}