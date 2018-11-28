{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.lm_alliance}: {$LNG.al_circular_send_ciruclar}</div>
</div>
<div id="popup">
	
<div class="full-scroll bga-000" style="width:650px; top: -5px;">
	<form name="message" id="message" action="">
	<div class="al-block al-block-one bg-g-b">
		<div class="al-block-title f-ta-l f-f-a">
			{$LNG.al_receiver} <select name="rankID" class="ms-in-rank">
			{html_options options=$RangeList}
</select>

		</div> 
		<div class="al-block-content">
	
			<textarea class="ms-in-text" placeholder="{$LNG.al_message}" name="text" id="text" cols="40" rows="6" onkeyup="$('#cntChars').text($(this).val().length); keyUp(event);" onkeydown="keyDown(event)"></textarea>		
			
			<div class="btn btn-primary" onClick="check();">
				<div class="float-r c-smoke">[ctrl + enter]&nbsp;&nbsp;</div>
				<div class="float-l c-smoke">&nbsp;&nbsp;(<span id="cntChars">0</span>&nbsp;/&nbsp;5.000&nbsp;{$LNG.al_characters})</div> 
				<div class="wight-100">{$LNG.al_circular_send_submit}</div>
			</div>      
		</div>
	</div>         
	</form>
</div>

</div>
{/block}
{block name="script" append}
<script type="text/javascript">
var ctrl = false;
function check(){
	if(document.message.text.value == '') {
		alert('{$LNG.mg_empty_text}');
		return false;
	} else {
		$.post('game.php?page=alliance&mode=circular&action=send&ajax=1', $('#message').serialize(), function(data){
			data = $.parseJSON(data);
			parent.NotifyBox(data.message,2500);
			if(!data.error) {
				parent.$.fancybox.close();
			}
		});
		return true;
	}
}
function keyUp(e){
	if(e.keyCode == 17)
		ctrl = false;
}
function keyDown(e){ 
	if(e.keyCode == 17)
		ctrl = true;
	else if(e.keyCode == 13 && ctrl)
		check();
}
</script>
{/block}