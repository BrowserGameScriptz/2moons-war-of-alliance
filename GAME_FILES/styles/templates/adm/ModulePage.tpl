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
                    <span id="block1-header" class="group-header">{$mod_module}</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
                    <div class="icon-container-body">
						<table id="subdomaintbl" class="sortable table table-striped">
							<thead>
								<tr>
									<th class=" clickable sorttable_sorted">Module.Name</th>
									<th class=" clickable">Web URL</th>
									<th class=" clickable">Status</th>
									<th class=" clickable">Install</th>
									<th class=" clickable">Actions</th>
								</tr>
							</thead>
							<tbody>
								{foreach key=ID item=Info from=$Modules}
								<tr class="row-even">
									<td>{$Info.name}</td>
									<td>
										<a href=".#" target="_blank" class="ajaxfiles">
											{$Info.url}
										</a>
									</td>

									<td>{if $Info.state == 1}<span style="color:green">{$mod_active}</span>{else}<span style="color:red">{$mod_deactive}</span>{/if}</td>
									<td>
										<a id="antarislegacy.makeyourgame.pro_lnkRemove" class="btn btn-link" href="#">
											<span class="glyphicon glyphicon-trash"></span>
											Remove
										</a>
									</td>
									<td>
										<a id="antarislegacy.makeyourgame.pro_lnkManageRedirect" class="btn btn-link" href="{if $Info.state == 1}?page=module&amp;mode=deaktiv&amp;id={$ID}{else}?page=module&amp;mode=aktiv&amp;id={$ID}{/if}">
											<span class="glyphicon glyphicon-pencil"></span>
											{if $Info.state == 1}{$mod_change_deactive}{else}{$mod_change_active}{/if}
										</a>
									</td>
								</tr>
								{/foreach}
							</tbody>
							<tfoot></tfoot>
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