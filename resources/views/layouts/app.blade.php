<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    @yield('datatables')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if (auth()->user())
                        <ul class="navbar-nav mr-auto">
                            
                            @can('isAdmin')
                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">User</a>
                            </li>
                            @endcan

                            <li class="nav-item">
                                <a href="{{ route('state.index') }}" class="nav-link">State</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('district.index') }}" class="nav-link">District</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('municipality.index') }}" class="nav-link">Municipality</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('person.index') }}" class="nav-link">Person</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">

            @if ($errors->any())
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="alert alert-danger">
                            **Something Went Wrong**
                            @foreach ($errors->all() as $error)
                                <li>
                                    {{ $error }}
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="justify-content-center d-flex">
                    <div class="alert alert-danger col-md-10">
                        {{ session()->get('error') }}
                    </div>
                </div>
            @endif

            @if (session()->has('success'))
                <div class="justify-content-center d-flex">
                    <div class="alert alert-success col-md-10">
                        {{ session()->get('success') }}
                    </div>
                </div>
            @endif


            @yield('content')
        </main>
    </div>
</body>

</html>
