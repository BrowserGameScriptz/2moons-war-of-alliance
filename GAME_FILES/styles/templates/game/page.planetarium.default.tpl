{block name="title" prepend}{$LNG.lm_notes}{/block}
{block name="content"}
<div id="pt-content">

	<div id="pt-left" class="bg-g-b">
		
		<div id="pt-plaent-info" class="i-p-s-{$image}">
			<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.ov_fields} ({$LNG.gl_diameter} {$LNG.ov_distance_unit}.)" id="ov-i-diameter">
				{$current_fcurr} / {$maxpla_fields} ({$current_pdiam|number})
			</div>
			<div class="ov-info-sep"></div>
			<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.ov_temperature}" id="ov-i-temp">
				{$current_tmax}
			</div>
			<div class="ov-info-sep"></div>
			<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.battlesi_6}" id="ov-i-debris">
				{$current_sum|number}
			</div>
		</div>
		<div class="pt-sep"></div>
		
		<div class="pt-title">{$LNG.planeta_1}</div>
		<div class="pt-list-row tooltip" data-tooltip-content="{$LNG.planetar_8}">
			<div class="pt-list-ico ri i-qb bga-0"></div>
			{if $constructionBonus > 0}+{/if}{$constructionBonus}%
		</div>
		<div class="pt-list-row c-903 i-u3 tooltip" data-tooltip-content="{$LNG.tech.3}">
			{if $deuteriumBonus > 0}+{/if}{$deuteriumBonus}%
		</div>
		<div class="pt-list-row c-911 i-u212 tooltip" data-tooltip-content="{$LNG.tech.212}">
			{if $solarBonus > 0}+{/if}{$solarBonus}%
		</div>
		
	</div><!--pt-left-->
	
	<div id="pt-right" class="bg-g-b">
				<div class="pt-title">{$LNG.planeta_2}</div>
		<form id="planet_tp" action="game.php?page=planetarium&mode=coord" method="POST">
                      
			<label class="pt-label-mini">{$LNG.planeta_3}:</label> <input type="number" class="pt-in-mini" id="sleeve" 	min="1" max="{$max_galaxy}"	name="sleeve" 	value="{$current_pgal}" />
			<div class="clear"></div>
			<label class="pt-label-mini">{$LNG.planeta_4}:</label> <input type="number" class="pt-in-mini" id="system" 	min="1" max="{$max_system}"	name="system"  	value="{$current_psys}" />
			<div class="clear"></div>
			<label class="pt-label-mini">{$LNG.planeta_5}:</label> <input type="number" class="pt-in-mini" id="planets"	min="1" max="{$max_planets}" name="planets"	value="{$current_ppla}" />
			<div class="clear"></div>
			
			<div class="pt-btn queue-btn-complete">
				<div class="queue-btn-complete-t">{$LNG.planeta_6}</div>
				<div class="queue-btn-complete-i i-921 ri"></div>
				<div class="queue-btn-complete-c">{$cost_teleport|number}</div>
				{if $darkmatter < $cost_teleport}
				<div class="btn-transp"	onClick="$.cookie('tab_prem', 'dm'); parent.Frame.IFrame.open('premium');"></div>
				{else}
				<div class="btn-transp"
				onClick="Confirm.cost(
					'{$LNG.galaxie_6}',
					'{sprintf($LNG.galaxie_7, {$cost_teleport|number})}',
					'{$cost_teleport|number}', 
					'$(\'#planet_tp\').submit();', 
					921)">
			</div>{/if}
							</div>				
			
		</form>
		
		<div class="pt-sep"></div>
				
		
		<input class="pt-in-text pt-in-gname" type="text" name="name" id="name" size="12" maxlength="7" autocomplete="off" value="{$current_pname}">
		<div class="pt-btn-gname btn" onClick="GenerateName();">{$LNG.planetar_1}</div>
		<div class="clear"></div>
		<div class="pt-btn btn btn-primary" onclick="checkrename();">{$LNG.planetar_5}</div>
		<div class="pt-sep"></div>		

		<input class="pt-in-text" type="text" name="del_name" id="del_name" size="25" maxlength="20" autocomplete="off" placeholder="{$LNG.planetar_6}">		
		<div class="pt-btn btn btn-danger"
			onClick="Confirm.action(
				'{$LNG.frame_18}',
				'{$LNG.planetar_4}',
				'{$LNG.bd_continue}',
				'{$LNG.buildings_6}',
				'checkcancel();');">
			{$LNG.planetar_7}
		</div>
		
    </div>
		
	</div><!--pt-right-->
		
	<div id="pt-center">
	
	</div><!--pt-center-->
	
</div><!--pt-content-->

{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/planetarium.js?0006"></script>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">{$LNG.planetar_2}</div>'
		+'<div class="title-res tooltip" data-tooltip-content="{$LNG.tech.942}">'
			+'<div class="title-res-ico ri i-942"></div>{$stellarore}'
        +'</div>'
	);
</script>
{/block}