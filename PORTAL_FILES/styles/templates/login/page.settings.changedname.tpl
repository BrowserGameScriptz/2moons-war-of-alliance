{block name="title" prepend}{$LNG.account_p1}{/block}
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
	<div id="title"><h1>{$LNG.account_p1}<p></p><span></span></h1></div>
  
    <div class="quick-menu">
    	<a class="arrow" href="#"></a>
        <ul class="dropdown-qmenu">
        	<li><a href="index.php?page=recruit">{$LNG.account_p29}</a></li>
        	<li><a href="index.php?page=settings&mode=changepass">{$LNG.account_p4}</a></li>
        	<li><a href="index.php?page=settings&mode=changemail">{$LNG.account_p6}</a></li>
        	<li><a href="index.php?page=settings&mode=changedname">{$LNG.account_p18}</a></li>
        	{if $ShowUser.authlevel > 1}<li><a href="index.php?page=news&mode=create">{$LNG.account_p30}</a></li>
        	<li><a href="index.php?page=changelogs&mode=create">{$LNG.account_p31}</a></li>{/if}
        </ul>
    </div>
</div>
 
  	<div class="container_2 account" align="center">
     <div class="cont-image">

      
      <div class="container_3 account_sub_header">
         <div class="grad">
       		<div class="page-title">{$LNG.account_p18}</div>
       		<a href="index.php?page=account">{$LNG.account_p3}</a>
      	 </div>
      </div>
      
      <!-- Store Activity -->
      	<div class="store-activity">
        
       		<div class="page-desc-holder">
				{$LNG.account_p20}
            </div>
            
            <div class="container_3 account-wide" align="center">
            	
                <p style="padding: 20px;">
                <form method="post">
                	
                    <div class="row row-fix">
                   	<label for="displayName">{$LNG.account_p21}:</label>
                    <input type="text" name="displayName" />
                    </div>

                    
                    <br/>
                    <input style="left:10px;" type="submit" value="{$LNG.account_p13}" /><br /><br /><br />
                    
                </form>
                </p>
                            
            </div>
                        
      	</div>
      <!-- Store Activity.End -->
        
     </div>
	</div>
 
</div>

</div>

   <!-- BODY Content end here -->
   </div>
  </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-account-settings.css?v={$REV}">
{/block}