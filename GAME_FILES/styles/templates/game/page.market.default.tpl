{block name="title" prepend}{$LNG.lm_battlesim}{/block}
{block name="content"}
<div id="gr-conteiner">
	<div id="gr-left-side" class="bg-g-b">
				
		<div id="gr-left-menu">
			<div class="gr-title-menu">{$LNG.market_1}</div><div onclick="Gr.LeftShow('resources');" class="btn btn-primary gr-btn-menu gr-btn">{$LNG.market_2}</div><div class="gr-title-menu">{$LNG.market_3}</div><div onclick="parent.Dialog.CreateLotResources();" class="btn btn-primary gr-btn-menu gr-btn">{$LNG.market_4}</div><div onclick="parent.Frame.IFrame.open('market', 'yourlots');" class="btn btn-primary gr-btn-menu gr-btn ">{$LNG.market_5}</div>
		</div>
		
	</div>
	<div id="gr-lost-msg">           
	</div>
	<div id="gr-content">   
		
	</div>
</div>

<script type="text/javascript">
	LNG['gr_title']					= '{$LNG.frame_8}';
	LNG['gr_mes_resources_no_ress'] = '{$LNG.market_6}';
	
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.frame_8}</div>');
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/market.js?0007"></script>
{/block}
