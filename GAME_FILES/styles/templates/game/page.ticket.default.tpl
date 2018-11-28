{block name="title" prepend}{$LNG.lm_support}{/block}
{block name="content"}
<div id="al-body" class="full-scroll">
	<div class="al-content">			
		<div class="al-block bg-g-b" style="width:700px;">
			<div class="al-block-title">
			   {$LNG.lm_support}
			</div>
			<div class="al-block-content">
				{foreach $ticketList as $TicketID => $TicketInfo}	
				<a href="game.php?page=ticket&amp;mode=view&amp;id={$TicketID}" class="ticket_row_linck">
					<span class="ticket_row_linck_id">#{$TicketID}</span>
					<span class="ticket_row_linck_subject">{$TicketInfo.subject}</span>
					<span class="ticket_row_linck_time">{$TicketInfo.time}</span>
										{if $TicketInfo.status == 0}<span class="ticket_row_linck_status" style="color:green">{$LNG.ti_status_open}</span>{elseif $TicketInfo.status == 1}<span class="ticket_row_linck_status" style="color:orange">{$LNG.ti_status_answer}</span>{else}<span class="ticket_row_linck_status" style="color:red">{$LNG.ti_status_closed}</span>{/if}
										<span class="clear"></span>
				</a>    
				{/foreach}
								<div>&nbsp;</div>
				<div class="btn btn-primary" onClick="parent.Frame.IFrame.open('ticket','create');">{$LNG.ti_new}</div>
			</div>
		</div>
	</div>
</div>
{/block}
{block name="script" append}
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.lm_support}</div>');	
</script>{/block}