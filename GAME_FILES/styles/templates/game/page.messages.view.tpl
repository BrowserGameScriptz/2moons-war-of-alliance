{block name="content"}
<div id="messagestable">
	
	<form action="game.php?page=messages&amp;mode=delete&amp;messcat={$MessID}&amp;ajax=1" method="post">
	  
	<div class="ms-msg-rows">
				{foreach $MessageList as $Message}
				<div id="message_{$Message.id}" class="ms-msg-row">			
			<div class="ms-msg-head{if $MessID != 999 && $Message.unread == 1} mes_unread{/if}">
				
								{if $MessID != 999}<input class="me-msg-checkbox" name="delmes[{$Message.id}]" type="checkbox">{/if}
								
				<div class="me-msg-time">
					{$Message.time}
				</div>
				
				<div class="me-msg-name">
					{if $MessID != 999}{$LNG.mg_from}{else}{$LNG.mg_to}{/if}					<span class="c-902">{$Message.from}</span>
				</div>
					
				<div class="me-msg-subject c-901">
					{$Message.subject}
				</div>
				{if $MessID != 999}<div class="me-msg-btn i-x-f tooltip" data-tooltip-content="{$LNG.al_dlte}" onclick="msgDel({$Message.id}, {$MessID}); Message.getMessages({$MessID}); return false;"></div>{/if}
				{if $MessID == 50}<div class="me-msg-btn i-inarchive tooltip" data-tooltip-content="{$LNG.msgt_2}" onclick="msgArchive({$Message.id}, {$MessID}); Message.getMessages({$MessID});"></div>{/if}
				{if $MessID == 0}<div class="me-msg-btn i-inarchive tooltip" data-tooltip-content="{$LNG.msgt_2}" onclick="msgArchive({$Message.id}, {$MessID}); Message.getMessages({$MessID});"></div>
				<div class="me-msg-btn i-forward tooltip" data-tooltip-content="{$LNG.msgt_4}" onclick="parent.Dialog.SRTF({$Message.id})"></div>
				{/if}
				{if $MessID == 1}
				<div class="me-msg-btn i-complaint tooltip" data-tooltip-content="{$LNG.msgt_1}" onclick="parent.Dialog.complPM({$Message.id})"></div>
				<div class="me-msg-btn i-inarchive tooltip" data-tooltip-content="{$LNG.msgt_2}" onclick="msgArchive({$Message.id}, {$MessID}); Message.getMessages({$MessID});"></div>
				<div class="me-msg-btn i-mesages tooltip" data-tooltip-content="{$LNG.mg_answer_to} webspelleu [1:253:6]" onclick="parent.Dialog.PM({$Message.sender}, Message.CreateAnswer('{$LNG.mg_no_subject}'));"></div>
				{elseif $MessID == 2}
				<div class="me-msg-btn i-complaint tooltip" data-tooltip-content="{$LNG.msgt_1}" onclick="parent.Dialog.complPM({$Message.id})"></div>
				<div class="me-msg-btn i-inarchive tooltip" data-tooltip-content="{$LNG.msgt_2}" onclick="msgArchive({$Message.id}, {$MessID}); Message.getMessages({$MessID});"></div>
				{/if}
			
			</div>
			
			<div class="ms-msg-text">{$Message.text}
</div>			
		</div>{foreachelse}{$LNG.mg_no_text}{/foreach}
				
				
	</div>
	
	<div class="ms-navigation">
        
		<div class="ms-nav-btn ri" onclick="Message.getMessages({$MessID}, {$page - 1});">&laquo;</div>	
		
        {for $site=1 to $maxPage}<div class="ms-nav-btn btn-a" onclick="Message.getMessages({$MessID}, {$site});return false;">{$site}</div>{/for}

		<div class="ms-nav-btn ri" onclick="Message.getMessages({$MessID}, {$page + 1});">&raquo;</div>	
	</div>   
	 {if $MessID != 999}
	 <div class="ms-form" style="padding-right:0;">         
        <input class="ms-form-btn btn btn-primary" value="{$LNG.mg_confirm}" type="submit">
        <select class="ms-from-select" name="deletemessages">
            <option value="deletemarked">{$LNG.mg_delete_marked}</option>
            <option value="deleteunmarked">{$LNG.mg_delete_unmarked}</option>
            <option value="deletetypeall">{$LNG.mg_delete_type_all}</option>
			<option value="deleteall">{$LNG.mg_delete_all}</option>
            <option value="readall">{$LNG.mg_read_all}</option>
        </select>
    </div>
	{/if}	
	</form>
</div>
{/block}