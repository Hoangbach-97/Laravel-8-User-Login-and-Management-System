@if(session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif

{{-- Session: status  co san trong Laravel Fortify --}}
@if(session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }} 
  </div>
@endif