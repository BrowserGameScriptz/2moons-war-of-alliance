{block name="title" prepend}{$LNG.frame_9}{/block}
{block name="content"}
<div id="build-content">
	<div id="ar-left">
		
		<div class="ar-center">
								{for $arsenalSLot=1 to $arsenalFente}<div class="ar-box ar-box-big bga-b" onClick="$('.ar-box-content').hide(); $('.ar-ulist').show(); $('.ar-box').removeClass('ar-box-a'); $(this).addClass('ar-box-a');"></div>{/for} 
						
								<div class="ar-box ar-box-big bga-b i-ar-add"
				onClick="Confirm.cost(
				'{$LNG.arsenal_1}',
				'{$LNG.arsenal_5}',		
				'{$priceFent|number}',
								'$.cookie(\'tab_prem\', \'dm\');parent.Frame.IFrame.open(\'premium\');',
								921); $('.ar-box-content').hide(); $('.ar-box').removeClass('ar-box-a'); $(this).addClass('ar-box-a');">
			</div>
						
					<div class="clear"></div>
			<div class="ar-box-sep"></div>
					</div>
				
	</div>
	<div id="ar-right" class="bg-g-b">
	
				
				
	</div>	
</div>
<script type="text/javascript">

	parent.Frame.IFrame.N[1].html(
	'<div class="title-text">'
			+'{$LNG.frame_9}'
        +'</div>'
	+'<div class="title-tabs">'
		+'<div id="tab-prime" class="title-tab title-tab-active" onClick="Frame.IFrame.open(\'arsenal\');">{$LNG.arsenal_1}</div>'
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\',\'upgrade\');">{$LNG.arsenal_2} (0/25)</div>'				
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\',\'blueprints\');">{$LNG.arsenal_3}</div>'
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\',\'details\');">{$LNG.arsenal_4}</div>'
	+'</div>'
);</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/arsenal.js?{$REV}"></script>
{/block}