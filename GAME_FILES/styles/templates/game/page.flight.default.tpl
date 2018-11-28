{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="flight-content">

	<form id="form-fleet" action="game.php?page=flightStart" method="post">
		<input type="hidden" name="token" value="{$token}">
		
		<div id="flight-left" class="bg-g-b">
			<div class="fl-title bga-b tooltip" data-tooltip-content="{$LNGMISSION}">
				<div>{$LNG.flight_1}</div>
				<div class="fl-mis i-mis{$targetMission}-o"></div>
			</div>
						
			<div class="fl-mis-row i-fl-location tooltip" data-tooltip-content="{$LNG.fl_destiny}" style="margin-top:5px;">			
				{$targetGalaxy} : {$targetSystem} : {$targetPlanet} 
							</div>
			
						{if $StaySelector}<div class="fl-mis-row i-fl-stay tooltip" data-tooltip-content="{$LNG.fl_hold_time}">
				<select id="staytime" class="fl-select" name="staytime" onChange="upVars()">
										{html_options options=$StaySelector}
									</select>
			</div>{/if}
						
			<div class="fl-mis-row i-fl-distance tooltip" data-tooltip-content="{$LNG.fl_distance}">
				<span id="distance">{$distance|number}</span>
			</div>
			<div class="fl-mis-row i-fl-time tooltip" data-tooltip-content="{$LNG.fl_flying_time}">
				<span id="duration">-</span>
			</div>
			<div class="fl-mis-row i-fl-time-s tooltip" data-tooltip-content="{$LNG.fl_flying_arrival}">
				<span id="arrival">-</span>
			</div>
			<div class="fl-mis-row i-fl-time-e tooltip" data-tooltip-content="{$LNG.fl_flying_return}">
				<span id="return">-</span>
			</div>
			<div class="fl-mis-row i-fl-consumption tooltip" data-tooltip-content="{$LNG.fl_fuel_consumption}">
				<span id="consumption">-</span>
			</div>
			<div class="fl-mis-row i-fl-speed tooltip" data-tooltip-content="{$LNG.fl_fleet_speed}">
				<select id="speed" class="fl-select" name="speed" onChange="upVars()">
										{html_options options=$speedSelect}
				</select>
			</div>
			<div class="fl-mis-row i-fl-speed-m tooltip" data-tooltip-content="{$LNG.fl_max_speed}">
				<span id="maxspeed">-</span>
			</div>
		</div><!--/flight-left-->
		
		<div id="flight-center">
		
			<div class="fl-title">
				{$LNG.orbita_1}<br />
								<span>({$LNG.flight_2}: <span id="FleetPoints">0</span>)</span>
				
							</div>
			
			<div class="fl-fleet">
						<div class="fl-fleet-groop">
				<div class="fl-fleet-row-input-div fl-fleet-mall">
					<div onclick="minShipAll();" class="fl-fleet-row-input-min">Min</div>
					<div onclick="maxShipAll();" class="fl-fleet-row-input-max">Max</div>
				</div>
			</div>
												{if count($FleetsOnPlanetBattle) != 0}<div class="fl-fleet-groop">
				Combat ships
					<div class="fl-fleet-row-input-div">
						<div onclick="minGroop('batle');" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxGroop('batle');" class="fl-fleet-row-input-max">Max</div>
					</div>
				</div>
												{foreach $FleetsOnPlanetBattle as $FleetRow}	<div class="fl-fleet-row">
					<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
					<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
					<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>			
					<div class="fl-fleet-row-input-div">
						<div onclick="minShip({$FleetRow.id});" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxShip({$FleetRow.id});" class="fl-fleet-row-input-max">Max</div>
						<input id="s{$FleetRow.id}" sid="{$FleetRow.id}" class="fl-fleet-row-input input-text countdots fleet-count" name="ship{$FleetRow.id}" value="0" type="text">
					</div>
				</div>{/foreach}{/if}			
												{if count($FleetsOnPlanetTransport) != 0}<div class="fl-fleet-groop">
				{$LNG.orbita_5}
					<div class="fl-fleet-row-input-div">
						<div onclick="minGroop('transports');" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxGroop('transports');" class="fl-fleet-row-input-max">Max</div>
					</div>
				</div>
												{foreach $FleetsOnPlanetTransport as $FleetRow}	<div class="fl-fleet-row">
					<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
					<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
					<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>			
					<div class="fl-fleet-row-input-div">
						<div onclick="minShip({$FleetRow.id});" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxShip({$FleetRow.id});" class="fl-fleet-row-input-max">Max</div>
						<input id="s{$FleetRow.id}" sid="{$FleetRow.id}" class="fl-fleet-row-input input-text countdots fleet-count" name="ship{$FleetRow.id}" value="0" type="text">
					</div>
				</div>{/foreach}{/if}
				
												{if count($FleetsOnPlanetProcessorcs) != 0}<div class="fl-fleet-groop">
				Processors
					<div class="fl-fleet-row-input-div">
						<div onclick="minGroop('transports');" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxGroop('transports');" class="fl-fleet-row-input-max">Max</div>
					</div>
				</div>
												{foreach $FleetsOnPlanetProcessorcs as $FleetRow}	<div class="fl-fleet-row">
					<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
					<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
					<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>			
					<div class="fl-fleet-row-input-div">
						<div onclick="minShip({$FleetRow.id});" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxShip({$FleetRow.id});" class="fl-fleet-row-input-max">Max</div>
						<input id="s{$FleetRow.id}" sid="{$FleetRow.id}" class="fl-fleet-row-input input-text countdots fleet-count" name="ship{$FleetRow.id}" value="0" type="text">
					</div>
				</div>{/foreach}{/if}
												{if count($FleetsOnPlanetSpecial) != 0}<div class="fl-fleet-groop">
				{$LNG.orbita_6}	
					<div class="fl-fleet-row-input-div">
						<div onclick="minGroop('special');" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxGroop('special');" class="fl-fleet-row-input-max">Max</div>
					</div>
				</div>
												{foreach $FleetsOnPlanetSpecial as $FleetRow}	<div class="fl-fleet-row">
					<div class="fl-fleet-row-i i-u{$FleetRow.id}" onclick="return parent.Dialog.info({$FleetRow.id})"></div>
					<div class="fl-fleet-row-n tooltip" onclick="return parent.Dialog.info({$FleetRow.id})" data-tooltip-content="{$LNG.fl_speed_title} {$FleetRow.speed}">{$LNG.tech.{$FleetRow.id}}</div>
					<div class="fl-fleet-row-c">{$FleetRow.count|number}</div>			
					<div class="fl-fleet-row-input-div">
						<div onclick="minShip({$FleetRow.id});" class="fl-fleet-row-input-min">Min</div>
						<div onclick="maxShip({$FleetRow.id});" class="fl-fleet-row-input-max">Max</div>
						<input id="s{$FleetRow.id}" sid="{$FleetRow.id}" class="fl-fleet-row-input input-text countdots fleet-count" name="ship{$FleetRow.id}" value="0" type="text">
					</div>
				</div>{/foreach}{/if}	
																																						</div>
			
		</div><!--/flight-center-->
		
		<div id="flight-right" class="bg-g-b">
			<div class="fl-title">
				{$LNG.fl_resources}
			</div>
			
			<div class="fl-res-row fl-res-storage bga-901 tooltip" data-tooltip-content="Остаток">
				<div class="fl-res-storage-filling bga-901" id="r-filling"></div>
				<div class="fl-mis-row i-fl-storage">					
					<div class="fl-res-storage-count" id="r-count">0</div>
					<div class="fl-res-storage-percent" id="r-percent">[ 0% ]</div>
				</div>
			</div>
            
			<div class="fl-res-row">
				<div onclick="minResourceAll();" class="fl-fleet-row-input-min">Min</div>
				<div onclick="maxResourceAll();" class="fl-fleet-row-input-max">Max</div>
			</div>
			           
			<div class="fl-res-row">
				<div onclick="minResource('901');" class="fl-fleet-row-input-min">Min</div>
				<div onclick="maxResource('901');" class="fl-fleet-row-input-max">Max</div>
				<div class="fl-res-ico ri i-901"></div>  
				<input id="r901" class="fl-fleet-row-input fl-res-input input-text c-901 countdots" value="0" name="r901"  type="text">
			</div>
						
			<div class="fl-res-row">
				<div onclick="minResource('902');" class="fl-fleet-row-input-min">Min</div>
				<div onclick="maxResource('902');" class="fl-fleet-row-input-max">Max</div>  
				<div class="fl-res-ico ri i-902"></div>                              
				<input id="r902" class="fl-fleet-row-input fl-res-input input-text c-902 countdots" value="0"  name="r902" type="text">
			</div>
			
			<div class="fl-res-row">
				<div onclick="minResource('903');" class="fl-fleet-row-input-min">Min</div>
				<div onclick="maxResource('903');" class="fl-fleet-row-input-max">Max</div>
				<div class="fl-res-ico ri i-903"></div>                                  
				<input id="r903" class="fl-fleet-row-input fl-res-input input-text c-903 countdots" value="0" name="r903" type="text">
			</div>
					
			<div class="fl-res-row fl-btn">
				<div class="btn btn-primary" onClick="sendFleet();">{$LNG.flight_4}</div>
			</div>
			
					
		</div><!--/flight-right-->
		
	</form>
</div>

<script type="text/javascript">
	FleetData 	= {$fleetsData|json}; 
	FleetGroop 	= { "transports":[202,203],"batle":[204,205,206,207,211,213,214,215,216,217,218,232,221,222,223,224,225,226,227,228,229,230],"special":[208,210,212,220] };
	FlightData 	= { "distance":{$distance},"mission":{$targetMission},"name":"","gamespeed":{$GameSpeedFactor},"planet":["1","1","5","5","1"],"target":["1","1","5",13,1],"sector":0,"ShipGroop":[],"MinFlyTime":5,"ShipStorage":1,"MotorEconomy":1,"ExpedSize":250 };
	SendError 	= { "3":"\u041f\u0443\u043d\u043a\u0442 \u043e\u0442\u043f\u0440\u0430\u0432\u043b\u0435\u043d\u0438\u044f \u0438 \u043f\u0443\u043d\u043a\u0442 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f \u0438\u0434\u0435\u043d\u0442\u0438\u0447\u043d\u044b.","4":"\u0414\u0430\u043d\u043d\u043e\u0433\u043e \u043f\u0443\u043d\u043a\u0442\u0430 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f \u043d\u0435 \u0441\u0443\u0449\u0435\u0441\u0442\u0432\u0443\u0435\u0442.","5":"\u0420\u0435\u0441\u0443\u0440\u0441\u044b \u043d\u0435 \u043f\u043e\u0433\u0440\u0443\u0436\u0435\u043d\u044b.","6":"\u041d\u0435\u0442 \u0441\u0432\u043e\u0431\u043e\u0434\u043d\u044b\u0445 \u0441\u043b\u043e\u0442\u043e\u0432.","7":"\u041f\u0443\u043d\u043a\u0442 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f \u043d\u0435\u0434\u043e\u0441\u0442\u0443\u043f\u0435\u043d.","8":"\u041d\u0435 \u0432\u0441\u0435 \u043a\u043e\u0440\u0430\u0431\u043b\u0438 \u0434\u043e\u0441\u0442\u0443\u043f\u043d\u044b.","9":"\u0412\u044b \u043d\u0435 \u043c\u043e\u0436\u0435\u0442\u0435 \u043e\u0442\u043f\u0440\u0430\u0432\u0438\u0442\u044c \u0431\u043e\u043b\u044c\u0448\u0435 \u044d\u043a\u0441\u043f\u0435\u0434\u0438\u0446\u0438\u0439.","10":"\u041d\u0435\u0434\u043e\u0441\u0442\u0430\u0442\u043e\u0447\u043d\u043e \u0438\u0441\u0441\u043b\u0435\u0434\u043e\u0432\u0430\u043d\u0430 \u0442\u0435\u0445\u043d\u043e\u043b\u043e\u0433\u0438\u044f \u0430\u0441\u0442\u0440\u043e\u0444\u0438\u0437\u0438\u043a\u0438.","12":"\u0418\u0433\u0440\u043e\u043a \u043d\u0430\u0445\u043e\u0434\u0438\u0442\u0441\u044f \u0432 \u0440\u0435\u0436\u0438\u043c\u0435 \u043e\u0442\u043f\u0443\u0441\u043a\u0430.","13":"\u041f\u0440\u0435\u0432\u044b\u0448\u0435\u043d \u043b\u0438\u043c\u0438\u0442 \u043a\u043e\u043b\u0438\u0447\u0435\u0441\u0442\u0432\u0430 \u0430\u0442\u0430\u043a \u0432 \u0441\u0443\u0442\u043a\u0438 \u043d\u0430 \u0434\u0430\u043d\u043d\u044b\u0439 \u043f\u0443\u043d\u043a\u0442 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f.","14":"\u0412\u044b \u043d\u0435 \u043c\u043e\u0436\u0435\u0442\u0435 \u0430\u0442\u0430\u043a\u043e\u0432\u0430\u0442\u044c \u0410\u0434\u043c\u0438\u043d\u0438\u0441\u0442\u0440\u0430\u0442\u043e\u0440\u043e\u0432.","15":"\u0418\u0433\u0440\u043e\u043a \u043d\u0430\u0445\u043e\u0434\u0438\u0442\u0441\u044f \u043f\u043e\u0434 \u0437\u0430\u0449\u0438\u0442\u043e\u0439 \u043d\u043e\u0432\u0438\u0447\u043a\u043e\u0432.","16":"\u0418\u0433\u0440\u043e\u043a \u0441\u043b\u0438\u0448\u043a\u043e\u043c \u0441\u0438\u043b\u044c\u043d\u044b\u0439.","17":"\u0423 \u043f\u0443\u043d\u043a\u0442\u0430 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f \u043d\u0438\u0437\u043a\u0438\u0439 \u0443\u0440\u043e\u0432\u0435\u043d\u044c \u041e\u0440\u0431\u0438\u0442\u0430\u043b\u044c\u043d\u043e\u0439 \u0441\u0442\u0430\u043d\u0446\u0438\u0438.","18":"\u0418\u0433\u0440\u043e\u043a \u043f\u0443\u043d\u043a\u0442\u0430 \u043d\u0430\u0437\u043d\u0430\u0447\u0435\u043d\u0438\u044f \u0434\u043e\u043b\u0436\u0435\u043d \u0431\u044b\u0442\u044c \u0432 \u0412\u0430\u0448\u0435\u043c \u0430\u043b\u044c\u044f\u043d\u0441\u0435 \u0438\u043b\u0438 \u0432 \u0441\u043f\u0438\u0441\u043a\u0435 \u0434\u0440\u0443\u0437\u0435\u0439.","19":"\u041d\u0435 \u0445\u0432\u0430\u0442\u0430\u0435\u0442 \u0434\u0435\u0439\u0442\u0435\u0440\u0438\u044f.","20":"\u041d\u0435\u0434\u043e\u0441\u0442\u0430\u0442\u043e\u0447\u043d\u0430\u044f \u0433\u0440\u0443\u0437\u043e\u043f\u043e\u0434\u044a\u0451\u043c\u043d\u043e\u0441\u0442\u044c.","21":"\u041f\u043e\u043b\u0435 \u043e\u0431\u043b\u043e\u043c\u043a\u043e\u0432 \u043d\u0435 \u0441\u0443\u0449\u0435\u0441\u0442\u0432\u0443\u0435\u0442!","22":"\u041d\u0435\u0442 \u0434\u043e\u0441\u0442\u0443\u043f\u043d\u044b\u0445 \u043c\u0438\u0441\u0441\u0438\u0439. <br \/><br \/> \u0412\u043e\u0437\u043c\u043e\u0436\u043d\u044b\u0435 \u043f\u0440\u0438\u0447\u0438\u043d\u044b: <br \/> &bull; \u0421\u043e\u0441\u0442\u0430\u0432 \u0444\u043b\u043e\u0442\u0430 \u043d\u0430\u0440\u0443\u0448\u0430\u0435\u0442 \u0443\u0441\u043b\u043e\u0432\u0438\u044f \u043c\u0438\u0441\u0441\u0438\u0439 <br \/> &bull; \u041f\u043b\u0430\u043d\u0435\u0442\u0430 \u043d\u0435 \u0441\u0443\u0449\u0435\u0441\u0442\u0432\u0443\u0435\u0442","24":"\u0414\u0435\u0439\u0441\u0442\u0432\u0438\u0435 \u043d\u0435 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u0430 \u0438\u0437 \u0437\u0430 \u043d\u0435\u0434\u0430\u0432\u043d\u0435\u0439 \u0442\u0435\u043b\u0435\u043f\u043e\u0440\u0442\u0430\u0446\u0438\u0438 \u0438\u043b\u0438 \u043a\u043e\u043b\u043e\u043d\u0438\u0437\u0430\u0446\u0438\u0438 \u043f\u043b\u0430\u043d\u0435\u0442\u044b","25":"\u0414\u0435\u0439\u0441\u0442\u0432\u0438\u0435 \u043d\u0435 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u043e, \u0441 \u0432\u0430\u0448\u0435\u0439 \u043e\u0440\u0431\u0438\u0442\u044b \u043d\u0435 \u0443\u0441\u043f\u0435\u043b \u0443\u043b\u0435\u0442\u0435\u0442\u044c \u0434\u0440\u0443\u0433\u043e\u0439 \u0444\u043b\u043e\u0442","26":"\u0410\u0442\u0430\u043a\u0430 \u043d\u0430 \u043f\u043b\u0430\u043d\u0435\u0442\u0443 \u0430\u043b\u044c\u044f\u043d\u0441\u0430 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u0430 \u0442\u043e\u043b\u044c\u043a\u043e \u0432 \u0441\u043e\u0441\u0442\u043e\u044f\u043d\u0438\u0438 \u0432\u043e\u0439\u043d\u044b","27":"\u0421\u0438\u043b\u044b \u0430\u043b\u044c\u044f\u043d\u0441\u043e\u0432 \u043d\u0435 \u0440\u0430\u0432\u043d\u044b","28":"\u0410\u0442\u0430\u043a\u0430 \u043d\u0435\u0432\u043e\u0437\u043c\u043e\u0436\u043d\u0430, \u043f\u043b\u0430\u043d\u0435\u0442\u0430 \u0440\u0430\u0437\u0440\u0443\u0448\u0435\u043d\u0430","29":"\u0422\u0440\u0430\u043d\u0441\u043f\u043e\u0440\u0442\u0438\u0440\u043e\u0432\u043a\u0430 \u0440\u0435\u0441\u0443\u0440\u0441\u043e\u0432 \u043d\u0435\u0432\u043e\u0437\u043c\u043e\u0436\u043d\u0430","30":"\u0423\u0434\u0435\u0440\u0436\u0438\u0432\u0430\u0442\u044c \u043f\u043b\u0430\u043d\u0435\u0442\u0443 \u0430\u043b\u044c\u044f\u043d\u0441\u0430 \u043c\u043e\u0433\u0443\u0442 \u0442\u043e\u043b\u044c\u043a\u043e \u0447\u043b\u0435\u043d\u044b \u0430\u043b\u044c\u044f\u043d\u0441\u0430","33":"\u041f\u0440\u0435\u0432\u044b\u0448\u0435\u043d \u043b\u0438\u043c\u0438\u0442 \u0444\u043b\u043e\u0442\u0430.","99":"\u041f\u043e\u043b\u0435\u0442\u044b \u0441 \u043f\u043b\u0430\u043d\u0435\u0442\u044b \u0430\u043b\u044c\u044f\u043d\u0441\u0430 \u043d\u0435 \u0432\u043e\u0437\u043c\u043e\u0436\u043d\u044b","100":"\u0412\u044b \u043d\u0435 \u043c\u043e\u0436\u0435\u0442\u0435 \u0448\u043f\u0438\u043e\u043d\u0438\u0442\u044c \u044d\u0442\u0443 \u043f\u043b\u0430\u043d\u0435\u0442\u0443 \u0441\u0435\u0439\u0447\u0430\u0441. \u041e\u0433\u0440\u0430\u043d\u0438\u0447\u0435\u043d\u0438\u0435 \u043e\u0434\u043d\u043e \u0441\u043a\u0430\u043d\u0438\u0440\u043e\u0432\u0430\u043d\u0438\u0435 \u0432 \u0442\u0435\u0447\u0435\u043d\u0438\u0438 \u043f\u044f\u0442\u0438 \u0441\u0435\u043a\u0443\u043d\u0434." };
	var FlagCaptcha	= false;
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.flight_3}</div>');	
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/flight.js?0007"></script>
{/block}
