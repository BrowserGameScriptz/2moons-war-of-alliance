{block name="title" prepend}{$LNG.msgt_4}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.msgt_6}</div>
</div>
<div id="popup">
	
<div id="al-body" class="full-scroll">
		
	<div class="al-block bg-g-b" style="width:380px;">			
			<input type="hidden" name="id" value="0">
		<div class="al-block-title">
		<select name="request_notallow" style="width:100%; line-height:25px; height:25px;" id="upgrade_name">
							{foreach $AllyFriends as $friend}
								<option value="{$friend.friendId}" class="upgrade_name_class option">{$friend.friendUsername}</option>
							{/foreach}
							{if $allyidf != 0}<option value="ally" class="upgrade_name_class option">{$LNG.msgt_7}</option>{/if}
					</select>
		</div>
		<div class="al-block-content">	
			<div class="btn btn-primary" onclick="SRTF({$RaportID});" class="ok_btn">{$LNG.al_circular_send_submit}</div>
		</div>
	</div>
      
</div>

</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/message.js?{$REV}"></script>
{/block}