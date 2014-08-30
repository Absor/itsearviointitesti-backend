<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Uusi salasana</h2>

		<div>
            Saadaksesi uuden salasanan mene osoitteeseen {{ Config::get('app.frontend_url') }}/#/password/reset/{{$token}} .<br/>
			Linkki vanhentuu {{ Config::get('auth.reminder.expire', 60) }} minuutin kuluttua.
		</div>
	</body>
</html>
