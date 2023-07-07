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
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>

    {{-- favicon --}}
     {{-- <link rel="icon" type="image/x-icon" href="{{asset('assets/favicons/favicon.ico')}}"> --}}
 <!-- Scripts -->
 @vite(['resources/css/app.css', 'resources/js/app.js'])
     <!-- Custom CSS -->
     {{-- <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}" > --}}
     <link rel="stylesheet" href="{{ asset('css/style.css') }}" >
     
     <!-- Font Awesome CSS -->
     {{-- <link rel="stylesheet" href="{{ secure_asset('font_awesome/css/all.min.css') }}" > --}}
     <link rel="stylesheet" href="{{ asset('font_awesome/css/all.min.css') }}" >
 
    <title> {{ config('app.name', 'Laravel') }}</title>
</head>


<body>
    
    <div id="page_container" class="flex flex_col">
        
        <nav id="navbar">
            <div id="nav_content" class="flex flex_row justify_btw align_ctr">
                <div id="site_logo" class="flex flex_row">
                    <i class="fa-solid fa-comments"></i>
                    <a href="{{ route('home') }}"> {{ config('app.name', 'Laravel') }} </a>
                </div>

                <div id="nav_toggle" class="nav_links flex flex_row align_ctr justify_arnd">
                    <div><a href="{{ route('home') }}">Home</a></div>
                    <div><a href="{{ route('posts') }}">Posts</a></div>
                    @if (Auth::user())
                        <div><a href="{{ route('my_profile') }}">Profile</a></div>
                    @endif
                        <div>
                        @if (Auth::user())
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <div class="white_back pointer p4" href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </div>
                            </form>
                        @else 
                            <a class="white_back pointer p4" href="/login">Login</a>
                        @endif
                        
                    </div>
                </div>

                <div class="menu_icon" id="menu_icon">
                    <i class="fa-solid fa-bars fa-2x"></i>
                </div>
            </div>
        </nav>

       

        <div id="main" class = "flex flex_col align_ctr">
            <div class=""> @include('inc.messages') </div>
            
            @yield('page_content')

        </div>
    
            <!-- FOOTER  -->
            <footer id="footer" class="flex margin_ctr">
               <span>&copy; 2023 {{ config('app.name', 'Laravel') }}</span>    
            </footer>
    </div>

<script src="{{ asset('js/app.js') }}"></script>


</body>

</html>