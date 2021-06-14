@extends('templates.main')

@section('content')

<h1>Login</h1>

<form method="post" action = "{{route('login')}}">
    {{-- csrf token automatically --}}
@csrf

   
     
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value={{old('email')}}>
      </div>

        @error('email')
        <span style="color: rgb(218, 9, 9)"  role= "alert">{{$message}}</span>
        @enderror 

    <div class="mb-3">
      <label for="password" class="form-label " >Password</label>
      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    </div>

    @error('password')
    <span style="color: rgb(218, 9, 9)"  role= "alert">{{$message}}</span>
    @enderror

    <button type="submit" class="btn btn-primary">Login</button>

  </form>
  <a href="{{ route('password.request') }}">Forgotten Password? Reset Password?!</a>

@endsection