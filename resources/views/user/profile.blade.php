@extends('templates.main')

@section('content')
<h1>Profile Update</h1>

<form method="post" action = "{{route('user-profile-information.update')}}">
  @method('PUT')
    {{-- csrf token automatically --}}
@csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input name= "name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" value={{auth()->user()->name}}>
    </div>
        @error('name')
        <span style="color: rgb(218, 9, 9)" role= "alert">{{$message}}</span>
        @enderror
     
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" value={{auth()->user()->email}}>
      </div>

        @error('email')
        <span style="color: rgb(218, 9, 9)" role= "alert">{{$message}}</span>
        @enderror 
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection