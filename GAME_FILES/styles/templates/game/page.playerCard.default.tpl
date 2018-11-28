{block name="title" prepend}{$LNG.lm_playercard}{/block}
{block name="content"}
{if $id != $yourid}<div class="title-nav bga-tn">
	<div class="title-text">{$LNG.lm_playercard}</div>
</div>
{else}
<div class="title-nav bga-tn"> 
	<div class="title-text">
<div class="title-tabs">
	<div class="title-tab title-tab-active" onclick="location = 'game.php?page=playerCard&id={$yourid}';">{$LNG.playercar_13}</div>
	<div class="title-tab" onClick="location = 'game.php?page=playerCard&mode=factor&id={$yourid}';">{$LNG.frame_5}</div>
	<div class="title-tab" onClick="location = 'game.php?page=buddyList&id={$yourid}';">{$LNG.playercar_28}</div>
</div>
</div>
</div>{/if}
<div id="popup">
	
<div id="playercard">

	<div class="pl-box bga-b2">
		
		<div class="pl-part-left">
			<div class="pl-uname c-902 pl-line">			
				{$name}
			</div>
			{if $allyname}<div class="pl-aname pl-line" onclick="parent.Dialog.AllyInfo({$allyid})">{$allyname}&nbsp;</div>{/if}	
			<div class="pl-line f-ta-r">{$LNG.rec_level} {$commanderLevel}</div>
			<div class="pl-totals">				
				<div class="pl-totals-bar-bg wight-100 bga-level">
					<div class="pl-totals-bar-bg bga-level" style="width:{$commanderPirce}%; left:0;"></div>	
				</div>
			</div>
		</div>
		
		<div class="pl-part-right">
			<div class="pl-line">
				{$LNG.playercar_1} <div class="float-r">{$armement_points}</div>
			</div>
			<div class="pl-line">
				{$LNG.playercar_2} <div class="float-r">{$pointofwar|number}</div>
			</div>
			<div class="pl-line">
				{$LNG.playercar_3} <div class="float-r">0</div>
			</div>
		</div>
		
		<div class="clear"></div>
	</div>
	
	<div class="pl-part-left">
	
		<div class="pl-title">		
			{$LNG.playercar_4}
			{if $id == $yourid}<div class="pl-btn-ico i-save tooltip" data-tooltip-content="{$LNG.playercar_5}" onClick="$('#form').submit();"></div>{/if}		</div>
		{if $id == $yourid}<div class="pl-box bga-b2">
			<form action="game.php?page=playerCard" method="post" id="form">
   			<input type="hidden" name="save" value="true">
			
			<div class="pl-part-left">
			
				<div class="pl-line">
										<input name="p_name" class="pl-input" type="text" placeholder="{$LNG.playercar_6}" value="{$p_name}" maxlength="16" />
									</div>
				<div class="pl-line">
				<select name="p_country" id="scountry">
<option value="{if $p_country != ''}{$p_country}{else}{/if}">{if $p_country != ''}{$p_country}{else}Country...{/if}</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
									
									</div>
			
			</div>
			
			<div class="pl-part-right">
			
				<div class="pl-line">
										<input name="p_age" class="pl-input" type="text" placeholder="{$LNG.playercar_7}" value="{$p_age}" maxlength="16" />
									</div>
				
				<div class="pl-line">
										<input name="p_city" class="pl-input" type="text" placeholder="{$LNG.playercar_8}" value="{$p_city}" maxlength="24" />
									</div>

			</div>
			<div class="clear"></div>
			</form>
			
			<div class="pl-line">
				{$registered_on}
			</div>
		</div>{else}
		
		<div class="pl-box bga-b2">
			<form action="game.php?page=playerCard" method="post" id="form">
   			<input type="hidden" name="save" value="true">
			
			<div class="pl-part-left">
			
				<div class="pl-line">{$p_name}
																			</div>
				<div class="pl-line">
										{$p_country}
									</div>
			
			</div>
			
			<div class="pl-part-right">
			
				<div class="pl-line">{if !empty($p_age)}{$p_age}{/if}
																			</div>
				
				<div class="pl-line">{$p_city}
																			</div>

			</div>
			<div class="clear"></div>
			</form>
			
			<div class="pl-line">
				{$registered_on}
			</div>
		</div>
		
		{/if}
		
		<div class="pl-title">{$LNG.frame_7}</div>
		<div class="pl-box bga-b2 pl-achievs">
						{foreach $achievArray as $ID => $info}<div class="pl-achiev i-a{$ID} tooltip" data-tooltip-content="{$LNG.tech.$ID}:  Level {$info.level} "></div>{/foreach}
						<div class="clear"></div>
		</div>
		
	</div>
		
	<div class="pl-part-right">
	
		<div class="pl-title">{$LNG.playercar_11} </div>				
		<div class="pl-box bga-b2">
			<table class="wight-100 table-transparent"><tbody>
			<tr>
                <th class="f-ta-l"><span class="pl-line">{$LNG.pl_fightwon}</span></th>
				<th class="f-ta-c"><span class="pl-line">{$LNG.pl_fightdraw}</span></th>
				<th class="f-ta-r"><span class="pl-line">{$LNG.pl_fightlose}</span></th>                
            </tr>
            <tr>
                <td class="f-ta-l">{$wons} </td>
                <td class="f-ta-c">{$draws} </td>
				<td class="f-ta-r">{$loos} </td>
            </tr>
			</tbody></table>	
			<div>&nbsp;</div>		
			<div class="pl-line">
				{$LNG.playercar_9} <div class="float-r">{round($desunits1/$lostunits1,2)}</div>
			</div>			
			<div class="pl-line f-ta-c"> <span class="c-902">{$desunits}</span> / <span class="c-red">{$lostunits}</span></div>
			<div class="pl-totals">				
				<div class="pl-totals-bar bga-902">
					<div class="pl-totals-bar-bg bga-902" style="width:{$varDest}%; right:0;"></div>	
				</div>
				<div class="pl-totals-bar bga-red2">					
					<div class="pl-totals-bar-bg bga-red2"  style="width:{$varLost}%; left:0;"></div>
				</div>
			</div>
		</div>
		
		<div class="pl-title">{$LNG.playercar_11} </div>
		<div class="pl-box bga-b2">
			<table class="wight-100 table-transparent f-ta-c"><tbody>
			<tr>
                <th class="f-ta-l"><span class="pl-line">{$LNG.playercar_16}</span></th>
				<th class="f-ta-c"><span class="pl-line">{$LNG.playercar_17}</span></th>
				<th class="f-ta-c"><span class="pl-line">{$LNG.playercar_18}</span></th>
				<th class="f-ta-r"><span class="pl-line">{$LNG.playercar_19}</span></th>
            </tr>
            <tr>
                <td class="f-ta-l">{$expe_barbar|number}</td>
                <td class="f-ta-c">{$expe_pirat|number}</td>
				<td class="f-ta-c">{$expe_ancie|number}</td>
				<td class="f-ta-r">{$expe_ruin|number}</td>
            </tr>
			</tbody></table>
						<div>&nbsp;</div>			
			<div class="pl-line">
				{$LNG.playercar_10} <div class="float-r">{round($hostileGain1/$hostileLost1,2)}</div>
			</div>			
			<div class="pl-line f-ta-c"> <span class="c-902">{$hostileGain}</span> / <span class="c-red">{$hostileLost}</span></div>
			<div class="pl-totals">				
				<div class="pl-totals-bar bga-902">
					<div class="pl-totals-bar-bg bga-902" style="width:{$hosDest}%; right:0;"></div>	
				</div>
				<div class="pl-totals-bar bga-red2">					
					<div class="pl-totals-bar-bg bga-red2"  style="width:{$hosLost}%; left:0;"></div>
				</div>
			</div>
					</div>
		
		<div class="pl-title">{$LNG.st_statistics} </div>
		<div class="pl-box bga-b2">
			<table class="wight-100 table-transparent f-ta-c"><tbody>
            <tr>
                <th>&nbsp;</th>
                <th><span class="pl-line">{$LNG.st_points}</span></th>
                <th><span class="pl-line">{$LNG.st_position}</span></th>
            </tr>
			<tr>
                <td class="f-ta-l">{$LNG.playercar_1}</td>
                <td>{$armement_points}</td>
                <td>
                    {$armement_rank} {if !empty($newPosArm)}{$newPosArm}{/if}
                                    </td>
            </tr>
            <tr>
                <td class="f-ta-l">{$LNG.st_buildings}</td>
                <td>{$build_points}</td>
                <td>
                    {$build_rank} {if !empty(newPosBui)}{$newPosBui}{/if}
                                    </td>
            </tr>
            <tr>
                <td class="f-ta-l">{$LNG.st_fleets}</td>
                <td>{$fleet_points}</td>
                <td>
                    {$fleet_rank} {if !empty($newPosFle)}{$newPosFle}{/if}
                                    </td>
            </tr>
            <tr>
                <td class="f-ta-l">{$LNG.st_defenses}</td>
                <td>{$defs_points}</td>
                <td>
                    {$defs_rank} {if !empty($newPosDef)}{$newPosDef}{/if}
                                    </td>
            </tr>
            <tr>
                <td class="f-ta-l">{$LNG.st_researh}</td>
                <td>{$tech_points}</td>
                <td>
                    {$tech_rank} {if !empty($newPosResa)}{$newPosResa}{/if}
                                    </td>
            </tr>
    		</tbody></table>
		</div>
		
	</div>
	
	<div class="clear"></div>
</div>



</div>
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/playercard.js?{$REV}"></script>
{if $id != $yourid}<script type="text/javascript">
$(function() 
{	
	var Title = $('.title-nav:first');
	
	Title.append(
		'<div class="title-nav-sep"></div>'+
				'<div class="title-nav-btn i-frend tooltip" data-tooltip-content="{$LNG.sh_buddy_request}" onclick="parent.Dialog.Buddy({$id})"></div>'+
		'<a class="title-nav-btn i-enemy tooltip" data-tooltip-content="{$LNG.playercar_12}" href="/game.php?page=buddyList&mode=addenemies&id={$id}"></a>'+
		'<div class="title-nav-btn i-mesages tooltip" data-tooltip-content="{$LNG.st_write_message}" onclick="parent.Dialog.PM({$id});"></div>'				
	);	
	setTooltip(Title);
});
</script>{/if}
{/block}