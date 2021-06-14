@extends('templates.main')

@section('content')
<h1>Password Reset </h1>

<form method="post" action = "{{url('reset-password')}}">
    {{-- csrf token automatically --}}
@csrf

 <input type="hidden" name="token" value="{{$request->token}}">
     
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value="{{$request->email}}">
      </div>

        @error('email')
        <span style="color: rgb(218, 9, 9)" role= "alert">{{$message}}</span>
        @enderror 

    <div class="mb-3">
      <label for="password" class="form-label " >Password</label>
      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    </div>

    @error('password')
    <span style="color: rgb(218, 9, 9)"  role= "alert">{{$message}}</span>
    @enderror

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input name = "password_confirmation" type="password" class="form-control" id="password_confirmation">
      </div>
  

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection