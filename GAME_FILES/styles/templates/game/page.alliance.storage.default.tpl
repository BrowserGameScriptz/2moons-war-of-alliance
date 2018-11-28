{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.alliance_12}</div>
</div>
<div id="popup">
	
<div class="full-scroll">
	<div class="al-block-content">
    <form id="storage">
        <input type="hidden" name="mode" value="storage">    
		<input type="hidden" name="action" value="putSend"> 
        <div class="fl-res-row fl-res-storage bga-901 tooltip" data-tooltip-content="{$LNG.fl_resources_left}">
			<div class="fl-res-storage-filling bga-901" id="r-filling"></div>
			<div class="fl-mis-row i-fl-storage">					
				<div class="fl-res-storage-count" id="r-count">{$maxStorage|number}</div>
				<div class="fl-res-storage-percent" id="r-percent">[ 0% ]</div>
			</div>
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
		
		<div class="fl-res-row">
			<div onclick="minResource('921');" class="fl-fleet-row-input-min">Min</div>
			<div onclick="maxResource('921');" class="fl-fleet-row-input-max">Max</div>
			<div class="fl-res-ico ri i-921"></div>                                  
			<input id="r921" class="fl-fleet-row-input fl-res-input input-text c-921 countdots" value="0" name="r921" type="text">
		</div>
		
		<div class="fl-res-row">
			<div onclick="minResource('942');" class="fl-fleet-row-input-min">Min</div>
			<div onclick="maxResource('942');" class="fl-fleet-row-input-max">Max</div>
			<div class="fl-res-ico ri i-942"></div>                                  
			<input id="r942" class="fl-fleet-row-input fl-res-input input-text c-942 countdots" value="0" name="r942" type="text">
		</div>
				
		<div class="fl-res-row fl-btn">
			<div class="btn btn-primary" onClick="StoragePutSend();">{$LNG.al_applyform_send}</div>
		</div>
    </form>
	</div>
</div>

</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0020"></script>
<script type="text/javascript">
	parent.$('#menu-rn').removeClass('blur');
	var MaxRes = {$maxStorage};
	$(function() 
	{	
		DOM['res']			= {
			'901' 		: $('#r901'),
			'902' 		: $('#r902'),
			'903' 		: $('#r903'),
			'921' 		: $('#r921'),
			'942' 		: $('#r942'),
			'count' 	: $('#r-count'),
			'filling' 	: $('#r-filling'),
			'percent' 	: $('#r-percent'),
		};		
		//-- Ввод кол-ва флота ресса	
		$('.fl-res-input').keyup(function(e) {	
			calculateStorageCapacity();
		});		
	});
	
</script>
{/block}