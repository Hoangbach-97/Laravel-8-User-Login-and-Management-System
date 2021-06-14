@extends('templates.main')

@section('content')

<h1>Password Reset</h1>

<form method="post" action = "{{route('password.email')}}">
    {{-- csrf token automatically --}}
@csrf

   
     
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value={{old('email')}}>
      </div>

        @error('email')
        <span style="color: rgb(218, 9, 9)"  role= "alert">{{$message}}</span>
        @enderror 


    <button type="submit" class="btn btn-primary">Send</button>
  </form>

@endsection