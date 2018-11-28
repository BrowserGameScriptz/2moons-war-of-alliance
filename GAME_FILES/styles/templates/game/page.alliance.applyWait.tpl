{block name="title" prepend}{$LNG.lm_research}{/block}
{block name="content"}
<div id="al-body">
	<div class="al-content">			
		<div class="al-block bg-g-b" style="width:400px;">
			<div class="al-block-title">
				{$LNG.al_your_request_title}
			</div>
			<div class="al-block-content">
				<div>{$request_text}</div>
				<br />
				<form action="game.php?page=alliance&amp;mode=cancelApply" method="post">
				<input class="btn" type="submit" value="{$LNG.al_continue}">
				</form>
			</div>
		</div>
	</div>
</div>
{/block}