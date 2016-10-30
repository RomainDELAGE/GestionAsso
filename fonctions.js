function surveilleMail()
{
			var mail = $('#mail').val();
			var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
			if (!regEmail.test(mail))
			{
				$('#mail').css('background','rgb(220, 20, 60');
			}
			else
			{
				$('#mail').css('background','lightgreen');
			}
}

function surveilleTel()
{
	var tel = $('#tel').val();
	var regEmail = new RegExp('^[0-9]{10}');
	if(!regEmail.test(tel))
	{
		$('#tel').css('background','rgb(220, 20, 60');
	}
	else
	{
		$('#tel').css('background','lightgreen');
	}


}

function surveilleCp()
{
	var cp = $('#cp').val();
	var regCp = new RegExp('^[0-9]{5}');
	if(!regCp.test(cp))
	{
		$('#cp').css('background','rgb(220, 20, 60');
	}
	else
	{
		$('#cp').css('background','lightgreen');
	}


}

