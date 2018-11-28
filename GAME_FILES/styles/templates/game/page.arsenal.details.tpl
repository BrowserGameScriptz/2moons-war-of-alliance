{block name="title" prepend}{$LNG.frame_9}{/block}
{block name="content"}
<div id="build-content">
	<div id="ar-left">
		
				{foreach $Detaillas as $ID => $Data}<div class="ar-box ar-box-smal bga-b i-ar-{$Data.arsenalClass} tooltip" onClick="$('.ar-box-content').hide(); $('#u{$Data.arsenalClass}').show(); $('.ar-box').removeClass('ar-box-a'); $(this).addClass('ar-box-a');" 
			data-tooltip-content="{$Data.arsenalName} ">
					</div>{/foreach}
					
				
				
	</div>
	<div id="ar-right" class="bg-g-b">
	
				{foreach $Detaillas as $ID => $Data}<div id="u{$Data.arsenalClass}" class="ar-box-content">
			<div class="ar-box-content-ico i-ar-{$Data.arsenalClass}"></div>
			<div class="ar-box-content-name">{$Data.arsenalName}  </div>
			<div class="ar-box-content-bonus">
				<div class="c-901">{$Data.arsenalText} {if !empty($Data.arsenalText2)}</br></br> {$Data.arsenalText2}{/if}</div>
			</div>
					</div>{/foreach}
				
				
	</div>	
</div>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html(
	'<div class="title-text">'
			+'{$LNG.frame_9}'
        +'</div>'
	+'<div class="title-tabs">'
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\');">{$LNG.arsenal_1}</div>'
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\',\'upgrade\');">{$LNG.arsenal_2} (0/25)</div>'				
		+'<div id="tab-prime" class="title-tab " onClick="Frame.IFrame.open(\'arsenal\',\'blueprints\');">{$LNG.arsenal_3}</div>'
		+'<div id="tab-prime" class="title-tab title-tab-active" onClick="Frame.IFrame.open(\'arsenal\',\'details\');">{$LNG.arsenal_4}</div>'
	+'</div>'
);</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/arsenal.js?{$REV}"></script>
{/block}