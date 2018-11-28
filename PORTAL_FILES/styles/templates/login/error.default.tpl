{block name="title" prepend}{$LNG.custom_p54}{/block}
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
   

 <div class="sub-page-title">
  <div id="title"><h1>{$LNG.custom_p54}<p></p><span></span></h1></div>
 </div>
 
 <div class="container_2" align="center">
  <div class="vertical_center" align="center">
     
   <div class="container_3" align="center">
   		
        <div class="login-success">
            <h1>{$message}</h1>
            <p>Please wait...</p>
        </div>
   
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
<meta http-equiv="refresh" content="{$gotoinsec}; URL={$goto}">
{/block}