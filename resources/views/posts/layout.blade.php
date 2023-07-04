<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />


    {{-- favicon --}}
     {{-- <link rel="icon" type="image/x-icon" href="{{asset('assets/favicons/favicon.ico')}}"> --}}

     <!-- Custom CSS -->
     {{-- <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" > --}}
     <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
     
     <!-- Font Awesome CSS -->
     {{-- <link rel="stylesheet" href="{{ secure_asset('font_awesome/css/all.min.css') }}" > --}}
     <link rel="stylesheet" href="{{ asset('font_awesome/css/all.min.css') }}" >
 
    <title> {{ config('app.name', 'Laravel') }}</title>
</head>


<body>
    
    <div id="page_container">
        
        <nav id="navbar">
            <div id="nav_content" class="flex_row">
                <div id="" class="">
                    <a href="{{ route('home') }}"> {{ config('app.name', 'Laravel') }} </a>
                </div>

                <ul id="nav_toggle" class="nav_links flex_row">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('posts') }}">Posts</a></li>
                    <li>
                        @if (Auth::user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <div href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </div>
                            </form>
                        @else 
                            <a href="/login">Login</a>
                        @endif
                        
                    </li>
                </ul>

                <div class="menu_icon" id="menu_icon">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </nav>
        <div class="floating_icon">
            <a href="#"><i class="fa-solid fa-pencil fa-2x"></i></a>
        </div>

        <div id="main">
            <div class=""> @include('inc.messages') </div>
            
            @yield('page_content')

        </div>
    
            <!-- FOOTER  -->
            <footer id="footer">
                    
            </footer>
    </div>

<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>