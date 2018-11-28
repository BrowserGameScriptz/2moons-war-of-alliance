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
                    <span id="block1-header" class="group-header">General Settings</span>
                    <span id="block1-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block1")' data-collapsed-indicator></span>
                </div>
                <div id="block1-body" data-group-body="block1" class="panel-body widget-collapsible ">
				<form method="post">
				<input type="hidden" name="block" value="1">
                    <div class="icon-container-body">
						<div class="form-group">
							<label>
								Title
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control"{if $isSubdomain == 1} readonly{/if} name="site_title" value="{$site_title}">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Site URL
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" readonly value="{$myurl}">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Admin Name
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" placeholder="Admin Name" name="admin_name" value="{$admin_name}">
								</div>
							</div>
						</div>
					
						<div class="form-group">
							<label>
								Admin Email
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" placeholder="admin@admin.ltd" name="admin_email" value="{$admin_email}">
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
		<!--BLOCK 2-->
		<div id="block2-container">
            <div id="block2-group" data-group-name="block2" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(block2)">
                    <span id="block2-header" class="group-header">Time & Numbers Settings</span>
                    <span id="block2-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block2")' data-collapsed-indicator></span>
                </div>
				<div id="block2-body" data-group-body="block2" class="panel-body widget-collapsible ">
				<form method="post">
				<input type="hidden" name="block" value="2">
                    <div class="icon-container-body">
						<div class="form-group">
							<label>
								Time Zone
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									{html_options name=timezone options=$Selector.timezone selected=$timezone}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>
								Date Format
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<select class="form-control" name="dateFormat">
										<option value="1"{if $dateFormat == 1} selected{/if}>07-02-08</option>
										<option value="2"{if $dateFormat == 2} selected{/if}>Thu 7/2/2008</option>
										<option value="3"{if $dateFormat == 3} selected{/if}>7th of February 2008</option>
										<option value="4"{if $dateFormat == 4} selected{/if}>07 Feb 08</option>
										<option value="5"{if $dateFormat == 5} selected{/if}>Thursday 7th of February</option>
									</select>
								</div>
							</div>
						</div>
								
						<div class="form-group">
							<label>
								Time Format
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<select class="form-control" name="timeFormat">
										<option value="1"{if $timeFormat == 1} selected{/if}>16:45:58</option>
										<option value="2"{if $timeFormat == 2} selected{/if}>16:45:58</option>
										<option value="3"{if $timeFormat == 3} selected{/if}>4:45 pm</option>
										<option value="4"{if $timeFormat == 4} selected{/if}>04:45 PM</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>
								Shortly Numbers
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<select class="form-control" name="isShortly">
										<option value="0"{if $isShortly == 0} selected{/if}>Disabled</option>
										<option value="1"{if $isShortly == 1} selected{/if}>Enabled</option>
									</select>
								</div>
							</div>
						</div>
						
						<div class="form-group" style="float:right;">
							<input value="Save" class="btn btn-primary" id="submit_new_user" type="submit">
						</div>
					</div>
				</div>
			</form>
			</div>
			<div drop-area="" drop="handleDrop" data-group-name="block2" id="block2-drop-area" class="drop-area"></div>
		</div>
		<!--BLOCK 3-->
		<div id="block3-container">
            <div id="block3-group" data-group-name="block3" class="panel panel-widget icon-menu-section" role="category">
                <div class="panel-heading widget-heading" ng-dblclick="toggleGroup(block3)">
                    <span id="block3-header" class="group-header">Templates Settings</span>
                    <span id="block3-collapsed-indicator" class="ng-cloak group-header-indicator pull-right fa fa-minus"
                        ng-click='toggleGroup("block3")' data-collapsed-indicator></span>
                </div>
				<div id="block3-body" data-group-body="block3" class="panel-body widget-collapsible ">
				<form method="post">
				<input type="hidden" name="block" value="3">
					<div class="icon-container-body">
						<div class="form-group">
							<label>
								Logo URL
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" placeholder="Enter Logo URL here" name="game_logo" value="{$site_logo}">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>
								Favicon URL
							</label>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<input type="text" class="form-control" placeholder="Enter Fav Icon URL here" name="game_fav" value="{$site_favicon}">
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
			<div drop-area="" drop="handleDrop" data-group-name="block3" id="block3-drop-area" class="drop-area"></div>
		</div>
    </div>
</div>


    </div><!-- end main -->

</div>

            </div>
    <!-- PAGE TEMPLATE'S CONTENT END -->
{include file="overall_footer.tpl"}