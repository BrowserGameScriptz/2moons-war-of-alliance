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
                    <span id="block1-header" class="group-header">Meta Settings</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
				<form method="post">
                    <div class="icon-container-body">
						<div class="form-group">
							<label>
								Meta Keywords
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" name="meta_title" value="{$meta_title}">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Meta Description
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<textarea rows="5" cols="5" name="meta_descrip" class="form-control">{$meta_descrip}</textarea>
								</div>
							</div>
						</div>
						
						<div class="form-group" style="float:right;">
							<input value="Save" class="btn btn-primary" id="submit_new_user" type="submit">
						</div>
					</div>
				</form>
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