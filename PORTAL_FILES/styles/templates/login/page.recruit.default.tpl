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
  	<style> .quick-menu:hover .dropdown-qmenu { height:212px !important; }</style>
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
       		<div class="page-title">{$LNG.account_p29}</div>
       		<a href="index.php?page=account">{$LNG.account_p3}</a>
      	 </div>
      </div>
      
      <!-- VOTE -->
      	<div class="vote-page">
      		
       		<div class="page-desc-holder">
				{$LNG.account_p36}

            </div>
            
            <div class="container_3 account-wide" align="center">
             
             	<br/><br/>
                
             	<!-- RECRUIT Link -->
                <div class="recruit-link-holder">
                	<h2>{$LNG.account_p35}</h2>
                	<div class="recruit-link">
						<div class="email-link">
								<input type="text" disabled="disabled" value="https://www.warofalliance.eu/index.php?ref={$loginId}" id="raf-hash" />
							</div>                        <a href="javascript: void(0);" id="raf-hash-btn"></a>
                	</div>
                </div>
                
                <!-- RECRUITED -->
                
                <div class="recruited">
                	    
                        <!-- ACTIVE Referals -->              
                		<ul class="active-recruited-members">
                        
                        	<li class="arm-title"><h2>{$LNG.account_p32}</h2></li>
							<li class="tab-header"><h3>{$LNG.custom_p32}</h3><h4>{$LNG.account_p28}</h4><p>{$LNG.account_p26}</p></li>
                            {foreach $activeRecruit as $playerId => $recruitActive}
                            <li class="active-link" id="link{$playerId}"><h3>{$recruitActive.recruitName}</h3><h4>{$recruitActive.recruitReg}</h4><p id="status_text">{$recruitActive.recruitOn}</p></li>
							{foreachelse}
                            <li><strong><p class="raf-no-records">{$LNG.account_p34}</p></strong></li>   
							{/foreach}
                    	</ul>
                        
                        <!-- PENDING Referals -->              
                		<ul class="active-recruited-members pending-ref">
                        
                        	<li class="arm-title"><h2>{$LNG.account_p33}</h2></li>
							<li class="tab-header"><h3>{$LNG.custom_p32}</h3><h4>{$LNG.account_p28}</h4><p>{$LNG.account_p26}</p></li>
							{foreach $inactiveRecruit as $playerId => $recruitInactive}
                            <li class="pending-link" id="link{$playerId}"><h3>{$recruitInactive.recruitName}</h3><h4>{$recruitInactive.recruitReg}</h4><p id="status_text">{$recruitInactive.recruitOn}</p></li>
							{foreachelse}
                            <li><strong><p class="raf-no-records">{$LNG.account_p34}</p></strong></li>   
							{/foreach}
                    	</ul> 
                        
                        <div class="referal-pending-info">
                        	
                        </div>
                                        
                </div>
             
            </div>
            
      	</div>
      <!-- VOTE.End -->
        
     </div>
	</div>
 
</div>
 
</div>

<script type="text/javascript" src="styles/resource/scripts/login/ZeroClipboard.js"></script>
<script type="text/javascript">
	$(function()
	{
		//Create a new clipboard client
		var clip = new ZeroClipboard.Client();

		//Glue the clipboard client to the last td in each row
		clip.glue($('#raf-hash-btn')[0]);

		//Grab the text from the parent row of the icon
		var txt = $('#raf-hash').val();
		clip.setText(txt);

		//Add mouseover event
		clip.addEventListener('mouseover', function()
		{
			$('#raf-hash-btn').addClass('mouseover');
		});
		//add mouseout event
		clip.addEventListener('mouseout', function()
		{
			$('#raf-hash-btn').removeClass('mouseover');
		});
	});                               
</script>

   <!-- BODY Content end here -->
   </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-recruit-a-friend.css?v={$REV}">
<script type="text/javascript" src="styles/resource/scripts/login/page.recruit.a.friend.js"></script>
{/block}