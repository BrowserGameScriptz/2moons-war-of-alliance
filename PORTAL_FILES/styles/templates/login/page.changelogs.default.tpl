{block name="title" prepend}{$LNG.custom_p7}{/block}
{block name="content"}
<!-- BODY-->
<div class="main_b_holder" align="center">
{if $ShowUser.display == 0}
{include file="page.notlogged.default.tpl"}
{else}
{include file="page.logged.default.tpl"}
{/if}
 <div class="sec_b_holder" align="center">
  <div id="body" align="left">
   <!-- BODY Content start here -->
   

<div class="content_holder">

    <div class="sub-page-title">
    	<div id="title"><h1>{$LNG.custom_p7}<p></p><span></span></h1></div>
    </div>
 
  	<div class="container_2" align="center">
    	
            <div class="changelogs-cats">
            	<a href="index.php?page=changelogs&changelog=1"{if $changelogId == 1} class="active"{/if}>War of Alliance - [U1]<p>Website related changes and updates.</p></a>
				<div class="changelogs-cats2"><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- War Of Alliance / Ingame -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-2369063859511778"
     data-ad-slot="3578401527"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></div>
                <div class="clear"></div>
				
            </div>
        
            <div class="container_3 changelogs">
            <!-- Changelogs -->
				<table class="changes-list" id="changes-list">
					{foreach $DisplayChan as $ID => $Data}
					<tr>
						<td class="rev"><span style="color:rgba(117, 199, 240, 0.70)">Rev {$ID}</span></td>
						<td class="by"><p style="color:#4d98fd">{$Data.userName}</p></td>
						<td class="date"><span style="color:rgba(117, 199, 240, 0.70)">{$Data.timestamp}</span> </td>
						<td class="info"><span style="color:rgba(117, 199, 240, 0.50)">{$Data.text}</span></td>
					</tr>
					{/foreach}
				</table>                            
							{*<script type="text/javascript">
								var CurPage = 1;
								var Changelog = parseInt(1);
								var TotalPulled = parseInt(30);
								var TotalChangesets = parseInt(133);
								
								$(document).ready(function()
								{
									$("#load-more").on("click", function()
									{
										//update the curpage
										CurPage = CurPage + 1;
										
										//pull the data
										$.ajax({
											type: "GET",
											url: "ajax.php?phase=10&page="+CurPage+"&changelog="+Changelog,
											dataType: "xml",
											success: function(data)
											{
												//get the page records count
												var list = $(data).find('list');
												var count = parseInt($(data).find('count').text());
												
												//add separator
												if (count > 0)
												{
													//create our separator
													var element = $('<tr><td colspan="4" class="separator" style="width: 910px;"><center><strong>Additional Data</strong></center></td></tr>');
													//append our separator
													$('#changes-list').append(element);
												}
												
												//loop the changesets
												list.find('changeset').each(function(i, e)
												{
                                                    var revision = $(this).find('revision').text();
													var author = $(this).find('author').text();
                                                    var time = $(this).find('time').text();
                                                    var text = $(this).find('text').text();
													
													//create our changeset
													var element = $('<tr style="display:none;"><td class="rev">Rev '+revision+'</td><td class="by">'+author+'</td><td class="date">'+time+'</td><td class="info">'+text+'</td></tr>');
													//append our changeset
													$('#changes-list').append(element);
													//queue the effects
													WarcryQueue('changelogs').add(function()
													{
														element.fadeIn('slow', function()
														{
															WarcryQueue('changelogs').goNext();
														});
													});
													//run the effects queue
													WarcryQueue('changelogs').goNext();
                                               });
												
												//update the total pulled
												TotalPulled = TotalPulled + count;
												
												//check if we have no more to pull
												if (TotalPulled == TotalChangesets)
												{
													$('.load-more').detach();
												}
											}
										});
										
										return false;
									});
								});
								
							</script>
                            
							<div class="load-more"><a href="#" id="load-more">Load more</a></div>   *}  
					<!-- Changelogs.End -->                
            </div>
               
    </div>
    
</div>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}
<link rel="stylesheet" href="styles/resource/css/login/page-changelogs.css?v={$REV}">
{/block}