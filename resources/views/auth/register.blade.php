@extends('templates.main')

@section('content')
<h1>Register</h1>

<form method="post" action = "{{route('register')}}">
    {{-- csrf token automatically --}}
@csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input name= "name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value={{old('name')}}>
    </div>
        @error('name')
        <span class="invalid-feedback" role= "alert">{{$message}}</span>
        @enderror
     
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value={{old('email')}}>
      </div>

        @error('email')
        <span class="invalid-feedback"  role= "alert">{{$message}}</span>
        @enderror 

    <div class="mb-3">
      <label for="password" class="form-label " >Password</label>
      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
    </div>

    @error('password')
    <span class="invalid-feedback"  role= "alert">{{$message}}</span>
    @enderror

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input name = "password_confirmation" type="password" class="form-control" id="password_confirmation">
      </div>
  

   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection