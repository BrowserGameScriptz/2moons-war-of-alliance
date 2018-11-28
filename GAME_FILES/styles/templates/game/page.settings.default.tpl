{block name="title" prepend}{$LNG.lm_options}{/block}
{block name="content"}
<div id="st-settings" class="full-scroll">
	<form id="form" action="?page=settings&amp;mode=send" method="post">
	<div class="sg-part float-l bga-b2">
		
		<div class="sg-title">
			{$LNG.settings_1}
		</div>
		
		<label class="sg-label">{$LNG.op_lang}</label>
		<select name="language" class="sg-select">
		{html_options options=$Selectors.lang selected=$userLang}
		</select>
		<div class="clear"></div>
		
		<label class="sg-label">{$LNG.op_timezone}</label>
		<select name="timezone" class="sg-select">
		{html_options options=$Selectors.timezones selected=$timezone}
		</select>
		<div class="clear"></div> 
		<label class="sg-label">{$LNG.op_sort_planets_by}</label>
		<select name="planetSort" class="sg-select">
		{html_options options=$Selectors.Sort selected=$planetSort}
		</select>
		<div class="clear"></div> 
		<label class="sg-label">{$LNG.op_sort_kind}</label>
		<select name="planetOrder" class="sg-select">
		{html_options options=$Selectors.SortUpDown selected=$planetOrder}
		</select>
		
		<div class="clear"></div>
		<label for="vacationID" class="sg-label tooltip" data-tooltip-content="{$LNG.op_activate_vacation_mode_descrip}">{$LNG.op_activate_vacation_mode}</label>
				<input class="sg-checkbox" id="vacationID" name="vacation" type="checkbox" value="1">
					
		<div class="clear"></div> 
	</div><!--/sg-part-->
	
	<div class="sg-part float-r bga-b2">
		
		<div class="sg-title">
			{$LNG.settings_2}
		</div>
					
		<div class="clear"></div> 
		<label class="sg-label">{$LNG.option_3}</label>
		<select name="sirena" class="sg-select" onChange="SoundTest(this.options[this.selectedIndex].value)"> 
			<option {if $settingAlarm == 0} selected {/if}value="0">0%</option>
			<option {if $settingAlarm == 1} selected {/if}value="1">10%</option>
			<option {if $settingAlarm == 2} selected {/if}value="2">20%</option>
			<option {if $settingAlarm == 3} selected {/if}value="3">30%</option>
			<option {if $settingAlarm == 4} selected {/if}value="4">40%</option>
			<option {if $settingAlarm == 5} selected {/if}value="5">50%</option>
			<option {if $settingAlarm == 6} selected {/if}value="6">60%</option>
			<option {if $settingAlarm == 7} selected {/if}value="7">70%</option>
			<option {if $settingAlarm == 8} selected {/if}value="8">80%</option>
			<option {if $settingAlarm == 9} selected {/if}value="9">90%</option>
			<option {if $settingAlarm == 10} selected {/if}value="10">100%</option>
		</select>
		<div class="clear"></div>  		

		<input  id="Autointing" class="sg-checkbox" name="autointing" type="checkbox" value="1" {if $autoHideFleet == 1}checked="checked"{/if}>
		<label for="Autointing" class="sg-label tooltip" data-tooltip-content="{$LNG.settings_3}">{$LNG.settings_4}</label>		
		<div class="clear"></div>
		<input id="Animation" class="sg-checkbox" name="animation" value="1" {if $animation == 1}checked="checked"{/if} onchange="Confirm.action(
                '{$LNG.frame_2}',
                '{$LNG.settings_6}',
                '{$LNG.gl_yes}',
                '{$LNG.buildings_6}',
                '$.cookie(\'animation\',{if $animation == 1}0{else}1{/if}, { expires: 105 }); parent.location.reload();'); return false;" type="checkbox">
		<label for="Animation" class="sg-label tooltip" data-tooltip-content="{$LNG.settings_8}">{$LNG.settings_7}</label>
		
				
	</div><!--/sg-part-->	
	<div class="clear"></div>
	<div class="sg-btn-send btn btn-primary float-r" onClick="SettingsSet(true)">{$LNG.playercar_5}</div>
	<div class="clear"></div>
	</form>
</div>	
<script type="text/javascript">
	var lng 		= "{$LNG.settings_5}";
	var lm_options 	= "{$LNG.lm_options}";
	var yes 		= "{$LNG.chat_msg13}";
	var cancel 		= "{$LNG.chat_msg14}";
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_options}</div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/settings.js?{$REV}"></script>
{/block}