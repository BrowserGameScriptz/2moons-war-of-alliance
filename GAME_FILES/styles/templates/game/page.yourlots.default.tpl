{block name="title" prepend}{$LNG.lm_fleet}{/block}
{block name="content"}
<div id="gr-conteiner">
	<div id="gr-left-side" class="bg-g-b">
				
		<div id="gr-left-menu">
			<div class="gr-title-menu">{$LNG.market_1}</div><div onclick="Gr.LeftShow('resources');" class="btn btn-primary gr-btn-menu gr-btn">{$LNG.market_2}</div><div class="gr-title-menu">{$LNG.market_3}</div><div onclick="parent.Dialog.CreateLotResources();" class="btn btn-primary gr-btn-menu gr-btn">{$LNG.market_4}</div><div onclick="parent.Frame.IFrame.open('market', 'yourlots');" class="btn btn-primary gr-btn-menu gr-btn ">{$LNG.market_5}</div>
		</div>
		
	</div>
	<div id="gr-lost-msg">           
	</div>
	<div id="gr-content">
		<div class="build-type">{$titleSale}</div>   
					{if !empty($saleArray)}<table class="gr-table">
        <tr>
        	<th style="width:15px;">&nbsp;</th>
            <th>{$LNG.market_8}</th> 
            <th>{$LNG.market_9}</th>  
            <th>{$LNG.market_20}</th> 
			<th>{$LNG.market_21}</th> 
            <th>&nbsp;</th>
        </tr>
		{foreach $saleArray as $saleId => $sale} <tr>
        	<td>{$sale@iteration}</td> 
            <td>
				<div class="gr-res-row c-{$sale.soldType}">
					<div class="gr-res-row-i ri i-{$sale.soldType}"></div>
					{$sale.soldAmount|number}
				</div>
			</td>   
			 <td>
				<div class="gr-res-row c-{$sale.buyType}">
					<div class="gr-res-row-i ri i-{$sale.buyType}"></div>
					{$sale.buyAmount|number}
				</div>
			</td>             
			<td>{$sale.buyRatio}</td> 
            <td>{$sale.inputTime}</td> 
            <td>{if $sale.showAttribute == 1}<a class="gr-btn btn btn-primary" href="game.php?page=market&amp;mode=getresourceslots&amp;id={$saleId}">{$LNG.market_22}</a>{elseif $sale.showExpired == 1}<a class="gr-btn btn btn-danger" href="game.php?page=market&amp;mode=delresourceslots&amp;id={$saleId}" onclick="return confirm('{$sale.Count}');">{$LNG.market_24}</a>{/if}
				            </td>  
        </tr>{/foreach}
                </table>{/if}
           
	 </div>
</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/market.js?0006"></script>
{/block}