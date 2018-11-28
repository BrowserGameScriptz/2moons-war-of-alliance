{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">		
		<div class="btn" onclick="parent.Frame.IFrame.open('alliance');">
			{$LNG.alliance_10}
		</div>
	</div>
	
	<div class="al-right-one">	
		<div class="al-content">			
			<div class="al-block al-block-one bg-g-b">
				<div class="al-block-content">
								{foreach $applyList as $applyRow}<div class="al-apply-row">
					<span class="al-apply-row-name" onClick="parent.Dialog.Playercard({$applyRow.userId});">
						<span class="c-902">{$applyRow.username}</span> 
						<span class="c-smoke">{$applyRow.time}</span>
					</span>
					
					<div class="al-apply-row-btn btn btn-primary">
						<a href="?page=alliance&amp;mode=admin&amp;action=sendAnswerToApply&amp;id={$applyRow.id}&amp;answer=yes" class="btn-transp"></a>
						{$LNG.al_acept_request}
					</div>					
					<div class="al-apply-row-btn btn">
						<a href="?page=alliance&amp;mode=admin&amp;action=sendAnswerToApply&amp;id={$applyRow.id}&amp;answer=no" class="btn-transp"></a>
						{$LNG.al_decline_request}
					</div>
				</div>{/foreach}
								</div>
			</div>
		</div>
	</div>
</div><!--al-body-->
{/block}
{block name="script" append}
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.al_manage_alliance}: {$LNG.al_request_list}</div>');
</script>
{/block}