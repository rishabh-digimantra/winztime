<div style="width: 100%; display:block;">
<h2>{{ trans('labels.WelcomeEamailTitle') }}</h2>
<p>
	<strong>{{ trans('labels.Hi') }} {{ $userData->first_name }} {{ $userData->last_name }}!</strong><br>
	{{ trans('labels.VerificationCode') }}  {{ $six_digit_random_number }} <br><br>
	<strong>{{ trans('labels.Sincerely') }},</strong><br>
	{{ trans('labels.regardsForThanks') }}
</p>
</div>