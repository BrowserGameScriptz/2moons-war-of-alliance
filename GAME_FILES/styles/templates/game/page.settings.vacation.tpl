{block name="title" prepend}{$LNG.lm_options}{/block}
{block name="content"}
<div id="st-settings" class="full-scroll">
	<form action="game.php?page=settings&amp;mode=send" method="post">
		<div class="sg-part float-l bga-b2">
			<div class="sg-title">
				{$LNG.settings_9}.  
			</div>
			<div class="f-ta-c c-smoke">{$vacationUntil1}</div>
			<br />
			<input  id="vacationID" class="sg-checkbox" name="vacation" type="checkbox" value="1" {if !$canVacationDisbaled}disabled{/if}>
			<label for="vacationID" class="sg-label" style="width:auto;">{$LNG.op_end_vacation_mode}</label>	
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
		<input class="sg-btn-send btn btn-primary" value="{$LNG.op_save_changes}" type="submit">
	</form>
</div>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_options}</div>');
</script>
{/block}