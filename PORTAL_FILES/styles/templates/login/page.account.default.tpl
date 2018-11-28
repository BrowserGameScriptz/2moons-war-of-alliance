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
    	<div id="title">
        	<h1>{$LNG.account_p1}<p></p><span></span></h1>
        </div>
        
			    </div>

  	<div class="container_2 account" align="center">
     	<div class="cont-image">

            <!-- Errors -->
            
    		<!-- Main Account info -->
        	<div class="container_3 account_light_cont account_info_cont" align="left">
         		<div class="account_info" align="left">

            		
					<ul class="account_avatar">
						<li id="avatar"><span style="background:url(uploads/avatars/no_avatar.png) no-repeat; background-size: 100%;"></span><p></p></li>
						<li id="change_avatar"><a href="index.php?page=avatars">{$LNG.account_p24}</a></li>
					</ul>

					<ul class="account_info_main">
						<li id="displayname"><span>{$LNG.custom_p32}:</span><p>{$ShowUser.displayname}</p></li>
						<li><span>{$LNG.loginUsername}:</span><p>{$ShowUser.username}</p></li><br/>
						<li><span>{$LNG.registerEmail}:</span><p>{$ShowUser.email}</p></li>
					</ul>

					<ul class="account_info_second">
						<li><span>{$LNG.account_p25}:</span><p><a href="index.php?page=recruit">{$Countref|number}</a></p></li>
						<br/>
						<li><span>{$LNG.account_p26}:</span><p>{$ShowUser.lastLoginDat}</p></li>
						<li><span>{$LNG.account_p27}:</span><p>{$ShowUser.lastip}</p></li>
						<br/>
						<li><span>{$LNG.account_p28}:</span><p>{$ShowUser.registerdate}</p></li>
					</ul>
            		<div class="clear"></div>
         		</div>
        	</div>
        	<!-- Main Account info.End -->

        	<!-- Main Account menu -->
        	<ul id="accoun_panel_menu">
			<br>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- War Of Alliance / Ingame -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2369063859511778"
     data-ad-slot="3578401527"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
        		

            </ul>
            <!-- Main Account menu.End -->

        	<!-- Quick account menu -->
	        <ul class="quick_acc_menu">
            	<li><a href="index.php?page=recruit">{$LNG.account_p29}<p></p><span></span></a></a>
	        	<li><a href="index.php?page=settings&mode=changepass">{$LNG.account_p4}<p></p><span></span></a></li>
	            <li><a href="index.php?page=settings&mode=changemail">{$LNG.account_p6}<p></p><span></span></a></li>
	            <li><a href="index.php?page=settings&mode=changedname">{$LNG.account_p18}<p></p><span></span></a></li>
	            {if $ShowUser.authlevel > 1}<li><a href="index.php?page=news&mode=create">{$LNG.account_p30}<p></p><span></span></a></li>
	            <li><a href="index.php?page=changelogs&mode=create">{$LNG.account_p31}<p></p><span></span></a></li>{/if}
	        </ul>
	    	<!-- Quick account menu.End -->

        	<div class="clear"></div>

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
<link rel="stylesheet" href="styles/resource/css/login/page-activity-all.css?v={$REV}">
{/block}