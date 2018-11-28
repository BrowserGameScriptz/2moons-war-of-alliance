{block name="title" prepend}{$LNG.siteTitleRegister}{/block}
{block name="content"}
<!-- BODY-->
<div class="main_b_holder" align="center">
{if $ShowUser.display == 0}
{include file="page.notlogged.default.tpl"}
{else}
{include file="page.logged.default.tpl"}
{/if}
 <div class="sec_b_holder" align="center">
  <div id="body" align="left">
   <!-- BODY Content start here -->
   

 <div class="sub-page-title">
  <div id="title"><h1>{$LNG.siteTitleRegister}<p></p><span></span></h1></div>
 </div>

 <div class="container_2" align="center">

<div class="error-holder">
   </div>

   <div class="container_3" align="center">

    <!-- FORMS -->
	<form id="registerForm" method="post" action="index.php?page=register" data-action="index.php?page=register" name="registrationForm">
	<input type="hidden" value="send" name="mode">
	<input type="hidden" value="{$externalAuth.account}" name="externalAuth[account]">
	<input type="hidden" value="{$externalAuth.method}" name="externalAuth[method]">
	<input type="hidden" value="{$referralData.id}" name="referralID">

        
        <div class="row">
          <label for="register-username">{$LNG.custom_p31}</label>
          <input type="text" name="username" id="register-username" tabindex="1" />
        </div>

        <div class="row">
          <label for="register-displayName">{$LNG.custom_p32}</label>
          <input type="text" name="displayname" id="register-displayName" tabindex="2" />
        </div>

        	<div class="seperator"></div>

        <div class="row">
          <label for="register-password">{$LNG.registerPassword}</label>
          <input type="password" name="password" id="register-password" tabindex="3" />
        </div>

        <div class="row">
          <label for="register-password2">{$LNG.registerPasswordReplay}</label>
          <input type="password" name="password2" id="register-password2" tabindex="4" />
        </div>

       		<div class="seperator"></div>

        <div class="row">
          <label for="register-email">{$LNG.registerEmail}</label>
          <input type="text" name="email" id="register-email" tabindex="5" />
        </div>

        	<div class="seperator"></div>
			
		{if count($languages) > 1}<div class="row">
        	<label>{$LNG.registerLanguage}</label>
            <select name="lang" style="width: 350px !important;" styled="true" id="select-style-2">
				{html_options options=$languages selected=$lang}
           </select>
        </div>{/if}
		<div class="seperator"></div>
        <div class="row">
        	<label>{$LNG.custom_p33}</label>
      		<input type="text" name="birthday[year]" placeholder="{$LNG.custom_p34}" tabindex="7" />
			<input type="text" name="birthday[day]" placeholder="{$LNG.custom_p35}" tabindex="6" />

            <select name="birthday[month]" styled="true" id="register-select-birthday-month">
            	<option disabled="disabled">{$LNG.custom_p36}</option>

				<option value="01">January</option><option value="02">February</option><option value="03">March</option><option value="04">April</option><option value="05">May</option><option value="06">June</option><option value="07">July</option><option value="08">August</option><option value="09">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option>
          	</select>
        </div>
        <div class="seperator"></div>

        <div class="row">
        	<label>{$LNG.custom_p39}</label>
            <select name="secretQuestion" style="width: 350px !important;" styled="true" id="select-style-1">
             	<option disabled="disabled">{$LNG.custom_p40}</option>

				<option value="1">{$LNG.custom_p41}</option><option value="2">{$LNG.custom_p42} </option><option value="3">{$LNG.custom_p43}</option><option value="4">{$LNG.custom_p44}</option><option value="5">{$LNG.custom_p45}</option><option value="6">{$LNG.custom_p46}</option><option value="7">{$LNG.custom_p47}</option>
           </select>
        </div>

        <div class="row">
          <label for="register-secretAnswer">{$LNG.custom_p48}</label>
          <input type="text" name="secretAnswer" id="register-secretAnswer" tabindex="8" />
        </div>
		{if !empty($referralData.id)}
		<div class="row">
          <label for="register-Refer">{$LNG.registerReferral}</label>
          <input type="text" name="Refer" id="register-Refer" value="{$referralData.name}" tabindex="8" readonly="readonly"/>
        </div>
		{/if}
        
        <div class="row" align="right">
       		<input type="submit" value="{$LNG.buttonRegister}" tabindex="10">
        </div>

      </form>
     <!-- FORMS.End -->

   </div>


 </div>

   <!-- BODY Content end here -->
   </div>
  </div>
 </div>
 <!-- BODY-->
{/block}
{block name="script" append}

{/block}