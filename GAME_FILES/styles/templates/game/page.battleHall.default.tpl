{block name="title" prepend}{$LNG.lm_topkb}{/block}
{block name="content"}
<div id="bh-contint">

	<div class="bh-conteiner float-r">
		
		<div class="bh-title">{$LNG.battlhall_1}</div>
		
		<div class="bh-rows bga-b2">
			<div class="bh-row bh-row-headr">
				<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.ov_place}"></div>
				<div class="bh-row-users i-st-vs tooltip" data-tooltip-content="{$LNG.tkb_owners}">
					<a class="btn-transp" href="game.php?page=battleHall&order=owner&sort={if $sort == "ASC"}DESC{else}ASC{/if}"></a>
				</div>
				<div class="bh-row-date i-st-date tooltip" data-tooltip-content="{$LNG.tkb_datum}">
					<a class="btn-transp" href="game.php?page=battleHall&order=date&sort={if $sort == "ASC"}DESC{else}ASC{/if}"{if $order == "date"} style="font-weight:bold;"{/if}></a>
				</div>
				<div class="bh-row-units i-st-total tooltip" data-tooltip-content="{$LNG.tkb_units}">
					<a class="btn-transp" href="game.php?page=battleHall&order=units&sort={if $sort == "ASC"}DESC{else}ASC{/if}"{if $order == "units"} style="font-weight:bold;"{/if}></a>
				</div>
			</div>
									{foreach $TopKBList as $row}<div class="bh-row bh-rank-{$row@iteration}">
				<div class="bh-row-rank">{$row@iteration}</div>
				<div class="bh-row-users">					
									<span class="c-{if $row.result == "a"}green{else}red{/if} float-l">{$row.attacker}</span>
					<span class="c-{if $row.result == "r"}green{else}red{/if} float-r">{$row.defender}</span>
									VS
				</div>
				<div class="bh-row-date">{$row.date}</div>
				<div class="bh-row-units">{$row.units|number}</div>
				<a class="btn-transp bh-a" href="CombatReport.php?mode=battlehall&amp;raport={$row.rid}" target="_blank"></a>
			</div>{/foreach}
												
									
		</div>
	</div><!--/.bh-conteiner-->

	<div class="bh-conteiner">
		<div class="bh-title">{$LNG.battlhall_2}</div>
		<div class="bh-rows bga-b2">
			<div class="bh-row bh-row-headr">
				<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.ov_place}"></div>
				<div class="bh-row-users i-st-vs tooltip" data-tooltip-content="{$LNG.tkb_owners}"></div>
				<div class="bh-row-date i-st-date tooltip" data-tooltip-content="{$LNG.tkb_datum}"></div>
				<div class="bh-row-units i-st-total tooltip" data-tooltip-content="{$LNG.tkb_units}"></div>
			</div>
						{foreach $TopKBList10 as $row}<div class="bh-row bh-rank-{$row@iteration}">
				<div class="bh-row-rank">{$row@iteration}</div>
				<div class="bh-row-users">					
									<span class="c-{if $row.result == "a"}green{else}red{/if} float-l">{$row.attacker}</span>
					<span class="c-{if $row.result == "r"}green{else}red{/if} float-r">{$row.defender}</span>
									VS
				</div>
				<div class="bh-row-date">{$row.date}</div>
				<div class="bh-row-units">{$row.units|number}</div>
				<a class="btn-transp bh-a" href="CombatReport.php?mode=battlehall&amp;raport={$row.rid}" target="_blank"></a>
			</div>{/foreach}
						
					
		</div>
		<!---->
		<div class="bh-title">{$LNG.battlhall_3}</div>
		<div class="bh-rows bga-b2">
			<div class="bh-row bh-row-headr">
				<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.ov_place}"></div>
				<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.op_username}"></div>
				<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.ov_points}"></div>
			</div>
						{foreach $TopKBListUnit as $ID => $Data}<div class="bh-row bh-rank-{$Data.Counting}">
				<div class="bh-row-rank">{$Data.Counting}</div>
				<div class="bh-row-user">
					{$Data.username}
				</div>
				<div class="bh-row-points">{$Data.desunits|number}</div>
				<div class="btn-transp bh-a" onClick="parent.Dialog.Playercard({$ID}, '{$Data.username}');"></div>
			</div>{/foreach}			
							
					
		</div>
		<!---->
		<div class="bh-title">{$LNG.battlhall_4}</div>
		<div class="bh-rows bga-b2">
			<div class="bh-row bh-row-headr">
				<div class="bh-row-rank i-st-rank tooltip" data-tooltip-content="{$LNG.ov_place}"></div>
				<div class="bh-row-user i-st-user tooltip" data-tooltip-content="{$LNG.op_username}"></div>
				<div class="bh-row-points i-st-total tooltip" data-tooltip-content="{$LNG.ov_points}"></div>
			</div>
						
						{foreach $TopKBListWars as $ID => $Data}<div class="bh-row bh-rank-{$Data.Counting}">
				<div class="bh-row-rank">{$Data.Counting}</div>
				<div class="bh-row-user">
					{$Data.username}
				</div>
				<div class="bh-row-points">{$Data.pointofwar|number}</div>
				<div class="btn-transp bh-a" onClick="parent.Dialog.Playercard({$ID}, '{$Data.username}');"></div>
			</div>{/foreach}	
			
						
		</div>
		<!---->
	</div><!--/.bh-conteiner-->
  	
	<div class="clear"></div>
</div>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_topkb}</div>');	
</script>
{/block}