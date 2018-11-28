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
                    <span id="block1-header" class="group-header">Translation Help</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
				<form method="post" id="form">
                    <div class="icon-container-body">
						<table id="subdomaintbl" class="sortable table table-striped">
							<thead>
								<tr>
									<th>Language</th>
									<th>Language Type</th>
									<th>Language Status</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								{$languageListShow}
								
							</tbody>
							<tfoot></tfoot>
						</table>

						
						<div class="form-group" style="float:right;">
							<a href="?page=newlanguage" class="btn btn-primary" id="submit_new_setting">Add New Language</a>
						</div>
						
						
						
					</div>
				</form>
				</div>
			</div>
			<div drop-area="" drop="handleDrop" data-group-name="block1" id="block1-drop-area" class="drop-area"></div>
		</div>
		
		 
		
		
    </div>
</div>
<script src="https://cdn.makeyourgame.pro/game/scripts/admin/messageList.js"></script>

    </div><!-- end main -->

</div>

            </div>
    <!-- PAGE TEMPLATE'S CONTENT END -->
{include file="overall_footer.tpl"}