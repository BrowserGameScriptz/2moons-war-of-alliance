{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.market_4}</div>
</div>
<div id="popup">
	

<form name="message" id="message" action="">
	
	<div class="gr-creat-lot-lable-l">
		{$LNG.market_8}
	</div>
	
	<div class="gr-creat-lot-lable-r">
		{$LNG.market_9}
	</div>
	
	<select id="gi" class="gr-creat-lot-select-l">
			<option value="901" selected>{$LNG.tech.901}</option>
			<option value="902" >{$LNG.tech.902}</option>
			<option value="903" >{$LNG.tech.903}</option>
		</select>

	<select id="ri" class="gr-creat-lot-select-r">
			<option value="901" selected>{$LNG.tech.901}</option>
			<option value="902" >{$LNG.tech.902}</option>
			<option value="903" >{$LNG.tech.903}</option>
		</select>
	
	<input type="text" id="gc" class="gr-creat-lot-input-l" value="0" />
	<input type="text" id="rc" class="gr-creat-lot-input-r" value="0" />

	<input id="submit" class="btn btn-primary gr-creat-lot-btn" type="button" onClick="r_check();" name="button" value="{$LNG.market_13}">
	
	<div class="gr-creat-lot-max">
		Max <br/> {$maxSale|number}
	</div>
	<div class="gr-creat-lot-heed">
		{$LNG.market_12}
	</div>
</form>


</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/createlot.js?0008"></script>
<script act="load" type="text/javascript">
	var Course 							= [0.1,10];
	var Max 							= {$maxSale};
	LNG['gr_title'] 					= '{$LNG.frame_8}';
	LNG['gr_mes_one_resources'] 		= '{$LNG.market_14}';
	LNG['gr_mes_resources_no_ress'] 	= '{$LNG.market_6}';
	LNG['gr_mes_resources_no_course']	= '{$LNG.market_15}';
	LNG['gr_mes_limit_exceeded']		= '{$LNG.market_16}';
</script>
{/block}