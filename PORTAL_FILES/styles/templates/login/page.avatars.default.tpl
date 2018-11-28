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
                    <div class="page-title">{$LNG.custom_p66}</div>
                    <a href="index.php?page=account">{$LNG.account_p3}</a>
                </div>
            </div>
      
            <!-- Store Activity -->
            <div class="store-activity">
            
                <div class="page-desc-holder">
                    {$LNG.custom_p67}
                </div>
                
                <div class="container_3 account-wide" align="center">
                    <div class="avatars_groups">
                    
                    
                        <div class="avatars_group_holder ">
                            <h1>{$LNG.custom_p68}</h1>
                            <ul class="avatars_group">
									<li class="avatar-box"{if $ShowUser.avatar == "logo_avatar.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="0" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/logo_avatar.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_2.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="1" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_2.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_3.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="2" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_3.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_4.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="3" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_4.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_5.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="4" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_5.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_6.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="5" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_6.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_7.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="6" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_7.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_8.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="7" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_8.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_9.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="8" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_9.jpg);"></a>
									</li>
									<li class="avatar-box"{if $ShowUser.avatar == "rookie_avatar_10.jpg"} id="active"{/if}>
										<a href="#" data-avatar-id="9" class="clickable-avatar" style="background-image: url(./styles/resource/avatars/rookie_avatar_10.jpg);"></a>
									</li>
                                <div class="clear"></div>
                            </ul>
                        </div>                    
                    </div>                      
                </div>
                            
            </div>
            <!-- Store Activity.End -->
        
        </div>
    </div>
 
</div>

<script type="text/javascript">
$(function()
{
	$('.clickable-avatar').click(function(e)
	{
		var avatarId = $(this).attr('data-avatar-id');
		
		//prevent clicking on the active one
		if (typeof $(this).parent().attr('id') != 'undefined' && $(this).parent().attr('id') == 'active')
			return false;
		
		//submit the new avatar for change
		$.get(
			$BaseURL + '/ajax.php?phase=16&id=' + avatarId,
			function(data)
			{
				//verify success
				if (data == 'OK')
				{
					//Find the active avatar
					$('.avatar-box#active').attr('id', null);
					//Activate the new
					$('.clickable-avatar[data-avatar-id="' + avatarId + '"]').parent().attr('id', 'active');
				}
				else
				{
					$.fn.WarcryAlertBox('open', '<p>' + data + '</p>');
				}
			}
		);
		
		return false;
	});
});
</script>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-activity-all.css?v={$REV}">
{/block}