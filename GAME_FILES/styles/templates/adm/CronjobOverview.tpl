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
                    <span id="block1-header" class="group-header">Cronjob Settings</span>
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
									<th>Hour</th>
									<th>Minute</th>
									<th>Day</th>
									<th>Class</th>
									<th>Next Cron</th>
									<th>Active</th>
									<th>Locked</th>
									<th class="text-center">Actions</th>
								</tr>
							</thead>
							<tbody>
								{foreach item=CronjobInfo from=$CronjobArray}
									<tr>
										<td>{$CronjobInfo.id}</td>
										<td>{if isset($LNG.cronName[$CronjobInfo.name])}{$LNG.cronName[$CronjobInfo.name]}{else}{$CronjobInfo.name}{/if}</td>
										<td>{$CronjobInfo.hours}</td>
										<td>{$CronjobInfo.min}</td>
										<td>{$CronjobInfo.dom}</td>
										<td>{$CronjobInfo.class}</td>
										<td>{if $CronjobInfo.isActive}{date($LNG.php_tdformat, $CronjobInfo.nextTime)}{else}-{/if}</td>
										<td>{if $CronjobInfo.isActive}<a href="admin.php?page=cronjob&amp;id={$CronjobInfo.id}&amp;active=0"><span class="label label-success">Active</span></a>{else}<a href="admin.php?page=cronjob&amp;id={$CronjobInfo.id}&amp;active=1"><span class="label label-danger">Not active</span></a>{/if}</td>
										<td>{if $CronjobInfo.lock}<a href="admin.php?page=cronjob&amp;id={$CronjobInfo.id}&amp;lock=0"><span class="label label-danger">Locked</span></a>{else}<a href="admin.php?page=cronjob&amp;id={$CronjobInfo.id}&amp;lock=1"><span class="label label-success">Active</span></a>{/if}</td>
										<td class="text-center">
											<ul class="icons-list">
												<li class="dropdown">
													<a href="#" class="dropdown-toggle" data-toggle="dropdown">
														<i class="icon-menu9"></i>
													</a>

													<ul class="dropdown-menu dropdown-menu-right">
														<li><a href="admin.php?page=cronjob&detail={$CronjobInfo.id}"><i class="icon-pencil5"></i> Edit Cron</a></li>
														<li><a href="admin.php?page=cronjob&delete={$CronjobInfo.id}"><i class="glyphicon glyphicon-remove"></i> Delete Cron</a></li>
													</ul>
												</li>
											</ul>
										</td>
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