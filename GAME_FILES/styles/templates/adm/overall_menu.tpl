<header id="masterAppContainer" ng-controller="applicationListController">
        <div class="navbar navbar-inverse navbar-cpanel navbar-fixed-top" role="navigation">
                <div class="navbar-header">
				
					<a id="lnkHeaderHome"  target="_top" href="admin.php" class="btn link-buttons" uib-tooltip="Home"  tooltip-placement="bottom" role="link" aria-label="Home">
                            <span id="logoutImg" class="glyphicon glyphicon-log-out"></span>
                            <span id="lblLogout" class="hidden-inline-xs">Home</span>
                    </a>
						
                    <div class="navbar-preferences form-inline">
                        <div class="btn-group" uib-dropdown>
                            <button id="btnUserPref">
                                <span id="userImg" class="glyphicon glyphicon-user"></span>
                                <span id="lblUserNameTxt" class="hidden-inline-xs">{$adminName}</span>
                            </button>
                        </div>
                       <a id="lnkHeaderLogout"  target="_top" href="frame.php" class="btn link-buttons" uib-tooltip="Logout"  tooltip-placement="bottom" role="link"
                             aria-label="Logout">
                            <span id="logoutImg" class="glyphicon glyphicon-log-out"></span>
                            <span id="lblLogout" class="hidden-inline-xs">Logout</span>
                        </a>
                    </div>
                </div>
        </div>
        <!-- UI INCLUDES GLOBAL HEADER -->
                <!-- UI INCLUDES GLOBAL HEADER END-->
    </header>
    
    <div id="stats" class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div id="generalInfoSection" class="panel panel-widget">
            <div id="generalInfoHeaderSection" class="panel-heading widget-heading">
                General Information
            </div>
            <table class="table">
                <tbody>
                    <tr>
                        <td ng-controller="accountsController">
                            <label id="lblUserName" class="general-info-label updating-elements">Current User</label>
                            
                                <span id="txtUserName" class="general-info-value">{$adminName}</span>
                            
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label id="lblDomainName" class="general-info-label">Primary Domain</label>
                            <span id="txtDomainName" class="general-info-value">{$domainHost}</span>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label id="lblLastLogin" class="general-info-label">Members Online</label>
                            <span id="txtLastLogin" class="general-info-value">{$membersOnline} Members online</span>
                        </td>
                    </tr>
					<tr>
                        <td>
                            <label id="lblLastLogin" class="general-info-label">Server Load</label>
                            <span id="txtLastLogin" class="general-info-value">{$serverLoad}% Current server load </span>
                        </td>
                    </tr>
                   
                    <tr>
                        <td>
                            <a href="home/status.html" id="lnkServerInfo"
                                alt='Server Information'>
                                Payment Informations
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div><!-- end stats -->