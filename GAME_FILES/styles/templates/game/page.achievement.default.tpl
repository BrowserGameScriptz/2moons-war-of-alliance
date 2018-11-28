{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="achivment">
    {foreach $AchievementList as $ID => $Achiev}   
	<div id="a{$ID}" class="build-box ach-box">
		
		<div class="ach-text-title">
			<span>{$LNG.tech.$ID}  {$LNG.bd_lvl} {$Achiev.level}</span>                            
		</div>
		
		<div class="ach-img i-a{$ID}"></div>	

		<div class="ach-next-info-completion bga-902">
			<div class="ach-next-info-line i-902" style="width:20%;"></div>		
		</div>
		
		<div class="ach-text">
			{$LNG.techDesc.$ID}. 
		</div>
		
				<div class="ach-text-need c-902">
			{$Achiev.count} / 32                                        
		</div>
			
			
		<div class="ach-rewards">
			<div class="ach-reward tooltip" data-tooltip-content="{$LNG.officer_4}">
				<div class="build-price-ico ri i-800"></div>
				<div class="build-price-text">{$Achiev.bonus800|number}</div>
			</div>
			<div class="ach-reward tooltip" data-tooltip-content="{$LNG.achieve_1}">
				<div class="build-price-ico ri i-999"></div>
				<div class="build-price-text">{$Achiev.bonusExpe|number}</div>
			</div>
			<div class="ach-reward tooltip" data-tooltip-content="{$LNG.tech.921}">
				<div class="build-price-ico ri i-921"></div>
				<div class="build-price-text">{$Achiev.bonus921|number}</div>
			</div>
        </div>  
	</div>{/foreach} <!--/ach_content-->

		
</div><!--/achivment--> 

<script type="text/javascript">		
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">{$LNG.frame_7}</div>'
		+'<div class="title-res tooltip" data-tooltip-content="{$LNG.officer_4}">'
			+'<div class="title-res-ico ri i-800"></div>{$achievements}'
        +'</div>'
	);
	parent.setTooltip(parent.Frame.IFrame.N[1]);
</script>
{/block}