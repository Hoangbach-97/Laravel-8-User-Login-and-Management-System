@extends('templates.main')

@section('content')
<div class="row">
    <div class="col-12">
        <h1 class=" float-left" style="float: left;">Users</h1>
        <a  class="btn btn-sm btn-success " style="float: right" href="{{ route('admin.users.create') }}" role="button">Create</a>
    </div>
</div>
<div class="card">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
          <tr>
            <th scope="row">{{ $user->id  }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>

            <td><a  class="btn btn-sm btn-primary" href="{{ route('admin.users.edit', $user->id) }}" role="button">Edit</a>

                

            <form action="{{ route('admin.users.destroy', $user->id) }}" style="display:none" id="delete-user-form-{{ $user->id }}" method="post">
            @csrf
            @method('DELETE')
            </form>

            <button class="btn btn-sm btn-danger" onclick="event.defaultPrevented;
                 document.getElementById('delete-user-form-{{ $user->id }}').submit(); ">Delete</button>
            
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
{{ $users->links() }}

</div>

@endsection
