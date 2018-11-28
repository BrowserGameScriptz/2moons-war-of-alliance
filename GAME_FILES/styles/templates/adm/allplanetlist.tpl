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
                    <span id="block1-header" class="group-header">{$titlePage}</span>
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
									<th>Owner</th>
									<th>Last activity</th>
									<th>Galaxy</th>
									<th>System</th>
									<th>Planet</th>
									<th>Have moon ?</th>
								</tr>
							</thead>
							<tbody>
							{foreach $OnlineList as $planetID => $planetRow} 
								<tr>
									<td>{$planetID}</td>
									<td>{$planetRow.name}</td>
									<td>{$planetRow.userName} (ID: {$planetRow.userID})</td>
									<td>{$planetRow.lastact}</td>
									<td>{$planetRow.galaxy}</td>
									<td>{$planetRow.system}</td>
									<td>{$planetRow.planet}</td>
									<td>{if $planetRow.id_luna == 0}<span class="label label-danger">No</span>{else}<span class="label label-success">Yes</span>{/if}</td>
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