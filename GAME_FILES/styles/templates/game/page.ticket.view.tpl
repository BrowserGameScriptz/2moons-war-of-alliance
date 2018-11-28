{block name="title" prepend}{$LNG.ti_read} - {$LNG.lm_support}{/block}
{block name="content"}
<div class="full-scroll">		
		<div class="al-block bg-g-b" style="width:700px;">	
			{foreach $answerList as $answerID => $answerRow}	
			{if $answerRow@first}
    		<div class="al-block-title f-f-a">
      			{$answerRow.subject} <span class="c-smoke f-fs-11">({$categoryList[$answerRow.categoryID]})</span>
			</div>
			{/if}
    		
						<div class="ticket_message{if $answerRow.ownerID == $userID} ticket_message_owner{/if}">    
				<div class="ticket_message_head">
					<span class="ticket_message_head_name">{$answerRow.ownerName}</span> 
					[{$answerRow.time}]
				</div>	
				<div class="ticket_message_text">
					{$answerRow.message}
				</div>
			</div>  
			{/foreach}    		
			<div class="clear"></div>
    		
			
			    
			 {if $status < 2}   
			<form action="game.php?page=ticket&mode=send" method="post" id="form">
			<input type="hidden" name="id" value="{$ticketID}"> 
				<div class="al-block-content">						
					<textarea placeholder="{$LNG.mg_message}" class="ticket_message_send_text" id="message" name="message" row="60" cols="8" style="height:100px; width:99%"></textarea>
					<div>&nbsp;</div>
					<input class="btn btn-primary" type="submit" value="{$LNG.ti_submit}">
				
					<div class="f-ta-c">
						&nbsp;<br />
						<a href="game.php?page=ticket" class="c-smoke">{$LNG.ti_overview}</a>
					</div>
				</div>
				        
			</form>{/if}
			    	</div>
	</div>
</div>

{/block}
{block name="script" append}
<script type="text/javascript">
	var ticketID = {$ticketID};
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_support}: {$LNG.ti_read}</div>');	
</script>
{/block}