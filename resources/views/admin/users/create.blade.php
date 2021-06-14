@extends('templates.main')

@section('content')
<h1>Create new users</h1>
<div class="card" style=" padding: 20px 25px">
<form method="post" action = "{{route('admin.users.store')}}">
   @include('admin.users.partials.form', ['create'=>true])
  </form>
</div>
@endsection