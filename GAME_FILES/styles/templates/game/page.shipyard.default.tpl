{block name="title" prepend}{if $mode == "defense"}{$LNG.lm_defenses}{else}{$LNG.lm_shipshard}{/if}{/block}
{block name="content"}
<div id="build-content" class="full-scroll">
	
	{if !empty($BuildList)}
	<div id="queue-build" class="queue-box">
			{foreach $queueConstruction as $List}
			{$ID = $List.element}
			{if $List@first}
			<div id="q_{$List@iteration}" class="queue-block queue-block-big queue-block-big-mini queue-block-big-max" onClick="openQueueBlock({$List@iteration});">
				<div class="queue-time">{$List.timeque|time}</div>
				<div class="queue-btn-complete">
					<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
					<div class="queue-btn-complete-i i-921 ri"></div>
					<div class="queue-btn-complete-c">{$List.DMprice|number}</div>
					<form id="fc1" action="game.php?page=shipyard" method="post">
						<input type="hidden" name="action" value="complete">
						<input type="hidden" name="listid" value="{$List@iteration}">
						<input type="hidden" name="building" value="{$ID}">						
					</form>
					<div class="btn-transp"
						onClick="Confirm.cost(
							'{$LNG.frame_27}', 									
							'{$LNG.shipdef_8} <br /> {$LNG.tech.{$ID}} ({$List.amount|number})?',
							'{$List.DMprice|number}', 
							'$(\'#fc{$List@iteration}\').submit();', 
							921)">
					</div>
				</div>
				
				<div class="queue-p" style="width: 100%;"></div>
					
				<div class="queue-block">
					<div class="queue-img i-u{$ID} tooltip" data-tooltip-content="{$LNG.tech.$ID}"></div>
					<div class="queue-count">{$List.amount|number}</div>
					
					<form id="fd1" action="game.php?page=shipyard" method="post">
						<input type="hidden" name="action" value="delete">
						<input type="hidden" name="building" value="{$ID}">
						<input type="hidden" name="listid" value="{$List@iteration}">
					</form>	
					
					<div class="queue-cancel ri i-x bga-x"
						onClick="Confirm.action(
							'{$LNG.frame_27}', 									
							'{$LNG.shipdef_9}',
							'{$LNG.buildings_5}',
							'{$LNG.buildings_6}',
							'$(\'#fd{$List@iteration}\').submit();')">
					</div>
				</div>						
			</div>	
			{else}
			<div id="q_{$List@iteration}" class="queue-block queue-block-big queue-block-big-mini" onClick="openQueueBlock({$List@iteration});">							
				<div class="queue-time">{$List.timeque|time}</div>
				<div class="queue-btn-complete">
					<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
					<div class="queue-btn-complete-i i-921 ri"></div>
					<div class="queue-btn-complete-c">{$List.DMprice|number}</div>
					<form id="fc2" action="game.php?page=shipyard" method="post">
						<input type="hidden" name="action" value="complete">
						<input type="hidden" name="listid" value="{$List@iteration}">
						<input type="hidden" name="building" value="{$ID}">						
					</form>
					<div class="btn-transp"
						onClick="Confirm.cost(
							'{$LNG.frame_27}', 									
							'{$LNG.shipdef_8} <br /> {$LNG.tech.{$ID}} ({$List.amount|number})?',
							'{$List.DMprice|number}', 
							'$(\'#fc{$List@iteration}\').submit();', 
							921)">
					</div>
				</div>
				
				<div class="queue-p"></div>
					
				<div class="queue-block">
					<div class="queue-img i-u{$ID}"></div>
					<div class="queue-count">{$List.amount|number}</div>
					
					<form id="fd2" action="game.php?page=shipyard" method="post">
						<input type="hidden" name="action" value="delete">
						<input type="hidden" name="building" value="{$ID}">
						<input type="hidden" name="listid" value="{$List@iteration}">
					</form>	
					
					<div class="queue-cancel ri i-x bga-x"
						onClick="Confirm.action(
							'{$LNG.frame_27}', 									
							'{$LNG.shipdef_9}',
							'{$LNG.buildings_5}',
							'{$LNG.buildings_6}',
							'$(\'#fd{$List@iteration}\').submit();')">
					</div>
				</div>						
			</div>	
			{/if}
			{/foreach}
			<div id="q_all" class="queue-block queue-block-big queue-block-big-mini" onclick="openQueueBlock('all');">							
			<div class="queue-time">{$fullTimeS|time} </div>
			<div class="queue-btn-complete">
				<div class="queue-btn-complete-t">{$LNG.frame_26}</div>
				<div class="queue-btn-complete-i i-921 ri"></div>
				<div class="queue-btn-complete-c">{$fullPrice|number}</div>
				<form id="fcall" action="game.php?page=shipyard" method="post">
					<input name="action" value="complete" type="hidden">
					<input name="listid" value="1" type="hidden">
					<input name="all" value="1" type="hidden">					
				</form>
				<div class="btn-transp" onclick="Confirm.cost(
						'{$LNG.frame_27}', 									
						'Завершить все?',
						'{$fullPrice|number}', 
						'$(\'#fcall\').submit();',
						921)">
				</div>
			</div>				
			<div class="queue-block">
				<div class="queue-img i-call bga-921 tooltip" data-tooltip-content="Завершить все"></div>			
			</div>						
		</div>
			<div class="clear"></div>
	</div>
	{/if}
		
	<form action="game.php?page=shipyard" method="post">
		<div id="build-elements">			
			<div id="b-fleet" class="hide">
											<div class="build-type">
					{$LNG.shipdef_1}			
				</div>
				<div>
				
																	{foreach $elementList1F as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
															<div class="build-type">
					{$LNG.shipdef_2}			
				</div>
				<div>
																	{foreach $elementList2F as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
															<div class="build-type">
					{$LNG.shipdef_3}			
				</div>
				<div>													

																	
																	{foreach $elementList3F as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
															<div class="build-type">
					{$LNG.shipdef_4}			
				</div>
				<div>
																			{foreach $elementList4F as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
										</div>
			<div id="b-defenses" class="hide">
												
											<div class="build-type">
					{$LNG.shipdef_2}			
				</div>
				<div>
																{foreach $elementList1D as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
									
											<div class="build-type">
					{$LNG.shipdef_3}			
				</div>
				<div>
																	{foreach $elementList2D as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
																	
										<div class="clear"></div>
				</div>
									
											<div class="build-type">
					{$LNG.shipdef_4}			
				</div>
				<div>
															{foreach $elementList3D as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>
									
				
			</div>	
			<div id="b-prime" class="hide">							
				<div class="build-type">
					{$LNG.shipdef_6}		
				</div>
				<div>
																	{foreach $elementList1P as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>				
			
				<div class="build-type">
					{$LNG.shipdef_7}		
				</div>
				<div>
																	{foreach $elementList2P as $ID => $Element}<div id="s_{$ID}" class="build-box{if !$Element.techacc} build-box-required{/if}">

	<div class="build-head">
		<div class="build-i i-i ri bga-i" onclick="return parent.Dialog.info({$ID})"></div>           
		<div onclick="return parent.Dialog.info({$ID})" class="build-title">
			{$LNG.tech.{$ID}} 
			
			<div class="tooltip build-available" data-tooltip-content="{$LNG.bd_available}">
				[<span id="val_{$ID}">{$Element.available|number}</span>]
			</div>
		</div>		
	</div>
	
        <div class="build-content-box">
		<div class="build-img i-u{$ID}"></div>
		{if $Element.techacc}
		<div class="build-prices">
						{foreach $Element.costResources as $RessID => $RessAmount}
						<div class="build-price">
				<div class="build-price-ico ri i-{$RessID}"></div>
				<div class="build-price-text">
					<span class="c-{if $Element.costOverflow[$RessID] == 0}{$RessID}{else}red{/if} " data-tooltip-content="Не хватает: Металл 0">{$RessAmount|number}</span>
				</div>                                        
			</div>
			{/foreach}
						
			<div class="build-price build-time">
				<div class="build-price-ico ri i-time"></div>
				<div class="build-price-text">
				 
            		{$Element.elementTime|time}
            					</div>
			</div>		
		</div>
		{else}
		<div class="build-prices">
			<div class="build-price">
				{$LNG.buildings_1}:
			</div>
			{foreach $Element.AllTech as $elementID => $requireList}
				{foreach $requireList as $requireID => $NeedLevel}
					{if $NeedLevel.count > $NeedLevel.own}
						<div class="build-required tooltip" onclick="parent.Dialog.info({$requireID})" data-tooltip-content="{$LNG.tech.{$requireID}}:<br /> Lvl. {$NeedLevel.count}">
							<div class="build-required-img i-u{$requireID}"></div>
							<div class="build-required-level">{$NeedLevel.count}</div>			
						</div>
					{/if}
			{/foreach}
		 {/foreach}
		</div>
		{/if}
		{if !$Element.techacc || $Element.AlreadyBuild}{elseif $NotBuilding && $Element.buyable}
		<div class="build-count">
			<label title="{$LNG.bd_max_ships_long}" onclick="$('#input_{$ID}').val('{$Element.maxBuildable|number}'); counting('{$ID}');" class="build-count-max">{$LNG.bd_max_ships}</label>
			<div class="div_text count_ships_dots">
				<input class="build-count-input" onkeyup="counting('{$ID}');" type="text" name="fmenge[{$ID}]" id="input_{$ID}" size="{$maxlength}" maxlength="{$maxlength}" value="0" tabindex="{$smarty.foreach.FleetList.iteration}" />	
			</div>
		</div>
		{/if}
	</div>
	<div class="build-btn-box">
				{if !$Element.techacc}{elseif $Element.AlreadyBuild}<div class="btn btn-danger">{$LNG.bd_protection_shield_only_one}</div>{elseif $NotBuilding && $Element.buyable}<input class="btn btn-primary" type="submit" value="{$LNG.bd_build}" />{else}<div class="btn btn-danger">Not enough resources</div>{/if}	
	</div>
    </div>{/foreach}
										<div class="clear"></div>
				</div>				
			</div><!--/prime-->
			
		</div>
	
	</form>

</div>
<script type="text/javascript">
	Queue			= {$BuildList|json};
	DatatList		= {
	{foreach $elementList as $ID => $Element}
	"{$ID}":{ "id":"{$ID}","available":"{$Element.available|number}","costRessources":{ {foreach $Element.costResources as $RessID => $RessAmount}"{$RessID}":{$RessAmount}{if !$RessAmount@last},{/if}{/foreach} },"costOverflow":{ {foreach $Element.costOverflow as $RessID => $RessAmount}"{$RessID}":{$RessAmount}{if !$RessAmount@last},{/if}{/foreach} },"elementTime":{$Element.elementTime},"buyable":true,"maxBuildable":"{$Element.maxBuildable}","AlreadyBuild":false,"AlreadyBuildOne":false,"actionUnit":true }{if !$Element@last},{/if}
	{/foreach}
	};

	MaxCount		= 999999;
	bd_operating	= '{$LNG.bd_operating}';
	LNGning			= '{$LNG.buildings_2}:';
	LNGtech 		= { 901:'{$LNG.tech.901}', 902:'{$LNG.tech.902}', 903:'{$LNG.tech.903}', 911:'{$LNG.tech.911}', 921:'{$LNG.tech.921}' };
	
	parent.Frame.IFrame.N[1].html(
		'<div class="title-text">'
			+'{$LNG.lm_shipshard}'
        +'</div>'		
		+'<div class="title-res">'
			+'<div class="title-res-ico ri i-qs"></div>{$queueConstruction1} / {$maxBuildQueue}'
        +'</div>'
		+'<div class="title-tabs">'
			+'<div id="tab-fleet" class="title-tab" onClick="window.iframe.OpenTab(\'fleet\');">{$LNG.lm_fleet}</div>'
			+'<div id="tab-defenses" class="title-tab" onClick="window.iframe.OpenTab(\'defenses\');">{$LNG.lm_defenses}</div>'
			+'<div id="tab-prime" class="title-tab title-tab-dm" onClick="window.iframe.OpenTab(\'prime\');">{$LNG.shipdef_5}</div>'
		+'</div>'
	);
</script>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/shipyard.js?{$REV}"></script>
{/block}