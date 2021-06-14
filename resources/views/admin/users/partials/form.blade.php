 {{-- csrf token automatically --}}
 @csrf

 <div class="mb-3">
   <label for="name" class="form-label">Name</label>
   <input name= "name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="name" 
   value={{old('name')}} @isset($user){{ $user->name }} @endisset>
 </div>
     @error('name')
     <span style="color: rgb(218, 9, 9)" role= "alert">{{$message}}</span>
     @enderror
  
 <div class="mb-3">
     <label for="email" class="form-label">Email address</label>
     <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="email" 
     value={{old('email')}} @isset($user) {{ $user->email }} @endisset>
   </div>

     @error('email')
     <span style="color: rgb(218, 9, 9)" role= "alert">{{$message}}</span>
     @enderror 

     {{-- Nếu là create thì hiện form input passwword --}}
     @isset($create) 

        <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
        </div>

        @error('password')
        <span style="color: rgb(218, 9, 9)"  role= "alert"> {{$message}} </span>

        @enderror

        
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Password Confirmation</label>
          <input name="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation">
          </div>
  
          @error('password_confirmation')
          <span style="color: rgb(218, 9, 9)"  role= "alert"> {{$message}} </span>
  
          @enderror

    @endisset

 
 <div class="mb-3">
   @foreach($roles as $role)
   <div class="form-check">
     {{-- Gía trị check sẽ truyền vào mảng name --}}
     {{-- Khi được check thì kết quả là:  name = value tức giá trị value sẽ truyền vào mảng name: https://www.w3schools.com/tags/tryit.asp?filename=tryhtml5_input_type_checkbox--}}
     {{-- Mối quan hệ giữa for trong lable và id trong input: UX khi chuột click vào nhãn thì được tương tác như click vào ô checkbox --}}
     <input class="form-check-input" name="roles[]" type="checkbox" value="{{ $role->id }}" id="{{ $role->name }}"
      @isset($user) @if(in_array($role->id, $user->roles->pluck('id')->toArray())) checked @endif @endisset > 
      {{-- in_array: nếu tồn tại current $role->id trong mảng thì hiểu là checked --}}
      {{-- $user->roles->pluck('id'):Vào trong USER model và put ids lên roles (ở đây là relationship), toArray: convert sang array để check --}}
     <label for="{{ $role->name }}">{{ $role->name }}</label>
   </div>
   @endforeach
 </div>
 <button type="submit" class="btn btn-primary">Submit</button>