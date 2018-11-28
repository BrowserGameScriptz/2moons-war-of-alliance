{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="tr-contint">
	<div id="tr-left" class="bg-g-b">
				{foreach $Tourneys as $ID => $Info}<div class="tr-reward tr-division-{$ID}">
			<div class="tr-title tr-title-division i-ad{$ID}">
				
			</div>
			<div class="tr-reward-content">
				<div class="tr-title">
					{$LNG.st_position} 1
				</div>
								<div class="al-card-option c-{if $Info.typeReward == 1}931{else}921{/if} float-l tooltip" data-tooltip-content="{if $Info.typeReward == 1}{$LNG.tech.931}{else}{$LNG.tech.921}{/if}"><div class="al-card-option-ico ri i-{if $Info.typeReward == 1}931{else}921{/if}"></div>{$Info.priceOne|number}</div>
								<br />
				<div class="clear"></div>
				<div class="tr-title">
					{$LNG.st_position} 2
				</div>
								<div class="al-card-option c-{if $Info.typeReward == 1}931{else}921{/if} float-l tooltip" data-tooltip-content="{if $Info.typeReward == 1}{$LNG.tech.931}{else}{$LNG.tech.921}{/if}"><div class="al-card-option-ico ri i-{if $Info.typeReward == 1}931{else}921{/if}"></div>{$Info.priceTwo|number}</div>
								<br />
				<div class="clear"></div>
				<div class="tr-title">
					{$LNG.st_position} 3
				</div>
								<div class="al-card-option c-{if $Info.typeReward == 1}931{else}921{/if} float-l tooltip" data-tooltip-content="{if $Info.typeReward == 1}{$LNG.tech.931}{else}{$LNG.tech.921}{/if}"><div class="al-card-option-ico ri i-{if $Info.typeReward == 1}931{else}921{/if}"></div>{$Info.priceThree|number}</div>
								<div class="clear"></div>
			</div>
		</div>{/foreach}	
			<div class="tr-btn-old btn" onClick="parent.Frame.IFrame.open('tourney','old');">{$LNG.tourney_3}</div>	
			</div>
	<div id="tr-right">
	<div id="tr-timer">
			 {$LNG.tourney_1}		 
			 <span id="tr-out"  data-time="{$tourneyEnd}"> </span>
			 		</div>
				<div class="tr-division tr-division-1">
			<div class="bh-rows bga-b2">
				<div class="bh-row bh-row-headr">
					<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
					<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.al_name}"></div>
					<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.st_points}"></div>
				</div>
												{foreach $TournayAlpha as $allyID => $Info}<div class="bh-row bh-rank-{$Info@iteration}">
										<div class="bh-row-rank">{$Info@iteration}</div>
					<div class="bh-row-user">
						[{$Info.ally_tag}] {$Info.ally_name}
					</div>
					<div class="bh-row-points">{$Info.desunits|number}</div>
					<div class="btn-transp bh-a" onClick="parent.Dialog.AllyInfo({$allyID});"></div>
				</div>{foreachelse}
				<div class="bh-row bh-rank-0">
					&nbsp;{$LNG.tourney_2}
				</div>{/foreach}
								
									
			</div>
		</div>
		<!---->
				<div class="tr-division tr-division-2">
			<div class="bh-rows bga-b2">
				<div class="bh-row bh-row-headr">
					<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
					<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.al_name}"></div>
					<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.st_points}"></div>
				</div>
								{foreach $TournayBeta as $allyID => $Info}<div class="bh-row bh-rank-{$Info@iteration}">
										<div class="bh-row-rank">{$Info@iteration}</div>
					<div class="bh-row-user">
						[{$Info.ally_tag}] {$Info.ally_name}
					</div>
					<div class="bh-row-points">{$Info.desunits|number}</div>
					<div class="btn-transp bh-a" onClick="parent.Dialog.AllyInfo({$allyID});"></div>
				</div>{foreachelse}
				<div class="bh-row bh-rank-0">
					&nbsp;{$LNG.tourney_2}
				</div>{/foreach}
					
			</div>
		</div>
		<!---->
				<div class="tr-division tr-division-3">
			<div class="bh-rows bga-b2">
				<div class="bh-row bh-row-headr">
					<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
					<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.al_name}"></div>
					<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.st_points}"></div>
				</div>
								{foreach $TournayGamma as $allyID => $Info}<div class="bh-row bh-rank-{$Info@iteration}">
										<div class="bh-row-rank">{$Info@iteration}</div>
					<div class="bh-row-user">
						[{$Info.ally_tag}] {$Info.ally_name}
					</div>
					<div class="bh-row-points">{$Info.desunits|number}</div>
					<div class="btn-transp bh-a" onClick="parent.Dialog.AllyInfo({$allyID});"></div>
				</div>{foreachelse}
				<div class="bh-row bh-rank-0">
					&nbsp;{$LNG.tourney_2}
				</div>{/foreach}
					
			</div>
		</div>
		<!---->
				<div class="tr-division tr-division-4">
			<div class="bh-rows bga-b2">
				<div class="bh-row bh-row-headr">
					<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
					<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.al_name}"></div>
					<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.st_points}"></div>
				</div>
								{foreach $TournayDelta as $allyID => $Info}<div class="bh-row bh-rank-{$Info@iteration}">
										<div class="bh-row-rank">{$Info@iteration}</div>
					<div class="bh-row-user">
						[{$Info.ally_tag}] {$Info.ally_name}
					</div>
					<div class="bh-row-points">{$Info.desunits|number}</div>
					<div class="btn-transp bh-a" onClick="parent.Dialog.AllyInfo({$allyID});"></div>
				</div>{foreachelse}
				<div class="bh-row bh-rank-0">
					&nbsp;{$LNG.tourney_2}
				</div>{/foreach}
					
			</div>
		</div>
		<!---->
				<div class="tr-division tr-division-5">
			<div class="bh-rows bga-b2">
				<div class="bh-row bh-row-headr">
					<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.st_position}"></div>
					<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.al_name}"></div>
					<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.st_points}"></div>
				</div>
								{foreach $TournayEpsilon as $allyID => $Info}<div class="bh-row bh-rank-{$Info@iteration}">
										<div class="bh-row-rank">{$Info@iteration}</div>
					<div class="bh-row-user">
						[{$Info.ally_tag}] {$Info.ally_name}
					</div>
					<div class="bh-row-points">{$Info.desunits|number}</div>
					<div class="btn-transp bh-a" onClick="parent.Dialog.AllyInfo({$allyID});"></div>
				</div>{foreachelse}
				<div class="bh-row bh-rank-0">
					&nbsp;{$LNG.tourney_2}
				</div>{/foreach}
					
			</div>
		</div>
		<!---->
			</div>
</div>

<script type=text/javascript>
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.frame_32}'
        +'</div>'		
		+'<div class="title-tabs">'
					+'<div id="tab-1" class="title-tab" onClick="window.iframe.OpenTab(\'1\');">Alpha</div>'
					+'<div id="tab-2" class="title-tab" onClick="window.iframe.OpenTab(\'2\');">Beta</div>'
					+'<div id="tab-3" class="title-tab" onClick="window.iframe.OpenTab(\'3\');">Gamma</div>'
					+'<div id="tab-4" class="title-tab" onClick="window.iframe.OpenTab(\'4\');">Delta</div>'
					+'<div id="tab-5" class="title-tab" onClick="window.iframe.OpenTab(\'5\');">Epsilon</div>'
				+'</div>'
	);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/tourney.js?{$REV}"></script>
{/block}