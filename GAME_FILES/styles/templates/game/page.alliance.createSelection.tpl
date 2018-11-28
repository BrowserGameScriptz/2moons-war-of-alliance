{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">
    <div id="al-top-nav">
			
		<input class="ally-in-search" type="text" placeholder="{$LNG.alliance_1}" name="searchtext" id="searchtext" value=""> 
		<div class="ally-btn-search btn btn-primary" onClick="searchSend(0);">{$LNG.al_find_submit}</div>

		
		<div class="ally-navigation-search">
        
			<div class="ms-nav-btn ri" >&laquo;</div>		
			
			<div class="ms-nav-btn btn-a" onclick="searchSend(1);">1</div>
			
	
			<div class="ms-nav-btn ri" >&raquo;</div>
		</div> 
		
        		<div class="ally-btn-create btn btn-primary" onClick="Confirm.cost(
			'{$LNG.alliance_2}', 									
			'<form id=\'createform\' method=\'post\' action=\'game.php?page=alliance&amp;mode=create\'>'
				+'<input type=\'hidden\' name=\'action\' value=\'send\' />'			
				+'<label class=\'cm-label\'>{$LNG.al_make_ally_name_required}</label>'
				+'<input class=\'cm-input\' name=\'aname\' maxlength=\'30\' type=\'text\' />'
				+'<label class=\'cm-label\'>{$LNG.al_make_ally_tag_required}</label>'
				+'<input class=\'cm-input\' name=\'atag\' maxlength=\'3\' type=\'text\' />'
			+'</form>',
			'{$min_darkmatter|number}', 
						'{if $min_darkmatter > $darkmatter}$.cookie(\'tab_prem\', \'dm\'); parent.Frame.IFrame.open(\'premium\');{else}$(\'#createform\').submit();{/if}',
				
			921)">
			{$LNG.alliance_2}
		</div>
				
    </div>             
	<div id="al-cards">
				         
				{foreach $AllianceArray as $allyId => $ally}<div class="al-card bga-902">
			<div class="al-card-name ico-flag i-f-eu tooltip" onClick="parent.Dialog.AllyInfo({$allyId});" data-tooltip-content="
				<div class='tip-title'>{$LNG.alliance_3}</div>
				<div class='tip-text'>				
				<p>{$LNG.pl_total}:<span> {$ally.total|number}</span></p>
				<p>{$LNG.pl_fightwon}: 	<span> {$ally.wons|number}  ({$ally.total / 100 * $ally.wons}%)</span></p>
				<p>{$LNG.pl_fightlose}: <span> {$ally.loos|number} ({$ally.total / 100 * $ally.loos}%)</span></p>
				<p>{$LNG.pl_fightdraw}: <span> {$ally.draws|number} ({$ally.total / 100 * $ally.draws}%)</span></p>
				</div>">{$ally.ally_name}</div>
			
			<div class="al-card-img">
								<div class="al-img i-ai1">
	<div class="al-img-tag c-d{$ally.allianceDivision}">{$ally.ally_tag}</div>
</div>
			</div>
			
			<div class="al-card-options">
				<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.al_ally_info_members}"><div class="al-card-option-ico i-member"></div>{$ally.ally_members} / {$ally.ally_max_members}</div>
				<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.playercar_1}"><div class="al-card-option-ico i-arming"></div>{$ally.armementStats|number}</div>
				<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.playercar_2}"><div class="al-card-option-ico i-signs"></div>3 703</div>
				<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.alliance_4}"><div class="al-card-option-ico i-arming"></div>{$ally.ally_request_min_points|number}</div>
			</div>
			
			<div class="al-card-btn btn btn-{if $ally.colorButton == 0}primary{else}danger{/if}" onClick="parent.Dialog.AllyInfo({$allyId});">{$LNG.alliance_5}</div>
			
		</div> {/foreach}                        
			</div>
</div>
<script type="text/javascript">	
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.frame_12}</div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0006"></script>
{/block}