{block name="title" prepend}{$LNG.lm_playercard}{/block}
{block name="content"}
{if $id != $yourid}<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.lm_playercard}</div>
</div>
{else}
<div class="title-nav bga-tn"> 
	<div class="title-text">
<div class="title-tabs">
	<div class="title-tab" onclick="location = 'game.php?page=playerCard&id={$yourid}';">{$LNG.playercar_13}</div>
	<div class="title-tab title-tab-active" onClick="location = 'game.php?page=playerCard&mode=factor&id={$yourid}';">{$LNG.frame_5}</div>
	<div class="title-tab" onClick="location = 'game.php?page=buddyList&id={$yourid}';">{$LNG.playercar_28}</div>
</div>
</div>
</div>{/if}
<div id="popup">
	
<div id="playercard">

	<div class="pl-part-left">
	
		<div class="pl-title">		
			{$LNG.playercar_34}
		</div>
		<div class="pl-box bga-b2">			

			
				
			<div><span class="c-902">+{$bonusAttackPlayer|number}%</span>  {$LNG.playercar_35}</div>
						
				
			<div><span class="c-902">+{$bonusShieldPlayer|number}%</span>  {$LNG.playercar_36}</div>
						
				
			<div><span class="c-902">+{$bonusArmorPlayer|number}%</span>  {$LNG.playercar_37}</div>
						
						
				
			<div><span class="c-902">+{$bonusConstruPlayer|number}%</span>  {$LNG.playercar_38}</div>
							
				
			<div><span class="c-902">+{$bonusResourPlayer|number}%</span>  {$LNG.playercar_40}</div>
						
				
			<div><span class="c-902">+{$bonusEnergyPlayer|number}%</span>  {$LNG.playercar_41}</div>
						
						
				
			<div><span class="c-902">+{$bonusSpeedFPlayer|number}%</span>  {$LNG.playercar_42}</div>
						
				
			<div><span class="c-902">+{$bonusSavingPlayer|number}%</span>  {$LNG.playercar_43}</div>
						
				
			<div><span class="c-902">+{$bonusSpyinPlayer|number} </span>  {$LNG.playercar_44}</div>
						
				
			<div><span class="c-902">-25%</span>  {$LNG.playercar_45}</div>
						
				
			<div><span class="c-902">-100%</span>  {$LNG.playercar_46}</div>
						
						
				
			<div><span class="c-902">+{$bonusSlotsPlayer|number} </span>   {$LNG.playercar_47}</div>
						
						
						
				
			<div><span class="c-902"> 60s </span> {$LNG.playercar_48}</div>
						
				
			<div><span class="c-902">+20%</span>  {$LNG.playercar_49}</div>
						
						
						
						
						
						
						
						
						
						
				
			<div><span class="c-902">+{$bonusFleetPoPlayer|number} </span>  {$LNG.playercar_50}</div>
						
						
						
						
						
						
						
						
				
			<div><span class="c-902">+70%</span>  {$LNG.playercar_51}</div>
						
				
			<div><span class="c-902">+{$bonusExpeSlPlayer|number} </span>  {$LNG.playercar_52}</div>
						
						
						
				
			<div><span class="c-902">+{$bonusLaserPlayer|number}%</span>  {$LNG.playercar_53}</div>
						
				
			<div><span class="c-902">+{$bonusIonsPlayer|number}%</span>  {$LNG.playercar_54}</div>
						
						
						
				
			<div><span class="c-902">+{$bonusJetEnPlayer|number}%</span>  {$LNG.playercar_55}</div>
						
						
						
						
				
			<div><span class="c-902">+{$bonusLighAPlayer|number}%</span>  {$LNG.playercar_56}</div>
						
						
						
				
			<div><span class="c-902">+{$bonusLighSPlayer|number}%</span>  {$LNG.playercar_57}</div>
						
						
						
						
				
			<div><span class="c-902">+{$bonusLighS1Player|number}%</span>  {$LNG.playercar_58}</div>
						
						
						
				
			<div><span class="c-902">+5%</span>  {$LNG.playercar_59}</div>
					
		</div>
		
		<div class="clear"></div>		
	</div>
	
	<div class="pl-part-right">
	
		<div class="pl-title">		
			{$LNG.premName.6}
		</div>
		<div class="pl-box bga-b2">			
		
			<div>{$LNG.playercar_29}: <span class="c-902">{$expeSend|number}</span></div>
			<div>{$LNG.playercar_30}: <span class="c-902">{$expeResFound|number}</span></div>
			<div>{$LNG.playercar_31}: <span class="c-902">{$expeDmFound|number}</span></div>
			<div>{$LNG.playercar_32}: <span class="c-902">{$expeFleetFound|number}</span></div>
			<div>{$LNG.playercar_33}: <span class="c-902">{$expeStelarFound|number}</span></div>
			
		</div>
		
		<div class="clear"></div>		
	</div>
	
	<div class="clear"></div>
</div>

</div>
{/block}
