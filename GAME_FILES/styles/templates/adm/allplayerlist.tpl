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
                    <span id="block1-header" class="group-header">Player List</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
						<table class="table table-bordered table-hover datatable-highlight">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>E-mail</th>
									<th>Last activity</th>
									<th>Registration date</th>
									<th>Ultimate IP</th>
									<th>Authority</th>
									<th>Suspended?</th>
									<th>Holidays?</th>
								</tr>
							</thead>
							<tbody>
								{foreach $OnlineList as $userID => $onlineRow} 
								<tr>
									<td>{$userID}</td>
									<td>{$onlineRow.username}</td>
									<td>{$onlineRow.email_2}</td>
									<td>{$onlineRow.onlinetime}</td>
									<td>{$onlineRow.register_time}</td>
									<td>{$onlineRow.user_lastip}</td>
									<td>{$onlineRow.authlevel}</td>
									<td>{if $onlineRow.bana == 0}<span class="label label-success">Not banned</span>{else}<span class="label label-danger">Players banned</span>{/if}</td>
									<td>{if $onlineRow.urlaubs_modus == 0}<span class="label label-success">Not in vacation</span>{else}<span class="label label-danger">In hollidays</span>{/if}</td>
								</tr>
							{/foreach}	
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div drop-area="" drop="handleDrop" data-group-name="block1" id="block1-drop-area" class="drop-area"></div>
		</div>
    </div>
</div>


    </div><!-- end main -->

</div>

            </div>
    <!-- PAGE TEMPLATE'S CONTENT END -->
{include file="overall_footer.tpl"}