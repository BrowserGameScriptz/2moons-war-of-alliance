{block name="title" prepend}{$LNG.lm_overview}{/block}
{block name="script" append}{/block}
{block name="content"}
<canvas id="space"></canvas> 
<div id="overview">
	
	<div id="ov-planet-mount"><div id="ov-planet"><div id="ov-planet-i"></div></div></div>
	<div id="ov-moon-mount"><div id="ov-moon"><div id="ov-moon-i"></div></div></div>
	<div id="ov-debris-mount"><div id="ov-debris"></div></div>
	<div id="ov-info-mount">
		<div class="ov-info-block ov-info-head tooltip" data-tooltip-content="{$LNG.frame_18}" onClick="Frame.IFrame.open('planetarium');">{$LNG.frame_19}</div>
		<div class="ov-info-sep"></div>
		<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.frame_20} " id="servertime"></div>
		<div class="ov-info-sep"></div>
		<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.frame_21}" id="ov-i-diameter"></div>
		<div class="ov-info-sep"></div>
		<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.frame_22}" id="ov-i-temp"></div>
		<div class="ov-info-sep"></div>
		<div class="ov-info-block tooltip" data-tooltip-content="{$LNG.frame_23}" id="ov-i-debris"></div>
	</div>
	
	<div id="ov-queue-mount">
		<!--buildings-->
		<div class="ov-queue-btn-box c-qb">
			<div class="ov-queue-btn bga-qb" onClick="Frame.IFrame.open('buildings');">{$LNG.frame_24}</div>
			<div class="ov-queue-status-i i-qb ri"></div>
			<div class="ov-queue-status">0/0</div>
		</div>
		
		<div id="ov-queue-build" class="queue-box">
			<div class="queue-block queue-block-big">
				
				<div class="queue-arr-left i-arr-l"></div>
				<div class="queue-text" onClick="Frame.IFrame.open('buildings');">{$LNG.frame_25}</div>
				
				<div class="queue-time"></div>
				<div class="queue-btn-complete">
					<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
					<div class="queue-btn-complete-i i-921 ri"></div>
					<div class="queue-btn-complete-c"></div>
				</div>
				
				<div class="queue-p"></div>
				
			</div>
			
			<div class="queue-arr-left i-arr-l"></div>
						
		</div>
		
		<!--shipyard-->
		<div class="ov-queue-btn-box c-qs">
			<div class="ov-queue-btn bga-qs" onClick="Frame.IFrame.open('shipyard');">{$LNG.frame_27}</div>
			<div class="ov-queue-status-i i-qs ri"></div>
			<div class="ov-queue-status">0/0</div>
		</div>
		
		<div id="ov-queue-shipyard" class="queue-box">
			<div class="queue-block queue-block-big">

				<div class="queue-arr-left i-arr-l"></div>
				<div class="queue-text" onClick="Frame.IFrame.open('shipyard');">{$LNG.frame_25}</div>
				
				<div class="queue-time"></div>
				<div class="queue-btn-complete">
					<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
					<div class="queue-btn-complete-i i-921 ri"></div>
					<div class="queue-btn-complete-c"></div>
				</div>
				
				<div class="queue-p"></div>
				
			</div>
			
			<div class="queue-arr-left i-arr-l"></div>
			
		</div>
		
		<!--research-->
		<div class="ov-queue-btn-box c-qr">
			<div class="ov-queue-btn bga-qr" onClick="Frame.IFrame.open('research');">{$LNG.frame_28}</div>
			<div class="ov-queue-status-i i-qr ri"></div>
			<div class="ov-queue-status">0</div>
		</div>
		
		<div id="ov-queue-research" class="queue-box">
			<div class="queue-block queue-block-big">

				<div class="queue-arr-left i-arr-l"></div>
				<div class="queue-text" onClick="Frame.IFrame.open('research');">{$LNG.frame_29}</div>
				
				<div class="queue-time"></div>
				<div class="queue-btn-complete">
					<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
					<div class="queue-btn-complete-i i-921 ri"></div>
					<div class="queue-btn-complete-c"></div>
				</div>
				
				<div class="queue-p"></div>
				
			</div>
		</div>
		
	</div>
	<!--/#ov-queue-mount-->
	
	<div id="ov-events">
		<div id="ov-ev-e" class="ov-event tooltip" data-tooltip-content="{$LNG.premium_2}" onClick="Frame.IFrame.open('expedition');" style="display:block">
			<div class="ov-event-icon ri i-ev-e bg-902"></div>
			<div class="ov-event-time"></div>
			<div class="ov-event-text">0 / 0</div>
		</div>
		<div id="ov-ev-p" class="ov-event tooltip" data-tooltip-content="" onClick="Frame.IFrame.open('premium');" style="display:none">
			<div class="ov-event-icon ri i-ev-p bg-gold"></div>
			<div class="ov-event-time"></div>
			<div class="ov-event-text">0 / 0</div>
		</div>
		<div id="ov-ev-j" class="ov-event tooltip" data-tooltip-content="{$LNG.frame_37}" onClick="Dialog.contracts();" style="display:block">
			<div class="ov-event-icon ri i-ev-j bg-dm"></div>
			<div class="ov-event-time"></div>
			<div class="ov-event-text"></div>
		</div>
		<div id="ov-ev-t" class="ov-event tooltip float-r clear" data-tooltip-content="{$LNG.frame_32}" onClick="Frame.IFrame.open('tourney');" style="display:block; width:50px;">
			<div class="ov-event-icon ri i-ev-t bg-smoke"></div>
			<div class="ov-event-time"></div>
		</div>
		<div id="ov-ev-a" class="ov-event tooltip float-r clear" data-tooltip-content="{$LNG.al_view_events}" onClick="Dialog.actions(); $(this).find('.new-n').remove();" style="display:none; width:50px;">
			<div class="ov-event-icon ri i-ev-a bg-911"></div>
			<div class="ov-event-time"></div>	
					
		</div>
	</div>
	<!--/#ov-events-->
	<div id="special-offer" class="i-offer-1m" onClick="Dialog.SOffer();">
		<div class="ov-special-name c-901"></div>
		<div class="ov-special-time"></div>
		<div class="queue-btn-complete" style="display:block">
			<div class="queue-btn-complete-t">{$LNG.premium_3}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c"></div>
		</div>
	</div>
	{*<div id="special-offer" class="i-special-offer-m" onClick="Dialog.SOffer();">
		<div class="ov-special-name c-901"></div>
		<div class="ov-special-time"></div>
		<div class="queue-btn-complete" style="display:block">
			<div class="queue-btn-complete-t">{$LNG.premium_3}</div>
			<div class="queue-btn-complete-i i-931 ri"></div>
			<div class="queue-btn-complete-c"></div>
		</div>
	</div>*}
	
</div>
{/block}