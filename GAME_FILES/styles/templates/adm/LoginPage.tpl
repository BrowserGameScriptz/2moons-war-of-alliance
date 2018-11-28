{include file="overall_header.tpl"}
<link rel="stylesheet" href="admin/css/core.css">
	<link rel="stylesheet" href="admin/css/login.css">
    <link rel="stylesheet" href="admin/css/inputs.css">
<div id="wrapper">

		<div id="login-body" style="display: block;" class="show">
			<form id="login-form" class="show" action="" method="POST">

				<div id="login">

					<div id="login-user">
						<div class="icon-user"></div>
						<input id="username" class="login-input required" placeholder="Username" value="{$username}" autocomplete="off" type="text" readonly>
					</div>

					<div id="login-pass">
						<span class="icon-securityalt-shieldalt"></span>
                        <span id="forgot-psw" style="display: none">Forgot?</span>
						<input id="password" class="login-input required passwf" placeholder="Password" type="password" name="admin_pw">
					</div>

				</div>

				<div id="avatar"><img src="https://makeyourgame.pro/images/logo_small.png" alt="Selected user avatar"><div id="av-overlay"></div></div>

				<button id="login-btn" type="submit" class="button submit">Log in</button>

			</form>

            <form id="register-form" action="dash.html">
                <div id="register-inner">
                    <input id="reg-user" class="login-input required" placeholder="Username" autocomplete="off" type="text">
                    <input id="reg-pass" class="login-input required" placeholder="Password" type="password">
                    <input id="reg-email" class="login-input required email" placeholder="E-mail" type="text">
                </div>
                <button id="register-btn" type="submit" class="button submit">Register</button>
            </form>

			<div id="login-action">
				<div id="logo"></div>
				<div id="rb-check-cont">
					<label for="rb-check">Remember me</label>
					<div class="checkbox-cont rb-check"><input name="remember" id="rb-check" checked="" style="display: none;" type="checkbox"><div class="on grad2"><span class="icon-ok"></span></div></div>
				</div>
			</div>
		</div>

	</div><!--END WRAPPER-->

	<div id="load" style="display: none;"><div id="spinner"></div><div id="load-inner"></div></div>

	<!---jQuery Code-->
	<script type="text/javascript">
    $('#login-body').hide();
    $(window).bind('load', function() {
        $('#load').fadeOut(600, function() {
            $('#login-body').fadeIn(10, function() {
                $(this).addClass('show');
                $('#password').focus();
                if ($(window).width() <= 480) $('#password').blur();
            });
        });
    });

    var browserSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
    if (browserSafari) $('#wrapper').addClass('safari-fix');

    if ($.storage() == true) {
        localStorage.removeItem('user-name');
        localStorage.removeItem('user-avatar');
    } else {
        function lsnotif() {
            $('#wrapper').append('<div class="notif orange full slideUp">LocalStorage is disabled. Your settings will not be saved!<span class="icon icon-resistor"></span><p class="nt-det">Upgrade your browser or enable local data storage.</p></div>');
        };
        setTimeout(lsnotif, 2000);
        $.fn.notif();
    }

    var typeDelay;
   
    $('.input-error').click( function() {
        var trigger = $(this).data('trigger');
        $(this).offsetParent().find('input').eq(trigger).focus();
    });

    $('#password').keyup( function() { 
        if ($(this).val()) $('#forgot-psw').fadeOut(200)
        else $('#forgot-psw').fadeIn(300);
    });

    $('#reg-btn').click( function() {
        $('#login-form').removeClass('show');
        $('#register-form').addClass('show');
        $('#reg-user').focus();
    });

    $('#rb-check').checkfn();

    $('#login-form, #register-form').validate();

    </script>
{include file="overall_footer.tpl"}