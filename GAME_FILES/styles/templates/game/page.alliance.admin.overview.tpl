{block name="title" prepend}{$LNG.lm_alliance}{/block}
{block name="content"}
<div id="al-body">

	<div class="al-left bg-g-b">
		
		<div class="al-left-btn btn btn-primary i-al-overview tooltip" data-tooltip-content="{$LNG.alliance_10}" onclick="parent.Frame.IFrame.open('alliance');"></div>		
		<div class="al-left-btn btn btn-primary i-al-ranks tooltip" data-tooltip-content="{$LNG.al_manage_ranks}" onclick="parent.Frame.IFrame.open('alliance','admin&action=permissions');"></div>
		<div class="al-left-btn btn btn-primary i-al-layers tooltip" data-tooltip-content="{$LNG.al_manage_members}" onclick="parent.Frame.IFrame.open('alliance','admin&action=members');"></div>
		
				{if $rights.DIPLOMATIC}<div class="al-left-btn btn btn-primary i-al-diplo tooltip" data-tooltip-content="{$LNG.al_manage_diplo}" onclick="parent.Frame.IFrame.open('alliance','admin&action=diplomacy');"></div>{/if}
				
		
				{if $AllianceOwner}<div class="al-left-btn btn i-al-del tooltip" data-tooltip-content="{$LNG.al_legend_disolve_alliance}"
			onClick="Confirm.action(
				'{$LNG.frame_12}',
				'{$LNG.al_leave_ally}',
				'{$LNG.bd_continue}',
				'{$LNG.buildings_6}',
				'parent.Frame.IFrame.open(\'alliance\',\'admin&action=close\');');">
		</div>	
		<div class="al-left-btn btn i-al-betray tooltip" data-tooltip-content="{$LNG.al_transfer_alliance}" onclick="parent.Frame.IFrame.open('alliance','admin&action=transfer');"></div>{/if}
			
	</div><!--/al-left-->

	<div class="al-right-one">	
		<div class="al-content">
        	<div class="al-block al-block-one bg-g-b">
				<div class="al-block-title">
					{$LNG.al_manage_options}
				</div>                        
				<form action="game.php?page=alliance&mode=admin" method="post">
				<input type="hidden" name="send" value="1">   
					<div class="al-block-content">   						
						<label class="left_label">{$LNG.al_texts}</label>
						<textarea name="text" id="text" cols="70" rows="15" class="tinymce">{$text}</textarea>
						<div class="clear"></div>
						<label class="left_label">{$LNG.al_tag}</label>
						<input type="text" class="big_seting_text" name="ally_tag" value="{$ally_tag}" size="8" maxlength="8" required>
						<div class="clear"></div> 
						<label class="left_label">{$LNG.al_name}</label>
						<input type="text" class="big_seting_text" name="ally_name" value="{$ally_name}" size="20" maxlength="30" required>
						<div class="clear"></div>
						<label class="left_label">{$LNG.al_manage_founder_rank}</label>
						<input type="text" class="big_seting_text" name="owner_range" value="{$ally_owner_range}" size="30">
						<div class="clear"></div> 
						<label class="left_label">{$LNG.al_view_stats}</label>
						<select name="stats" class="big_seting_text">
<option value="1" class="big_seting_text option"{if $ally_stats_data == 1} selected{/if}>{$LNG.op_dst_mode_sel.1}</option>
<option value="0" class="big_seting_text option"{if $ally_stats_data == 0} selected{/if}>{$LNG.op_dst_mode_sel.0}</option>
</select>

						<div class="clear"></div> 
						<label class="left_label">{$LNG.al_view_events}</label>	
						<select name="events[]" class="big_seting_text" size="{$available_events|@count}" multiple>
				{foreach $available_events as $id => $mission}
					{foreach $ally_events as $selected_events}
						{if $selected_events == $id}
							{assign var=selected value=selected}
							{break}
						{else}
							{assign var=selected value=''}
						{/if}
					{/foreach}
					<option value="{$id}" {$selected}>{$mission}</option>
				{/foreach}
			</select>

						<div class="clear"></div>					
					</div>
					
					<div class="al-block-title">
						{$LNG.al_manage_requests}
					</div> 				 
					<div class="al-block-content">
						<label class="left_label">{$LNG.alliance_9}</label>	
						<select name="request_notallow" class="big_seting_text">
<option value="0" class="big_seting_text option"{if $ally_request_notallow == 0} selected{/if}>{$LNG.al_requests_allowed}</option>
<option value="1" class="big_seting_text option"{if $ally_request_notallow == 1} selected{/if}>{$LNG.al_requests_not_allowed}</option>
</select>

						<div class="clear"></div> 
						<label class="left_label">{$LNG.alliance_4}</label>	
						<input type="number" class="big_seting_text" min="0" name="request_min_points" value="{$ally_request_min_points}" size="30">
						<div class="clear"></div> 
						<label class="left_label">{$LNG.al_set_max_members}</label>	
						<input type="number" class="big_seting_text" min="0" name="ally_max_members" value="{$ally_max_members}" size="30">
						<div class="clear"></div>       
						<input type="submit" class="btn btn-primary" value="{$LNG.al_save}">
					</div>				
				</form>         
			</div><!--/al-block-one-->
			
		</div><!--/al-content-->
	</div><!--/al-right-one-->
	
</div><!--/al-body-->
{/block}
{block name="script" append}
<script act="load" type="text/javascript" src="./styles/resource/scripts/page/alliance.js?0006"></script>
<script type="text/javascript">
	parent.Frame.IFrame.N[1].html('<div class="title-text">{$LNG.al_manage_alliance}</div>');
</script>
<script type="text/javascript" src="scripts/base/tinymce/tiny_mce_gzip.js"></script>
<script type="text/javascript">
$(function() {
	tinyMCE_GZ.init({
		plugins : 'bbcode,fullscreen',
		themes : 'advanced',
		languages : '{$lang}',
		disk_cache : true,
		debug : false
	}, function() {
		tinyMCE.init({
			language : '{$lang}',
			script_url : 'scripts/base/tinymce/tiny_mce.js',
			theme : "advanced",
			mode : "textareas",
			plugins : "bbcode,fullscreen",
			theme_advanced_buttons1 : "bold,italic,underline,undo,redo,link,unlink,image,forecolor,styleselect,removeformat,cleanup,code,fullscreen",
			theme_advanced_buttons2 : "",
			theme_advanced_buttons3 : "",
			theme_advanced_toolbar_location : "bottom",
			theme_advanced_toolbar_align : "center",
			theme_advanced_styles : "Code=codeStyle;Quote=quoteStyle",
			content_css : "{$dpath}formate.css",
			entity_encoding : "raw",
			add_unload_trigger : false,
			remove_linebreaks : false,
			fullscreen_new_window : false,
			fullscreen_settings : {
				theme_advanced_path_location : "top"
			}
		});
	});
});
</script>
{/block}