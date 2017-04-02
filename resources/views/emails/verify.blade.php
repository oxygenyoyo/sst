@extends('emails.layout')


@section('content')
<div class="col-md-6 col-md-offset-3 bg-white">
	<h1>Hi {{$user->name}}</h1>
	<p>
		Thanks for getting started with SST! We need a little more information to complete your registration, including confirmation of your email address. Click below to confirm your email address: 
		<br>
		<br>
		{{$verify_link}}
		<br>
		<br>
		If you have problems, please paste the above URL into your web browser.
	</p>
	<p>
		Thanks,<br>
		SST Support
	</p>
</div>
<!-- /.col-md-12 -->
@endsection