{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">		
		<div class="btn" onclick="parent.Frame.IFrame.open('alliance');">
			{$LNG.al_back}
		</div>
		<br/><br/>
		<div class="al-block-title">
			{$LNG.alliance_8}		
		</div>
		<div class="al-block-content">
			<div class="al-card-option c-901 tooltip" data-tooltip-content="{$LNG.tech.901}"><div class="al-card-option-ico ri i-901"></div>{$alliance_storage_metal|number}</div>
			<div class="al-card-option c-902 tooltip" data-tooltip-content="{$LNG.tech.902}"><div class="al-card-option-ico ri i-902"></div>{$alliance_storage_crystal|number}</div>
			<div class="al-card-option c-903 tooltip" data-tooltip-content="{$LNG.tech.903}"><div class="al-card-option-ico ri i-903"></div>{$alliance_storage_deuterium|number}</div>
			<div class="al-card-option c-921 tooltip" data-tooltip-content="{$LNG.tech.921}"><div class="al-card-option-ico ri i-921"></div>{$alliance_storage_darkmatter|number}</div>					
			<div class="al-card-option c-941 tooltip" data-tooltip-content="{$LNG.tech.941}"><div class="al-card-option-ico ri i-941"></div>{$alliance_storage_research|number}</div>
			<div class="al-card-option c-942 tooltip" data-tooltip-content="{$LNG.tech.942}"><div class="al-card-option-ico ri i-942"></div>{$alliance_storage_stellar|number}</div>
		</div>	
		
	</div>
	
	<div class="al-right-one">
		<div class="al-content">
			
			<form id="levelUp" method="post" action="?page=alliance">
				<input name="mode" value="development" type="hidden">
				<input name="cmd" value="level" type="hidden">
			</form>
			
                        <div class="al-dev-row bga-b2">
            	<div class="al-dev-row-level">1</div>
            			
				
								<div class="al-dev-row-content">
										<form id="nskillUp1101l1" method="post" action="?page=alliance">
						<input name="mode" value="development" type="hidden">
						<input name="cmd" value="skill" type="hidden">
						<input name="level" value="1" type="hidden">
						<input name="skill" value="1101" type="hidden">
					</form>
					<div class="al-dev-skill-img i-s1101 tooltip cursor-p" data-tooltip-content="
						<div class='tip-text'>
													<div class='tip-bonus'>
							+10%
							 {$LNG.alliancedev.1101} [0 / 30]
							<div>						
												</div>" onclick="Confirm.action(
						'{$LNG.frame_12}',
						'{$LNG.alliance_25} '+1+'?',
						'{$LNG.alliance_24}',
						'{$LNG.buildings_6}',
						'$(\'#nskillUp1101l1\').submit();');">
					</div>
										<form id="nskillUp1102l1" method="post" action="?page=alliance">
						<input name="mode" value="development" type="hidden">
						<input name="cmd" value="skill" type="hidden">
						<input name="level" value="1" type="hidden">
						<input name="skill" value="1102" type="hidden">
					</form>
					<div class="al-dev-skill-img i-s1102 tooltip cursor-p" data-tooltip-content="
						<div class='tip-text'>
													<div class='tip-bonus'>
							+1%
							 {$LNG.alliancedev.1102} [0 / 30]
							<div>						
												</div>" onclick="Confirm.action(
						'{$LNG.frame_12}',
						'{$LNG.alliance_25} '+1+'?',
						'{$LNG.alliance_24}',
						'{$LNG.buildings_6}',
						'$(\'#nskillUp1102l1\').submit();');">
					</div>
									</div>
				<div class="al-dev-row-btns">
					<div class="al-dev-row-right-text">{$LNG.alliance_21}</div>
				</div>
							            </div>
					</div>
	</div>
	
</div>
{/block}
{block name="script" append}
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_alliance}: {$LNG.tech.112}</div>');
</script>
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?{$REV}"></script>
{/block}