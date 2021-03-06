<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- CSRF PROTECTION --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Configuration application name --}}
        <title>{{config('app.name', 'User Management System')}}</title>
        {{-- <title>Authentication</title> --}}

        <!-- Fonts -->

        <!-- Styles -->
        {{-- The ASSET function generates a URL for an asset using the current scheme of the request (HTTP or HTTPS): --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <!-- JS -->
        {{-- Defer loading javascript: It loads at the end of the page load --}}
        
    </head>

    <body>
        {{-- Remove class: navbar-light bg-light --}}
        <nav class="navbar navbar-expand-lg ">
            <div class="container">
              <a class="navbar-brand" href="#">{{config('app.name', 'User Management System')}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                </ul>
                <div class="d-flex">
                   
                        @if (Route::has('login'))
                            <div >
            
                                @auth
                                    <a href="{{ route('user.profile') }}" >Profile</a>
                                    {{--What is event.preventDefault vaf submit()?  --}}
                                    {{--jQuery event.preventDefault(): Mục đích: Ngăn chặn mở một liên kết URL --}}
                                    {{--jQuery submit(): Hàm submit một sự kiện/The submit event occurs when a form is submitted. --}}

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Logout</a>

                                    <form action="{{route('logout')}}" method="post" id="logout-form">
                                        @csrf
                                    </form>
                                    @else
                                    <a href="{{ route('login') }}" >Log in</a>
            
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" >Register</a>
                                    @endif
            
                                @endauth
            
                            </div>
            
                        @endif
                    
                </div>
              </div>
            </div>
          </nav>
       
          {{-- Nếu Gate chưa log in thì không hiển thị sub-nav --}}
          @can('logged-in')
          <nav class="navbar navbar-expand-lg sub-nav" style="background-color:white; " >
            <div class="container">
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" >
                  <li class="nav-item">
                    <a class="nav-link active" style="color: black" aria-current="page" href="#22">Home</a>
                  </li>
                  @can('is-admin')
                  <li class="nav-item">
                    <a class="nav-link" style="color: black" href="{{ route('admin.users.index') }}">Users</a>
                  </li>
                  @endcan
                  {{-- class 'dropdown' is not exist in Bt5.0 --}}
               
                </ul>
              
              </div>
            </div>
          </nav>
          @endcan
        <main class="container mt-4">
          {{-- Flash notifications --}}
          @include('notifications.alert')
            @yield('content')
        </main>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" ></script>
    </body>
</html>
