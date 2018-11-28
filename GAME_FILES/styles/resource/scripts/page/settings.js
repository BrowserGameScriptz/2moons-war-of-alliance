function SettingsSet(f)
{	
	vacation = document.getElementById('vacationID').checked;
	if(vacation == true && f)
	{
		Confirm.action(
			lm_options,
			lng,
			yes,
			cancel,
			'SettingsSet(false);'
		);
		return false;
	}
	document.getElementById('form').submit();
}

function SoundTest(selected)
{
	parent.Frame.TopNav.A[0].load();
	parent.Frame.TopNav.A[0].volume = selected/10;
	parent.Frame.TopNav.A[0].play();
}