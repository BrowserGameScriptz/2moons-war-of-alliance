{block name="title" prepend}{$LNG.lm_galaxy}{/block}
{block name="content"}
<div id="galaxy-content">
	
	<div id="gl-container">
		<div id="gl-rows">
			{for $planet=1 to $max_planets}
			{if !isset($GalaxyRows[$planet])}
			<div class="gl-s"></div>
						<div class="gl-row">
	<div class="gl-n tooltip" data-tooltip-content="
		<div class='tip-title'>{$LNG.planeta_1}</div>
		<div class='tip-text'>
{$LNG.planetar_8}: {$array1.$planet}<br />
{$LNG.tech.3}: {$array2.$planet}<br />
{$LNG.tech.212}: {$array3.$planet}<br />
		</div>
	"><a href="game.php?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=7">{$planet}</a></div>
	
	<div class="gl-planet">
		<div class="gl-img i-p-s-no gl-img-80"></div>
	</div>
	{if $coloships > 0}<div class="gl-planet-name">
		<a class="gl-colony" href="game.php?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=7" title="">{$LNG.type_mission_7}</a>
	</div>{/if}
	<div class="gl-moon"></div>
	<div class="gl-player"></div>

</div>
{elseif $GalaxyRows[$planet] === false}
<div class="gl-s"></div>
						<div class="gl-row">
	<div class="gl-n tooltip" data-tooltip-content="
		<div class='tip-title'>{$LNG.planeta_1}</div>
		<div class='tip-text'>
{$LNG.planetar_8}: {$array1.$planet}<br />
{$LNG.tech.3}: {$array2.$planet}<br />
{$LNG.tech.212}: {$array3.$planet}<br />
		</div>
	">{$planet}</div>
	
	<div class="gl-planet">
		<div class="gl-img i-p-s-no gl-img-80"></div>
	</div>
	<div class="gl-planet-name gl-destroyed">{$LNG.gl_planet_destroyed}</div>
	<div class="gl-moon"></div>
	<div class="gl-player"></div>

</div>
{else}
<div class="gl-s"></div>		
						<div class="gl-row">
	<div class="gl-n tooltip" data-tooltip-content="
		<div class='tip-title'>{$LNG.planeta_1}</div>
		<div class='tip-text'>
{$LNG.planetar_8}: {$array1.$planet}<br />
{$LNG.tech.3}: {$array2.$planet}<br />
{$LNG.tech.212}: {$array3.$planet}<br />
		</div>
	">{$planet}</div>
		{$currentPlanet = $GalaxyRows[$planet]}
		<div class="gl-planet">
		<div class="gl-img i-p-s-{$currentPlanet.planet.image} gl-img-87 tooltip" data-tooltip-content="{$LNG.gl_planet} {$currentPlanet.planet.name} [{$galaxy}:{$system}:{$planet}]"></div>		
		<div class="gl-actions">
			<table class='gl-actions-t'>	
			<tbody>
			<tr>		
						{if $currentPlanet.missions.6}<td><div class='gl-actions-i ri i-mis6 tooltip' 
				onClick='javascript:doit(6,{$currentPlanet.planet.id}, {$currentPlanet.planet.galaxy}, {$currentPlanet.planet.system}, {$currentPlanet.planet.planet}, {$spyShips|json});' data-tooltip-content="{$LNG.type_mission_6}"></div></td>{/if}

						{if $currentPlanet.missions.1}<td><a class='gl-actions-i ri i-mis1 tooltip' 
				href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=1' data-tooltip-content="{$LNG.type_mission_1}"></a>
			</td>{/if}
						
						{if $currentPlanet.missions.4}<td><a class='gl-actions-i ri i-mis4 tooltip' 
				href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=4' data-tooltip-content="{$LNG.type_mission_4}"></a>
			</td>{/if}
						
						{if $currentPlanet.missions.3}<td><a class='gl-actions-i ri i-mis3 tooltip' 
				href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=3' data-tooltip-content="{$LNG.type_mission_3}"></a>
			</td>{/if}

						{if $currentPlanet.missions.5}<td><a class='gl-actions-i ri i-mis5 tooltip' 
				href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=5' data-tooltip-content="{$LNG.type_mission_5}"></a>
			</td>{/if}

						{if $currentPlanet.missions.10}<td><a class='gl-actions-i ri i-mis10 tooltip' 
				href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;mission=10' data-tooltip-content="{$LNG.type_mission_10}"></a>
			</td>{/if}
										
				
			</tr>
			</tbody>
			</table>
		</div>
	</div>
	
	<div class="gl-planet-name">
		{$currentPlanet.planet.name} {$currentPlanet.lastActivity}
	</div>

	<div class="gl-moon">
		{if $currentPlanet.moon}		
		<div class="gl-planet">
			<div class="gl-img i-p-s-m1 gl-img-57 tooltip" data-tooltip-content="
				<div class='tip-title'>{$LNG.gl_moon} {$currentPlanet.moon.name} [{$galaxy}:{$system}:{$planet}]</div>
				<div class='tip-text'>
					<span>{$LNG.gl_diameter}</span>: {$currentPlanet.moon.diameter|number}<br />
					<span>{$LNG.gl_temperature}</span>: {$currentPlanet.moon.temp_min}
				</dib>
			"></div>		
			<div class="gl-actions">
				<table class="gl-actions-t">	
				<tbody>
				<tr>		
								{if $currentPlanet.missions.6}<td><div class="gl-actions-i ri i-mis6 tooltip" onclick="doit(6,{$currentPlanet.moon.id});" data-tooltip-content="{$LNG.type_mission_6}"></div>
				</td>{/if}
								{if $currentPlanet.missions.1}<td><a class="gl-actions-i ri i-mis1 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=1" data-tooltip-content="{$LNG.type_mission_1}"></a>
				</td>{/if}
								{if $currentPlanet.missions.3}<td><a class="gl-actions-i ri i-mis3 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=3" data-tooltip-content="{$LNG.type_mission_3}"></a>
				</td>{/if}
								
								{if $currentPlanet.missions.4}<td><a class="gl-actions-i ri i-mis4 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=4" data-tooltip-content="{$LNG.type_mission_4}"></a>
				</td>{/if}
				
								{if $currentPlanet.missions.5}<td><a class="gl-actions-i ri i-mis5 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=5" data-tooltip-content="{$LNG.type_mission_5}"></a>
				</td>{/if}
				
								{if $currentPlanet.missions.9}<td><a class="gl-actions-i ri i-mis9 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=9" data-tooltip-content="{$LNG.type_mission_9}"></a>
				</td>{/if}
				
								{if $currentPlanet.missions.10}<td><a class="gl-actions-i ri i-mis10 tooltip" href="?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype==3&amp;mission=10" data-tooltip-content="{$LNG.type_mission_10}"></a>
				</td>{/if}
												</tr>
				</tbody>
				</table>
			</div>
		</div>{/if}
			</div>

		{if $currentPlanet.debris}
		<div class="gl-debris i-d-s-1 tooltip" data-tooltip-content="
		<div class='tip-title'>
		{$LNG.gl_debris_field} [{$galaxy}:{$system}:{$planet}]</div>
		<div class='tip-text'>
			<span>{$LNG.tech.901}</span>: <span class='c-901'>{$currentPlanet.debris.metal|number}</span><br />
			<span>{$LNG.tech.902}</span>: <span class='c-902'>{$currentPlanet.debris.crystal|number}</span>
		</div>
	">
				{if $currentPlanet.missions.8}<a class='btn-transp' href='?page=flight&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=2&amp;mission=8'></a>{/if}
			</div>
			{/if}
		<div class="gl-player">
				<div class="gl-player-name">
			<span class="gl-username-{foreach $currentPlanet.user.class as $class}{if !$class@first} {/if}{$class}{/foreach} ">
				{$currentPlanet.user.username}
			</span>

				{if !empty($currentPlanet.user.class)}
				<br />(
						{foreach $currentPlanet.user.class as $class}{if !$class@first}&nbsp;{/if}<span class="gl-short gl-short-{$class}">{$ShortStatus.$class}</span>{/foreach}
						)
				{/if}
						
					</div>
		<div class="btn-transp tooltip" onClick="parent.Dialog.Playercard({$currentPlanet.user.id});" data-tooltip-content="{$currentPlanet.user.playerrank}">
			
		</div>
			</div>
	<div class="gl-ally">
				{if $currentPlanet.alliance}<div class="btn-transp tooltip" data-tooltip-content="{$LNG.gl_alliance}: {$currentPlanet.alliance.name}<br>{$currentPlanet.alliance.member}" onclick="parent.Dialog.AllyInfo({$currentPlanet.alliance.id});">
			<span class="c-diplo-0">{$currentPlanet.alliance.tag}</span>
		</div>{/if}
			</div>

</div><!--/gal-row-->
{/if}
{/for}
<div class="gl-s"></div>		
					</div>
	</div>
	
	<div id="gl-control-bg" class="bg-g-b">
	
		<div id="gl-control">
			<div class="gl-available">
				<div class="gl-available-title">{$LNG.galaxie_1}:</div>
				<div class="gl-available-row">
					<div class="gl-available-i i-u210 tooltip" data-tooltip-content="{$LNG.gl_avaible_spyprobes}"></div>
					<div class="gl-available-t">{$spyprobes|number}</div>
				</div>
				<div class="clear"></div>
				<div class="gl-available-i i-i ri bga-i tooltip" data-tooltip-content="{$LNG.galaxie_2}"></div>
				<input class="gl-available-t" min="1" max="99999999" value="{$spyShips2}" onchange="$.cookie('spycount', $(this).val());" type="number">
			</div>
			
			
			<div class="gl-form">
				<div class="gl-form-title">{$LNG.gl_galaxy}</div>
				<div class="gl-form-row">
					<div class="gl-form-btn"><div class="btn btn-primary i-p-prev" onClick="sleeveLeft()"></div></div>
					<div class="gl-form-btn gl-form-btn-r"><div class="btn btn-primary i-p-next" onClick="sleeveRight()"></div></div>
					<input id="sleeve" type="text" class="gl-form-input" value="{$galaxy}" maxlength="3" tabindex="1"  />
				</div>
				<div class="gl-form-title">{$LNG.gl_solar_system}</div>
				<div class="gl-form-row">
					<div class="gl-form-btn"><div class="btn btn-primary i-p-prev" onClick="systemLeft()"></div></div>
					<div class="gl-form-btn gl-form-btn-r"><div class="btn btn-primary i-p-next" onClick="systemRight()"></div></div>
					<input id="system" type="text" class="gl-form-input" value="{$system}" maxlength="3" tabindex="2" />
				</div>
				<div class="gl-form-row" onClick="ShowRows();">
					<div class="btn btn-primary">{$LNG.gl_show}</div>
				</div>
			</div>		
			
		</div>
	</div>
</div>
	
<script type="text/javascript">
	status_ok		= '{$LNG.gl_ajax_status_ok}';
	status_fail		= '{$LNG.gl_ajax_status_fail}';
	MaxFleetSetting = 3;
	MaxGalaxy		= 1;
	MaxSleeve		= {$max_galaxy};
	MaxSystem		= {$max_system};
	var FlagCaptcha	= false;
	
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.lm_galaxy}'
        +'</div>'	
	);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/galaxy.js?{$REV}"></script>
{/block}