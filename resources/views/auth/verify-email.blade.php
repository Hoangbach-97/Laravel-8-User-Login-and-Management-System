@extends('templates.main')

@section('content')

<h1>Verify Email</h1>
<p>You must verify your email</p>
<form action="{{ route('verification.send') }}" method="post">
@csrf
<button type="submit" class="btn btn-primary">Resend Verification Email </button>
</form>

@endsection