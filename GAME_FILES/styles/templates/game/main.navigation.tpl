<audio preload id="audio" style="display:none;"></audio>
<!--menu-tn-->
<div id="menu-tn">
	<div id="menu-l"  class="tooltip" data-tooltip-content="{$commanderExpe} / 1.000" onClick="Dialog.Playercard({$userID});">
		<div class="menu-l-n">{$username}</div>
		<div class="menu-l-p bga-level"><div class="menu-l-p1 bga-level"></div></div>		
		<div class="menu-l-l bga-level">
			<div class="menu-l-c">{$commanderLevel}</div>
			<div class="menu-l-p2 bga-level"></div>
		</div>
	</div>
	<div class="menu-tn-separator"></div>
	<div class="menu-tn-res c-921 tooltip" data-tooltip-content="{$LNG.tech.921}" onclick="$.cookie('tab_prem', 'dm'); Frame.IFrame.open('premium');">
		<div class="menu-tn-res-i i-921 ri"></div>
		<span id="current-921">0</span>
	</div>
	<div class="menu-tn-separator-l"></div>
	<div class="menu-tn-res c-931 tooltip" data-tooltip-content="{$LNG.tech.931}" onClick="Frame.Pay();">
		<div class="menu-tn-res-i i-931 ri"></div>
		<span id="current-931">0</span>
		<div class="new-n bg-902">+1</div>
	</div>	
	
	<div id="menu-s" class="tooltip" data-tooltip-content="{$LNG.frame_1}" onClick="Frame.IFrame.open('fleetTable');">
		<div class="menu-s-i i-mis1 ri"></div>
		<div class="menu-s-i i-mis9 ri"></div>
	</div>
	
	<div class="menu-tn-btn i-settings" onClick="Frame.TopNav.open(1);">
		<div id="tn-l-1" class="menu-tn-btn-list">
			<div class="menu-tn-btn i-settings tooltip" data-tooltip-content="{$LNG.frame_2}" onClick="Frame.IFrame.open('settings');"></div>
			<div class="menu-tn-btn i-support tooltip" data-tooltip-content="<div style='width:100px;'>{$LNG.frame_3}</div>" onClick="Frame.IFrame.open('ticket');"></div>		
			<div class="menu-tn-btn i-exit tooltip" data-tooltip-content="{$LNG.frame_4}"><a class="btn-transp" href="game.php?page=logout"></a></div>				
		</div>
	</div>
	<div class="menu-tn-btn i-forum tooltip" data-tooltip-content="{$LNG.frame_31}"><a class="btn-transp" target="_blank" href="//forum.warofalliance.eu"></a></div>
	<div class="menu-tn-btn i-top-kb tooltip" data-tooltip-content="{$LNG.frame_6}" onClick="Frame.IFrame.open('battleHall');"></div>
	<div class="menu-tn-btn i-statist tooltip" data-tooltip-content="{$LNG.frame_5}" onClick="Frame.IFrame.open('statistics');"></div>
	<div class="menu-tn-btn i-achiev tooltip" data-tooltip-content="{$LNG.frame_7}" onClick="Frame.IFrame.open('achievement');"></div>
	<div class="menu-tn-btn i-market tooltip" data-tooltip-content="{$LNG.frame_8}" onClick="Frame.IFrame.open('market');"></div>
	<div class="menu-tn-btn i-arsenal tooltip" data-tooltip-content="{$LNG.frame_9}" onClick="Frame.IFrame.open('arsenal');"></div>
	<div class="menu-tn-btn i-officers tooltip" data-tooltip-content="{$LNG.frame_10}" onClick="Frame.IFrame.open('senat');"></div>
	<div class="menu-tn-btn i-alliance tooltip" data-tooltip-content="{$LNG.frame_12}" onClick="Frame.IFrame.open('alliance');"></div>
	<div class="menu-tn-btn i-messag tooltip" data-tooltip-content="{$LNG.frame_11}" onClick="Frame.IFrame.open('messages');">
		<div class="new-n"></div>
	</div>
	<div class="menu-tn-separator-r"></div>
	<div class="menu-tn-btn i-prem tooltip" data-tooltip-content="{$LNG.frame_13}" onClick="Frame.IFrame.open('premium');"></div>
		
</div>

<div id="menu-bn">
	<div class="menu-bn-btn menu-bn-btn-p-prev i-p-prev" onClick="Frame.PlanetMenu.prev();"></div>
	<div class="menu-bn-btn menu-bn-btn-p-main" onClick="Frame.PlanetMenu.openToggle();" id="btn-pl">
		<div class="menu-bn-btn-p-name">&nbsp;</div>
		<div class="menu-bn-btn-p-coord">0 : 0 : 0</div>
	</div>
	<div class="menu-bn-btn menu-bn-btn-p-next i-p-next" onClick="Frame.PlanetMenu.next();"></div>
	<div class="menu-bn-separator-l"></div>
	<div class="menu-bn-btn" onClick="Frame.IFrame.open('orbita');" id="btn-fleet">
		<span class="menu-bn-btn-p-name">{$LNG.frame_14}</span><br />
		<span class="menu-bn-btn-p-coord">{$DisplayFCount}/0</span>
	</div>
	<div class="menu-bn-separator-l"></div>
	<div class="menu-bn-btn menu-bn-btn-t-one" onClick="Frame.IFrame.open('galaxy');">{$LNG.frame_15}</div>
</div>
<!--/menu-tn-->