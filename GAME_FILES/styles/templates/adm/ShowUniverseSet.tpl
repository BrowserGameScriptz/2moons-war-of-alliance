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
                    <span id="block1-header" class="group-header">Settings of the universe</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
				<form method="post">
                    <div class="icon-container-body">
						<div class="form-group">
							<label>
								Name of the Universe
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="uni_name" value="{$uni_name}" class="form-control" maxlength="60">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Game speed
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="game_speed" value="{$game_speed}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Fleet speed
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="fleet_speed" value="{$fleet_speed}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Speed of production of resources
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="resource_multiplier" value="{$resource_multiplier}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Expedition speed
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="halt_speed" value="{$halt_speed}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Energy Factor
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="energySpeed" value="{$energySpeed}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Max. Solar systems
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" name="max_system" value="{$max_system}" class="form-control">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Closed server message
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<textarea rows="5" cols="5" name="close_reason" class="form-control">{$close_reason}</textarea>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="checkbox" name="closed"{if $game_disable} checked="checked"{/if}> Server Online
									<input type="checkbox" name="reg_closed" style="margin-left:120px;"{if $reg_closed} checked="checked"{/if}> Close the registrations
									<input type="checkbox" name="adm_attack" style="margin-left:120px;"{if $adm_attack} checked="checked"{/if}> Admin game protection
									<input type="checkbox" name="user_valid" style="margin-left:120px;"{if $user_valid} checked="checked"{/if}> The system of checking email
								</div>
							</div>
						</div>
						
						<div class="form-group" style="float:right;">
							<input value="Save" class="btn btn-primary" id="submit_new_setting" type="submit">
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