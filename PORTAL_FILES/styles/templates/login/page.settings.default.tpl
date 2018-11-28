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
       		<div class="page-title">{$LNG.account_p2}</div>
       		<a href="index.php?page=account">{$LNG.account_p3}</a>
      	 </div>
      </div>
      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- War Of Alliance / Ingame -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2369063859511778"
     data-ad-slot="3578401527"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br>
      <!-- VOTE -->
      	<div class="vote-page">
            <div class="container_3 account-wide" align="center">
             
            		<ul class="account-settings">
                    	<li>
                        	<a href="index.php?page=settings&mode=changepass">
                        	{$LNG.account_p4}
                            <p>{$LNG.account_p5}</p>
                            </a>
                        </li>
                        <li>
                        	<a href="index.php?page=settings&mode=changemail">
                            {$LNG.account_p6}
                            <p>{$LNG.account_p7}</p>
                            </a>
                        </li>
						<li>
                        	<a href="index.php?page=settings&mode=changedname">
                            {$LNG.account_p18}
                            <p>{$LNG.account_p19}</p>
                            </a>
                        </li>
                    </ul>
             
            </div>
            
            
      	</div>
      <!-- VOTE.End -->
        
    
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