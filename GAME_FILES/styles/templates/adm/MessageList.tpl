{include file="overall_header.tpl"}
{include file="overall_menu.tpl"}
<!-- PAGE TEMPLATE'S CONTENT START -->
    <div id="content" class="container-fluid">
        <div growl limit-messages="1"></div>

<div class="row">
    <div id="main" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        

<div ng-controller="applicationListController">

    <div id="boxes" application-list-filter search-text="searchText" collapsed-groups="collapsedGroups">
        <div drop-area drop="handleDrop" id="top-drop-area" class="drop-area"></div>
        <!--BLOCK 1-->
        <div id="block1-container">
            <div id="block1-group" data-group-name="block1" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(block1)">
                    <span id="block1-header" class="group-header">Message List Type</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
				<form action="admin.php?page=messagelist" method="post" id="form">
				<input type="hidden" name="side" value="{$page}" id="side">
                    <div class="icon-container-body">
						<div class="form-group">
							<label>
								{$LNG.ml_type}
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									{html_options options=$categories selected=$type name="type"}
								</div>
							</div>
						</div>

						<div class="form-group" style="float:right;">
							<input value="Display" class="btn btn-primary" id="submit_new_setting" type="submit">
						</div>
					</div>
				</form>
				</div>
			</div>
			<div drop-area="" drop="handleDrop" data-group-name="block1" id="block1-drop-area" class="drop-area"></div>
		</div>
		
		 <div id="block2-container">
            <div id="block2-group" data-group-name="block2" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(block2)">
                    <span id="block2-header" class="group-header">{$LNG.ml_message_list}</span>
                    <span id="block2-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block2")' data-collapsed-indicator></span>
                </div>
                <div id="block2-body" data-group-body="block2" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
						<table id="subdomaintbl" class="sortable table table-striped">
							<thead>
								<tr>
									<th style="width:4%">{$LNG.ml_id}</th>
									{if $Selected == 100}<th>{$LNG.ml_type}</th>{/if}
									<th style="width:15%">{$LNG.ml_date}</th>
									<th>{$LNG.ml_sender}</th>
									<th>{$LNG.ml_receiver}</th>
									<th>{$LNG.ml_subject}</th>
								</tr>
							</thead>
							<tbody>
								{foreach $messageList as $messageID => $messageRow}
									<tr data-messageID="{$messageID}">
										<td><a href="#" class="toggle">{$messageID}</a></td>
										{if $Selected == 100}<td><a href="#" class="toggle">{$LNG.mg_type[$messageRow.type]}</a></td>{/if}
										<td><a href="#" class="toggle">{$messageRow.time}</a></td>
										<td><a href="#" class="toggle">{$messageRow.sender}</a></td>
										<td><a href="#" class="toggle">{$messageRow.receiver}</a></td>
										<td><a href="#" class="toggle">{$messageRow.subject}</a></td>
									</tr>
									<tr id="contentID{$messageID}" style="display:none;">
										<td class="left" colspan="{if $Selected == 100}6{else}5{/if}" style="padding:5px 8px;">{$messageRow.text}</td>
									</tr>
								{/foreach}
							</tbody>
							<tfoot></tfoot>
						</table>
					</div>
				</div>
			</div>
			<div drop-area="" drop="handleDrop" data-group-name="block2" id="block2-drop-area" class="drop-area"></div>
		</div>
		
		
    </div>
</div>
<script src="https://cdn.makeyourgame.pro/game/scripts/admin/messageList.js"></script>

    </div><!-- end main -->

</div>

            </div>
    <!-- PAGE TEMPLATE'S CONTENT END -->
{include file="overall_footer.tpl"}