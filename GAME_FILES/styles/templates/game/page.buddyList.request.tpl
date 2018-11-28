{block name="title" prepend}{$LNG.lm_buddylist}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.sh_buddy_request}</div>
</div>
<div id="popup">
	
<div class="full-scroll bga-000" style="width:650px; top: -5px;">
	<form name="buddy" id="buddy" action="" method="post">
    <input type="hidden" name="id" value="{$id}">
	<div class="al-block al-block-one bg-g-b">
		<div class="al-block-title f-ta-l f-f-a">
			{$LNG.bu_player}: {$username} [{$galaxy}:{$system}:{$planet}]
		</div> 
		<div class="al-block-content">
	
			<textarea class="ms-in-text" placeholder="{$LNG.bu_request_text}" name="text" id="text" cols="40" rows="11" size="100" onkeyup="$('#cntChars').text($(this).val().length);" onkeydown="keyDown(event)"></textarea>		
			
			<div class="btn btn-primary" onClick="check();">
				<div class="float-r c-smoke">[ctrl + enter]&nbsp;&nbsp;</div>
				<div class="float-l c-smoke">&nbsp;&nbsp;(<span id="cntChars">0</span>&nbsp;/&nbsp;5.000&nbsp;{$LNG.bu_characters})</div> 
				<div style="width:150px;">{$LNG.bu_send}</div>
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
	if($('#text').val().length == 0) {
		parent.NotifyBox('{$LNG.mg_empty_text}');
		return false;
	} else {
		//$('submit').attr('disabled','disabled');
		$.post('game.php?page=buddyList&mode=send&ajax=1', $('#buddy').serialize(), function(data) {
			parent.NotifyBox(data,1500);
			parent.$.fancybox.close();
			return true;
		});
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