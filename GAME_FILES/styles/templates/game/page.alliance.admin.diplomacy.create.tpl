{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.lm_alliance}: {$LNG.al_diplo_create}</div>
</div>
<div id="popup">
	

<div id="al-body">

	<form id="fdiplo">			
	<div class="bg-g-b">
		<div class="al-block-title">
			{$LNG.al_diplo_ally}: {html_options name="ally_id" values=$IdList output=$AllyList}

			{$LNG.al_diplo_level_des}: {html_options name="level" values=range(1,6) output=$LNG.al_diplo_level selected=$diploMode}

		</div>
		<div class="al-block-content">
			<textarea id="text" class="wight-100" placeholder="Текст" name="text" maxlength="5000" cols="60" rows="10"></textarea>
		</div>
	</div>
	<input class="btn btn-primary" type="button" onclick="return check();" value="{$LNG.al_circular_send_submit}">
	</form>

</div>



</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0006"></script>
<script type="text/javascript">
function check()
{	
	//console.log('Start');
	
	if($('#text').val() == '') 	{
		NotifyBox('{$LNG.mg_empty_text}');
		return false;
	} 
	else{		
		$.getJSON('game.php?page=alliance&mode=admin&action=diplomacyCreateProcessor&ajax=1&'+$('#fdiplo').serialize(), function(data) {
			//console.log('Json function');
			NotifyBox(data.message, 5000);		
					
			if(!data.error) {
				parent.Frame.IFrame.open('alliance','admin&action=diplomacy');
				parent.$.fancybox.close();	
			}
		});
		
		//console.log('End');
			
		return true;
	}
}
/*
$(function() {	
	$('#name').autocomplete({
		source: "game.php?page=search&mode=autocomplete&type=allyname",
		minLength: 0,
		select: function(event, ui) {
			$(event.target).val(ui.item.label.replace(/<\/?b>/gim, ''));
			return false;
		}
	});
});
*/
</script>
{/block}